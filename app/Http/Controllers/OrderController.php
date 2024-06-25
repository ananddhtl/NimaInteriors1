<?php

namespace App\Http\Controllers;

use App\Mail\OrderPlacedForAdmin;
use App\Mail\OrderPlacedForUser;
use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::where('user_id', auth()->id())->with('items.product')->first();
        return view('frontend.customer.account.orderhistory', compact('order'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        // Retrieve cart from session
        $cart = session('cart');
        if (!$cart || count($cart) == 0) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Calculate sales total and grand total
        $salesTotal = array_reduce($cart, function ($sum, $item) {
            return $sum + ($item['price'] * $item['quantity']);
        }, 0);
        $discount = 0;
        $grandTotal = $salesTotal - $discount;

        // Create order
        $order = Order::create([
            'user_id' => auth()->id(),
            'reference_id' => uniqid(),
            'sales_total' => $salesTotal,
            'discount' => $discount,
            'grand_total' => $grandTotal,
            'order_type' => 'cashondelivery',
            'status' => 'Pending',
        ]);

        // Create order items
        foreach ($cart as $id => $details) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $id,
                'quantity' => $details['quantity'],
                'price' => $details['price'],
                'total' => $details['price'] * $details['quantity'],
            ]);
        }

        // Retrieve order data and delivery data
        $orderData = $request->session()->get('order_data', []);
        $deliveryData = $request->session()->get('delivery_data', []);

        // Create order address
        OrderAddress::create([
            'order_id' => $order->id,
            'user_id' => auth()->id(),
            'addresstype' => $orderData['active_tab'],
            'fname' => $orderData['fname'],
            'lname' => $orderData['lname'],
            'postalcode' => $orderData['postalcode'],
            'street_name' => $orderData['streetname'],
            'house_no' => $orderData['houseno'],

            'bus_no' => $orderData['busno'] ?? null,
            'phone_no' => $orderData['phoneno'] ?? null,
            'company_name' => $orderData['companyname'] ?? null,
            'reference_no' => $orderData['refno'] ?? null,
            'vat_no' => $orderData['vatno'] ?? null,
        ]);

        
        $order = Order::with('items')->find($id);
        Mail::to(auth()->user())->send(new OrderPlacedForUser($order));
        
        
        $adminEmail = 'info@queswin.be'; 
        Mail::to($adminEmail)->send(new OrderPlacedForAdmin($order));

      
        $request->session()->forget(['order_data', 'delivery_data']);
        session()->forget('cart');

        // Redirect to success page
        return redirect()->route('ordersuccess', ['locale' => app()->getLocale()])->with('success', 'Order placed successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
    public function orderlist()
    {
        $data = Order::with(['user', 'items.product'])->get();
        return view('backend.order.list', compact('data'));
    }
    public function sendInvoice($id)
    {
        
        $order = Order::findOrFail($id);

       
        $data["email"] = $order->user->email;
        $data["title"] = "Invoice for Order #" . $order->id;
        $data["body"] = "Please find attached the invoice for your recent order.";

        
        $pdf = PDF::loadView('backend.order.invoice', compact('order'));

      
        Mail::send('emails.myTestMail', $data, function ($message) use ($data, $pdf) {
        
            $message->to($data["email"], $data["email"])
                ->subject($data["title"])
                ->attachData($pdf->output(), "invoice.pdf", [
                    'mime' => 'application/pdf',
                ]);
        });

        return back()->with('success', 'Invoice sent successfully!');
    }
    public function invoice($id)
    {
        $order = Order::findOrFail($id);

        return view('backend.order.invoice', compact('order'));
    }
    public function updateorderstatus(Request $request, $id)
    {

        $order = Order::findOrFail($id);
        $order->status = $request->input('status');
        $order->save();

        return redirect()->back()->with('success', 'Order status updated successfully.');
    }
}

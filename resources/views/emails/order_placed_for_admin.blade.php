@component('mail::message')
# New Order Received

A new order has been placed. Here are the details:

**Order ID**: {{ $order->id }}
**Total Amount**: ${{ $order->grand_total }}


**Products Ordered**:
@foreach($order->items as $item)
- **Product Name:** {{ $item->product->name }}
  **Price:** ${{ $item->price }}
  **Quantity:** {{ $item->quantity }}
@endforeach

**Authenticated User**:
- **Name:** {{ auth()->user()->name }}
- **Email:** {{ auth()->user()->email }}

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

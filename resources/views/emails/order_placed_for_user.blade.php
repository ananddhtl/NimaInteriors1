@component('mail::message')
# Order Placed Successfully

@if ($order)
**Order ID**: {{ $order->id }}
**Total Amount**: ${{ $order->grand_total }}

**Products Ordered**:
@foreach ($order->items as $item)
- **Product Name**: {{ $item->product->name }}
  **Price**: ${{ $item->price }}
  **Quantity**: {{ $item->quantity }}
@endforeach
@endif

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

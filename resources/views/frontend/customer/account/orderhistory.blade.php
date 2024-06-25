@extends('welcome')
@section('content')
<style>
    
    </style>
    <div class="container">
        <div class="user-profile">
            @include('frontend.customer.account.sidebar')
            <div class="user-description">
                <h5>Purchase History</h5>
                <div class="whole-table">
                    <table class="overflow-table" id="customers">
                        <thead>
                            <tr>
                                <th>Order Date</th>
                                <th>Reference Id</th>
                                {{-- <th>Sales Total</th> --}}
                                {{-- <th>Discount</th> --}}
                                <th>Grand Total</th>
                                <th>Order Type</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{ $order->created_at }}</td>
                                    <td>{{ $order->reference_id }}</td>
                                    {{-- <td>{{ $order->sales_total }}</td>
                                    <td>{{ $order->discount }}</td> --}}
                                    <td>{{ $order->grand_total }}</td>
                                    <td>{{ $order->order_type }}</td>
                                    <td>{{ $order->status }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

@extends('backend.include.main')

@section('content')
<div class="px-3">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="py-3 py-lg-4">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="page-title mb-0">Invoice</h4>
                </div>
                <div class="col-lg-6">
                    <div class="d-none d-lg-block">
                        <ol class="breadcrumb m-0 float-end">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Extra Pages</a></li>
                            <li class="breadcrumb-item active">Invoice</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row my-3">
            <div class="col-12">
                <!-- Logo & title -->
                <div class="clearfix">
                    <div class="float-start">
                        <img src="assets/images/logo-dark.png" alt="" height="20">
                    </div>
                    <div class="float-end">
                        <h4 class="m-0 d-print-none">Invoice</h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mt-3">
                            <h5 class="mb-2">Hello, {{ $order->user->fullname }}</h5>
                            <p class="text-muted">Thanks a lot because you keep purchasing our products. Our company
                                promises to provide high quality products for you as well as outstanding
                                customer service for every transaction. </p>
                        </div>

                    </div><!-- end col -->
                    <div class="col-md-6">
                        <div class="mt-3 float-end">
                            <p class="mb-2"><span class="font-weight-medium">Order Date : </span> <span
                                    class="float-end"> &nbsp;&nbsp;&nbsp;&nbsp; {{ $order->created_at->format('M d, Y') }}</span></p>
                            <p class="mb-2"><span class="font-weight-medium">Order Status : </span> <span
                                    class="float-end"><span class="badge bg-danger">{{ $order->status }}</span></span></p>
                            <p><span class="font-weight-medium">Order No. : </span> <span class="float-end">{{ $order->id }}</span></p>
                        </div>
                    </div><!-- end col -->
                </div>
                <!-- end row -->

                <div class="row mt-3">
                    <div class="col-md-6">
                        <h6>Billing Address</h6>
                        <address>
                            {{ $order->user->fullname }}<br>
                            {{ $order->billing_address }}<br>
                            {{ $order->billing_city }}, {{ $order->billing_state }} {{ $order->billing_zip }}<br>
                            <abbr title="Phone">P:</abbr> {{ $order->billing_phone }}
                        </address>
                    </div> <!-- end col -->

                    <div class="col-md-6">
                        <div class="text-md-end">
                            <h6>Shipping Address</h6>
                            <address>
                                {{ $order->user->fullname }}<br>
                                {{ $order->shipping_address }}<br>
                                {{ $order->shipping_city }}, {{ $order->shipping_state }} {{ $order->shipping_zip }}<br>
                                <abbr title="Phone">P:</abbr> {{ $order->shipping_phone }}
                            </address>
                        </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table mt-4 table-centered">
                                <thead class="">
                                    <tr>
                                        <th>#</th>
                                        <th>Item</th>
                                        <th style="width: 10%">Quantity</th>
                                        <th style="width: 10%">Price</th>
                                        <th style="width: 10%" class="text-end">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($order->items as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>
                                            <h5>{{ $item->product ? $item->product->itemName : 'Product not available' }}</h5>
                                            <p class="text-muted mb-0">{{ $item->description }}</p>
                                        </td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>${{ $item->price }}</td>
                                        <td class="text-end">${{ $item->quantity * $item->price }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- end table-responsive -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

                <div class="row">
                    <div class="col-sm-6">
                        <div class="clearfix pt-5">
                            <h6 class="text-muted">Notes:</h6>

                            <small class="text-muted">
                                All accounts are to be paid within 7 days from receipt of
                                invoice. To be paid by cheque or credit card or direct payment
                                online. If account is not paid within 7 days the credits details
                                supplied as confirmation of work undertaken will be charged the
                                agreed quoted fee noted above.
                            </small>
                        </div>
                    </div> <!-- end col -->
                    <div class="col-sm-6">
                        <div class="float-end">
                            <p><span class="font-weight-medium">Sub-total:</span> <span
                                    class="float-end">${{ $order->sub_total }}</span></p>
                            <p><span class="font-weight-medium">Discount ({{ $order->discount_percentage }}%):</span>
                                <span class="float-end">
                                    &nbsp;&nbsp;&nbsp; ${{ $order->discount_amount }}</span></p>
                            <h3>${{ $order->grand_total }} USD</h3>
                        </div>
                        <div class="clearfix"></div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

                <div class="mt-4 mb-1">
                    <div class="text-end d-print-none">
                        <a href="javascript:window.print()"
                            class="btn btn-primary waves-effect waves-light"><i
                                class="mdi mdi-printer me-1"></i> Print</a>
                        <a href="#" class="btn btn-info waves-effect waves-light">Submit</a>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container -->

</div>
@endsection

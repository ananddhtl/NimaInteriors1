@extends('backend.include.main')

@section('content')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<div class="container-fluid">

    <div class="py-3 py-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="page-title mb-0">Order Data</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-bullseye-arrow me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if (session('deleted'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-bullseye-arrow me-2"></i>
                    {{ session('deleted') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>User Name</th>
                                    <th>Reference ID</th>
                                    <th>Sales Total</th>
                                    <th>Discount</th>
                                    <th>Grand Total</th>
                                    <th>Order Type</th>
                                    <th>Status</th>
                                    <th>Items</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $order)
                                <tr>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user ? $order->user->fullname : 'N/A' }}</td>
                                    <td>{{ $order->reference_id }}</td>
                                    <td>{{ $order->sales_total }}</td>
                                    <td>{{ $order->discount }}</td>
                                    <td>{{ $order->grand_total }}</td>
                                    <td>{{ $order->order_type }}</td>
                                    <td>{{ $order->status }}</td>
                                    <td>
                                        <ul>
                                            @foreach($order->items as $item)
                                            <li>{{ $item->product ? $item->product->itemName : 'Product not available' }}
                                                (Quantity: {{ $item->quantity }}, Price: {{ $item->price }})</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                            data-bs-target="#top-modal{{ $order->id }}">Change Status</button>
                                            <a href="{{ route('admin.invoice', ['id' => $order->id]) }}" class="btn btn-primary">View Invoice</a>
                                            <a href="{{ route('admin.send.invoice', ['id' => $order->id]) }}" class="btn btn-info waves-effect waves-light">Send Invoice</a>


                                    </td>
                                </tr>

                                <!-- Modal for each order -->
                                <div id="top-modal{{ $order->id }}" class="modal fade" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-top">
                                        <div class="modal-content">
                                            <form action="{{ route('orders.updateStatus', ['id' => $order->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="topModalLabel">Change Order Status</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="status" class="form-label">New Status</label>
                                                        <select class="form-select" id="status" name="status">
                                                            <option value="pending">Pending</option>
                                                            <option value="processing">Processing</option>
                                                            <option value="completed">Completed</option>
                                                            <option value="cancelled">Cancelled</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmDelete(deleteUrl) {
        if (confirm("Are you sure you want to delete this item?")) {
            window.location.href = deleteUrl;
        } else {
            // Do nothing
        }
    }
</script>
@endsection

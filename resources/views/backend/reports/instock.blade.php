@extends('backend.include.main')
@section('content')
    <div class="container-fluid">

        <div class="py-3 py-lg-4">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="page-title mb-0">Today Stock Data</h4>
                </div>
                <div class="col-lg-6">
                    <div class="d-none d-lg-block">
                        <ol class="breadcrumb m-0 float-end">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Report</a></li>
                            <li class="breadcrumb-item active">Today</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">


                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>SN. </th>
                                        <th>Item Name</th>
                                        <th>Stock In</th>
                                        <th>Date</th>



                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($reports as $item)
                                        <?php $i++; ?>

                                        <tr>
                                            <th scope="row">{{ $i }}</th>
                                            <td>{{ $item->itemName }}</td>
                                            <td>{{ $item->instock }}</td>
                                            <td>{{ $item->date }}</td>




                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end card -->
            </div> <!-- end col -->


        </div>
        <!--- end row -->




    </div>
@endsection
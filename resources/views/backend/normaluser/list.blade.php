@extends('backend.include.main')
@section('content')
    <div class="px-3">


        <div class="container-fluid">


            <div class="py-3 py-lg-4">
                <div class="row">
                    <div class="col-lg-6">





                        <h4 class="page-title mb-0">Normal User</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-none d-lg-block">
                            <ol class="breadcrumb m-0 float-end">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">
                                        Normal User</a></li>
                                <li class="breadcrumb-item active">List</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">


                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>

                                            <th>Full Name</th>
                                            <th> Email</th>
                                            <th>Gender</th>
                                            <th>Phone Number</th>
                                            <th>Date of Birth</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>

                                                <?php $i = 1; ?>

                                                <th>{{ $item->fullname }}</th>
                                                <th>{{ $item->email }}</th>
                                                <th>{{ $item->gender }}</th>
                                                <th>{{ $item->phonenumber }}</th>

                                                <th>{{ $item->dob }}</th>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>




        </div> <!-- container -->

    </div>
@endsection
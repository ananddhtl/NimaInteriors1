@extends('backend.include.main')
@section('content')
    <div class="container-fluid">

        <div class="py-3 py-lg-4">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="page-title mb-0">Contact US Data</h4>
                </div>
                <div class="col-lg-6">
                    <div class="d-none d-lg-block">
                        <ol class="breadcrumb m-0 float-end">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Contact US</a></li>
                            <li class="breadcrumb-item active">List</li>
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
                                        
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Phone Number</th>
                                        <th>Email</th>
                                        <th>Street Number</th>
                                        <th>Post Code and City</th>
                                        <th>I am</th>
                                        <th>Project</th>
                                        <th>Message</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $item)
                                    <tr>
                                        <th>{{$item->fname}}</th>
                                        <th>{{$item->lname}}</th>
                                        <th>{{$item->phonenumber}}</th>
                                        <th>{{$item->email}}</th>
                                        <th>{{$item->streetno}}</th>
                                        <th>{{$item->postcodeandcity}}</th>
                                        <th>{{$item->iam}}</th>
                                        <th>{{$item->project}}</th>
                                        <th>{{$item->message}}</th>
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

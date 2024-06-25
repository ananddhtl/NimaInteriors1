@extends('backend.include.main')
@section('content')
<div class="container-fluid">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <div class="py-3 py-lg-4">
       
        <div class="row">
            
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Uploaded Brochure</h5>
                        @if ($brochureName)
                        <p><strong>File Name:</strong> {{ $brochureName }}</p>
                        <p><strong>Download Link:</strong> <a href="{{ asset("admin/brochures/latest_brochure.pdf") }}" target="_blank">Download Brochure</a></p>
                        @else
                        <p>No brochure uploaded yet.</p>
                        @endif
                    </div>
                    <div class="d-none d-lg-block">
                        <ol class="breadcrumb m-0 ">
                         
                            <div class="btn btn-secondary ">
                                <a href="{{route('add.brochure')}}" class="menu-link text-white">
                                    <span class="menu-text">Add the latest brochure </span>
    
                            </div>
                            </a>
                        </ol>
                    </div>
                </div>
            </div>
           
               
           
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <h4 class="page-title mb-0">List of emails downloaded by</h4>
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

                                    <th>Title</th>
                                    <th>Date of Downloaded</th>
                                    <th>Emailge</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($emails as $email)
                                <tr>
                                    <td>{{ $email->id }}</td>
                                    <td>{{ $email->email }}</td>
                                    <td>{{ $email->created_at->format('Y-m-d H:i:s') }}</td>
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
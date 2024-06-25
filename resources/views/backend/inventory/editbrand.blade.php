@extends('backend.include.main')
@section('content')
<div class="px-3">


    <div class="container-fluid">


        <div class="py-3 py-lg-4">
            <div class="row">
                <div class="col-lg-6">


                    @if (session('company_updated'))
                    <div class="alert alert-success">
                        {{ session('company_updated') }}
                    </div>
                    @endif

                    @if (session('company_added'))
                    <div class="alert alert-success">
                        {{ session('company_added') }}
                    </div>
                    @endif


                    <h4 class="page-title mb-0">Edit Company Profile</h4>
                </div>
                <div class="col-lg-6">
                    <div class="d-none d-lg-block">
                        <ol class="breadcrumb m-0 float-end">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">
                                    Item Group</a></li>
                            <li class="breadcrumb-item active">Add</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">


                        <div class="row">
                            <div class="col-12">
                                <div class="p-2">
                                  
                                    <form action="{{ route('admin.updatebrand', $editbrand->id) }}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                                        @method('PUT')
                                 
                                        @csrf
                                        <input type="hidden" name="group_idEdit" id="group_idEdit"
                                            value="{{ @$editbrand->id }}">
                                        <div class="mb-2 row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Company
                                                Name</label>
                                            <div class="col-md-10">
                                                <input type="text" name="companyName" id="simpleinput"
                                                    class="form-control"
                                                    value="{{ old('companyName', @$editbrand->companyName) }}"
                                                    placeholder="Enter Company Name">
                                                @error('companyName')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Address</label>
                                            <div class="col-md-10">
                                                <input type="text" name="address" id="simpleinput" class="form-control"
                                                    value="{{ old('address', @$editbrand->address) }}"
                                                    placeholder="Enter Address">
                                                @error('address')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Contact
                                                Number</label>
                                            <div class="col-md-10">
                                                <input type="text" name="contactNumber" id="simpleinput"
                                                    class="form-control"
                                                    value="{{ old('contactNumber', @$editbrand->contactNumber) }}"
                                                    placeholder="Enter Contact Number">
                                                @error('contactNumber')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-2 row">
                                            <label class="col-md-2 col-form-label" for="simpleinput">Email</label>
                                            <div class="col-md-10">
                                                <input type="email" name="email" id="simpleinput" class="form-control"
                                                    value="{{ old('email', @$editbrand->email) }}"
                                                    placeholder="Enter Email">
                                                @error('email')
                                                <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">{{ isset($editbrand) ? 'Update' : 'Submit' }}</button>
                                    </form>


                                </div>
                            </div>

                        </div>
                        <!-- end row -->
                    </div>
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>
    
    </div> <!-- container -->

</div>



@endsection
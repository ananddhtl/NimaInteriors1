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


                    <h4 class="page-title mb-0">Company Details</h4>
                </div>
               
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-body">


                        <div class="row">
                            <div class="col-12">
                                <div class="p-2">
                                    @if(isset($editbrand))
                                    <form action="{{ route('admin.updatebrand', $editbrand->id) }}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                                        @method('PUT')
                                    @else
                                    <form action="{{ route('admin.storebrand') }}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                                    @endif
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
        </div> --}}
      
        
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">


                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Company Name</th>
                                        <th>Address</th>
                                        <th>Contact Number</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($brands as $item)
                                    <tr>
                                   
                                        <td>{{ $item->companyName }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->contactNumber }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <input type="checkbox" class="form-check-input"
                                                       id="flexSwitchCheck{{ $item->id }}"
                                                       onchange="toggleStatus('{{ $item->id }}')"
                                                       {{ $item->status ? 'checked' : '' }}
                                                       {{ $item->isNonChangeable ? 'disabled' : '' }}>
                                                <input type="hidden" name="status{{ $item->id }}"
                                                       value="{{ $item->status ? '1' : '0' }}">
                                            </div>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.editbrand', $item->id) }}"
                                               class="btn btn-info waves-effect waves-light">
                                                <i class="mdi mdi-pen"></i>
                                            </a>
                                            {{-- <a href="{{ route('admin.deletebrand', $item->id) }}"
                                               onclick="return confirm('Are you sure you want to delete this item?');"
                                               class="btn btn-danger waves-effect waves-light">
                                                <i class="mdi mdi-close"></i>
                                            </a> --}}
                                        </td>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
            $('form').submit(function() {
                var quillContent = $('.ql-editor').html();
                $('#description-input').val(quillContent);
            });
        });
</script>
<script>
    function toggleStatus(itemId) {
            var checkbox = $('#flexSwitchCheck' + itemId);
            var status = checkbox.is(':checked') ? 1 : 0;

            $.ajax({
                url: '{{ route('admin.updatestatusbrand') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: itemId,
                    status: status
                },
                success: function(response) {

                    alert('Status updated successfully');
                },
                error: function(xhr) {

                    console.log('Error updating status');
                }
            });
        }
</script>
@endsection
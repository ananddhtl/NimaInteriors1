@extends('backend.include.main')
@section('content')
    <div class="px-3">


        <div class="container-fluid">


            <div class="py-3 py-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="page-title mb-0">Add Item Category</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-none d-lg-block">
                            <ol class="breadcrumb m-0 float-end">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">
                                        Item Category</a></li>
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
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-12">
                                    <div class="p-2">
                                        <form action="{{ route('admin.storegroup') }}" class="form-horizontal"
                                            role="form" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="group_idEdit" id="group_idEdit"
                                                value="{{ @$group->id }}">
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Group Name</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="groupName" id="simpleinput"
                                                        class="form-control"
                                                        value="{{ old('groupName', @$group->groupName) }}"
                                                        placeholder="Enter Group Name">
                                                    @error('groupName')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label">Status</label>
                                                <div class="col-md-10">
                                                    <select name="status" class="form-control">
                                                        <option value="0"
                                                            {{ old('status', @$group->status) == 0 ? 'selected' : '' }}>
                                                            Pending</option>
                                                        <option value="1"
                                                            {{ old('status', @$group->status) == 1 ? 'selected' : '' }}>
                                                            Approved</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>


                                    </div>
                                </div>

                            </div>
                            <!-- end row -->
                        </div>
                    </div> <!-- end card -->
                </div><!-- end col -->
            </div>

            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">


                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>

                                            <th>Category Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $item)
                                            <tr>

                                                <th>{{ $item->groupName }}</th>
                                                <th>
                                                    <div class="form-check form-switch">
                                                        <input type="checkbox" class="form-check-input"
                                                            id="flexSwitchCheck{{ $item->id }}"
                                                            onchange="toggleStatus('{{ $item->id }}')"
                                                            {{ $item->status ? 'checked' : '' }}
                                                            {{ $item->isNonChangeable ? 'disabled' : '' }}>
                                                        <input type="hidden" name="status{{ $item->id }}"
                                                            value="{{ $item->status ? '1' : '0' }}">
                                                    </div>
                                                </th>

                                                <th> <a href="{{ route('admin.editgroupname', $item->id) }}"
                                                        class="btn btn-info waves-effect waves-light">
                                                        <i class="mdi mdi-pen"></i>
                                                    </a>&nbsp; <a href="{{ route('admin.deletegroupname', $item->id) }}"
                                                        onclick=" return confirm('Are you sure you want to delete this item ?'); "
                                                        class="btn btn-danger waves-effect waves-light">
                                                        <i class="mdi mdi-close"></i>
                                                    </a></th>
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
        function toggleStatus() {
            var checkbox = document.getElementById("flexSwitchCheckChecked");
            var statusField = document.querySelector('input[name="status"]');
            if (checkbox.checked) {
                statusField.value = 1;
            } else {
                statusField.value = 0;
            }
        }
    </script>
    <script>
        function toggleStatus(itemId) {
            var checkbox = $('#flexSwitchCheck' + itemId);
            var status = checkbox.is(':checked') ? 1 : 0;

            $.ajax({
                url: '{{ route('admin.storegroup') }}',
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
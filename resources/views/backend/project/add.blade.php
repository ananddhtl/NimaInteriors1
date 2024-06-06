@extends('backend.include.main')
@section('content')
    <div class="px-3">
        <div class="container-fluid">
            <div class="py-3 py-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="page-title mb-0">Add Project</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-none d-lg-block">
                            <ol class="breadcrumb m-0 float-end">
                                <li class="breadcrumb-item btn btn-secondary"><a href="{{route('admin.listproject')}}" class="text-white">Back</a></li>
                                {{-- <li class="breadcrumb-item active">Add</li> --}}
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="p-2">
                                        <form id="projectForm" action="{{ route('admin.storeproject')}}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Title</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="title" id="simpleinput" class="form-control" placeholder="Enter Project Title">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="example-fileinput">Thumbnail</label>
                                                <div class="col-md-10">
                                                    <input type="file" name="thumbnail" class="form-control" id="thumbnail">
                                                    <small id="fileSizeMessage" class="text-danger"></small>
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="example-textarea">Description</label>
                                                <div class="col-md-10">
                                                    <textarea name="description" class="form-control" id="example-textarea" rows="5"></textarea>
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
        </div> <!-- container -->
    </div>

    <script>
        document.getElementById('projectForm').addEventListener('submit', function(event) {
            var thumbnail = document.getElementById('thumbnail');
            var maxSize = 40 * 1024 * 1024; // 40 MB in bytes

            if (thumbnail.files.length > 0) {
                console.log("File selected:", thumbnail.files[0].name);
                console.log("File size:", thumbnail.files[0].size);
                if (thumbnail.files[0].size > maxSize) {
                    document.getElementById('fileSizeMessage').innerText = 'File size exceeds 40 MB. Please upload a smaller file.';
                    console.log("File size exceeded");
                    event.preventDefault(); // Prevent form submission
                } else {
                    document.getElementById('fileSizeMessage').innerText = ''; // Clear error message if file size is acceptable
                    console.log("File size is acceptable");
                }
            }
        });
    </script>
@endsection

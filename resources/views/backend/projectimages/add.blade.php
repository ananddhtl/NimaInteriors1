@extends('backend.include.main')
<style>
    .dropzone .dz-preview .dz-remove{
        display: none !important;
    }
    .dropzone .dz-preview{
        margin: 5px !important;
    }
</style>
@section('content')
<div class="px-3">
    <div class="container-fluid">
        <div class="py-3 py-lg-4">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="page-title mb-0">Add Project Images</h4>
                </div>
                <div class="col-lg-6">
                    <div class=" d-lg-block">
                        <ol class="breadcrumb m-0 ">
                            <div class="btn btn-secondary ">
                                <a href="{{route('admin.listprojectimages')}}" class="menu-link text-white">
                                    <span class="menu-text">Back </span>
    
                                </a>
                            </div>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="p-2">
                                    <form action="{{ route('admin.storeprojectimages') }}" class="dropzone" id="image-upload" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <div class="mb-2 row">
                                            <label class="col-md-6 col-form-label">Select the Project</label>
                                            <div class="col-md-12">
                                                
                                                <select name="project_id" class="form-control">
                                                    @foreach($projectlist as $item)
                                                    <option value="{{ $item->id }}" style="font: 700;">{{ $item->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            
                                        </div>
                                        
                                    </form>
                                    <span>Upload upto 10 images at a time</span>
                                    {{-- <button type="button" class="btn btn-primary" id="submit-all">Submit</button> --}}
                                </div>
                                 <!-- Progress Bar -->
                                 <div id="dropzone-msg" class="text-danger"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
<script>
    Dropzone.options.imageUpload = {
        url: '{{ route('admin.storeprojectimages') }}',
        paramName: 'images', // The name that will be used to transfer the file
        maxFilesize: 1000, // 500 MB
         maxFiles: 10,
        addRemoveLinks: true,
        autoProcessQueue: true, // Don't automatically upload files
        uploadMultiple: true, // Allow multiple file uploads
        parallelUploads: 1, // Number of files to upload in parallel
        init: function() {
            var myDropzone = this;

            // Handle the submit button click event
            document.querySelector("#submit-all").addEventListener("click", function(e) {
                e.preventDefault();
                e.stopPropagation();
                console.log('Submit button clicked');
                myDropzone.processQueue(); // Start uploading files
            });

            this.on("maxfilesexceeded", function(file) {
                document.getElementById("dropzone-msg").innerHTML = "File size limit exceeded. Please upload files below 500 MB.";
                myDropzone.removeFile(file); // Remove the exceeded file from Dropzone
            });
            // Handle the success event
            this.on("success", function(file, response) {
                console.log('File upload successful:', response);
            });

            // Handle the error event
            this.on("error", function(file, response) {
                console.log('File upload failed:', response);
                alert('File upload failed!');
            });

            // Append the project_id to the form data
            this.on("sending", function(file, xhr, formData) {
                console.log('Sending file:', file);
                formData.append("_token", document.querySelector("input[name='_token']").value); // Append the CSRF token
                formData.append("project_id", document.querySelector("select[name='project_id']").value); // Append project_id to the formData
            });
        }
    };
</script>

@extends('backend.include.main')
@section('content')
    <div class="px-3">


        <div class="container-fluid">


            <div class="py-3 py-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="page-title mb-0">Blog Data</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-none d-lg-block">
                            <ol class="breadcrumb m-0 ">
                               <a href="{{route('admin.listblog')}}"> <button type="button" class="btn btn-secondary waves-effect">Back</button></a>
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
                                        <form action="{{ route('admin.updateblog', $blog->id ) }}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Title</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="title" value="{{$blog->title}}" id="simpleinput" class="form-control" placeholder="Enter Blog Title">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="example-fileinput">Thumbnail</label>
                                                <div class="col-md-10">
                                                    <input type="file" name="thumbnail" class="form-control" id="example-fileinput">
                                                    <img height="150px;" width="200px;" id="thumbnail-preview" src="{{ asset('admin/blog/' . $blog->image) }}">
                                                </div>
                                            </div>
                                        
                                            <div class="card-body">
                                                <h4 class="header-title">Description</h4>
                                                <p class="sub-header">Add the Description for your blog</p>
                                        
                                                <div id="snow-editor" style="height: 300px;" class="ql-container ql-snow">
                                                    <div class="ql-editor" data-gramm="false" contenteditable="true">
                                                        {!! $blog->description !!}
                                                    </div>
                                                    <div class="ql-clipboard" contenteditable="true" tabindex="-1"></div>
                                                    <div class="ql-tooltip ql-hidden">
                                                        <a class="ql-preview" rel="noopener noreferrer" target="_blank" href="about:blank"></a>
                                                        <input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL">
                                                        <a class="ql-action"></a><a class="ql-remove"></a>
                                                    </div>
                                                </div>
                                        
                                                <input type="hidden" name="description" id="description-input">
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
    document.getElementById('example-fileinput').addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                document.getElementById('thumbnail-preview').setAttribute('src', event.target.result);
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
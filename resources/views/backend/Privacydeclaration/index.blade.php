@extends('backend.include.main')
@section('content')
    @if (@$editprivacydeclaration)
        <div class="px-3">


            <div class="container-fluid">


                <div class="py-3 py-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <h4 class="page-title mb-0">Edit Privacy Declaration</h4>
                        </div>
                        <div class="col-lg-6">
                            <div class="d-none d-lg-block">
                                <ol class="breadcrumb m-0 float-end">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Privacy Declaration</a></li>
                                    <li class="breadcrumb-item active">Edit</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">


                                <div class="row">
                                    <div class="col-12">
                                        <div class="p-2">
                                            <form
                                                action="{{ route('admin.updateprivacydeclaration', $editprivacydeclaration->id) }}"
                                                class="form-horizontal" role="form" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <div class="card-body">


                                                    <div id="snow-editor" style="height: 300px;"
                                                        class="ql-container ql-snow">
                                                        <div class="ql-editor" data-gramm="false" contenteditable="true">
                                                            {!! $editprivacydeclaration->description !!}
                                                        </div>
                                                        <div class="ql-clipboard" contenteditable="true" tabindex="-1">
                                                        </div>
                                                        <div class="ql-tooltip ql-hidden">
                                                            <a class="ql-preview" rel="noopener noreferrer" target="_blank"
                                                                href="about:blank"></a>
                                                            <input type="text" data-formula="e=mc^2"
                                                                data-link="https://quilljs.com" data-video="Embed URL">
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
                    @else
                        {{-- <div class="px-3">


                    <div class="container-fluid">


                        <div class="py-3 py-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4 class="page-title mb-0">Add Term and Condition</h4>
                                </div>
                                <div class="col-lg-6">
                                    <div class="d-none d-lg-block">
                                        <ol class="breadcrumb m-0 float-end">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Term and
                                                    Condition</a></li>
                                            <li class="breadcrumb-item active">Add</li>
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
                                                    <form action="{{ route('admin.storetermandcondition') }}"
                                                        class="form-horizontal" role="form" method="POST"
                                                        enctype="multipart/form-data">
                                                        @csrf

                                                        <div class="card-body">
                                                           
                                                            <div id="snow-editor" style="height: 300px;"
                                                                class="ql-container ql-snow">
                                                                <div class="ql-editor" data-gramm="false"
                                                                    contenteditable="true">
                                                                    <!-- Your Quill editor content will be here -->
                                                                </div>
                                                                <div class="ql-clipboard" contenteditable="true"
                                                                    tabindex="-1"></div>
                                                                <div class="ql-tooltip ql-hidden">
                                                                    <a class="ql-preview" rel="noopener noreferrer"
                                                                        target="_blank" href="about:blank"></a>
                                                                    <input type="text" data-formula="e=mc^2"
                                                                        data-link="https://quilljs.com"
                                                                        data-video="Embed URL">
                                                                    <a class="ql-action"></a><a class="ql-remove"></a>
                                                                </div>
                                                            </div>

                                                            <input type="hidden" name="description"
                                                                id="description-input">
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
                        </div> --}}
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">


                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>

                                    <th>Description</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>

                                        <td class="ql-editor">{!! $item->description !!}</td>

                                        <th> <a href="{{ route('admin.editprivacydeclaration', $item->id) }}"
                                                class="btn btn-info waves-effect waves-light">
                                                <i class="mdi mdi-pen"></i>
                                            </a></button>&nbsp;
                                            {{-- <button type="button"
                                                class="btn btn-danger waves-effect waves-light"><i
                                                    class="mdi mdi-close"></i></button> --}}
                                                </th>
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
@endsection
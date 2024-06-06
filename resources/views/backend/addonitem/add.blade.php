@extends('backend.include.main')
@section('content')
    <div class="px-3">


        <div class="container-fluid">


            <div class="py-3 py-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="page-title mb-0">Add Addon Item</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-none d-lg-block">
                            <ol class="breadcrumb m-0 float-end">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">
                                        Addon Item</a></li>
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
                                        <form action="{{ route('admin.storeaddonitem') }}" class="form-horizontal"
                                            role="form" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="group_idEdit" id="group_idEdit"
                                                value="{{ @$group->id }}">
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Title</label>
                                                <div class="col-md-10">
                                                    <input type="text" name="title" id="simpleinput"
                                                        class="form-control" value="{{ @$group->groupName }}"
                                                        placeholder="Enter addon category title">
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label"> Addon category</label>
                                                <div class="col-md-10">

                                                    <select name="category_id"class="form-control">
                                                        @foreach (@$category as $item)
                                                            <option value="{{ @$item->id }}">{{ @$item->title ?? '' }}
                                                            </option>
                                                        @endforeach

                                                    </select>

                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="simpleinput">Price</label>
                                                <div class="col-md-10">
                                                    <input type="number" name="price" id="simpleinput"
                                                        class="form-control" value="{{ @$group->groupName }}"
                                                        placeholder="Enter price">
                                                </div>
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

                                        <th>Item Name</th>
                                        <th>Category Name</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>

                                            <th>{{ $item->title }}</th>
                                            <th>{{ $item->addoncategory_id }}</th>
                                            <th>{{ $item->price }}</th>
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
@endsection
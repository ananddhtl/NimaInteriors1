@extends('backend.include.main')
@section('content')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <div class="container-fluid">

        <div class="py-3 py-lg-4">
            <div class="row">
                <div class="col-lg-6">
                    <h4 class="page-title mb-0">Blog Data</h4>
                </div>
                <div class="col-lg-6">
                    <div class="d-none d-lg-block">
                        <ol class="breadcrumb m-0 ">
                            <a href="{{route('admin.addblog')}}"> <button type="button" class="btn btn-secondary waves-effect">Add</button></a>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="mdi mdi-bullseye-arrow me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('deleted'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="mdi mdi-bullseye-arrow me-2"></i>
                    {{ session('deleted') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
                    <div class="card-body">
                        

                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $item)
                                    <tr>
                                        <td>{{ $item->title }}</td>
                                        <td class="ql-editor">{!! $item->description !!}</td>
                                        <td><img src="{{ asset('admin/blog/' . $item->image) }}" height="100px" width="150px"></td>
                                        {{-- <td>
                                            <button type="button" class="btn btn-info waves-effect waves-light"><i class="mdi mdi-pen"></i></button>
                                            <button type="button" class="btn btn-danger waves-effect waves-light"><i class="mdi mdi-close"></i></button>
                                        </td> --}}
                                        <th> <a href="{{ route('admin.editblog', $item->id) }}" class="btn btn-info waves-effect waves-light">
                                            <i class="mdi mdi-pen"></i>
                                        </a>&nbsp;
                                        <button type="button" class="btn btn-danger waves-effect waves-light"
                                                    onclick="confirmDelete('{{ route('admin.deleteblog', $item->id) }}')">
                                                    <i class="mdi mdi-close"></i>
                                                </button>
                                    </tr>
                                    @endforeach
                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                </div> 
            </div> 

            
        </div>
       


      

    </div>
    <script>
        function confirmDelete(deleteUrl) {
            if (confirm("Are you sure you want to delete this item?")) {
                window.location.href = deleteUrl;
            } else {
               
            }
        }
    </script>
@endsection

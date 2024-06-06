@extends('backend.include.main')
@section('content')
    <div class="px-3">

      
        <div class="container-fluid">

           
            <div class="py-3 py-lg-4">
                <div class="row">
                    <div class="col-lg-6">
                        <h4 class="page-title mb-0">Add Project Images</h4>
                    </div>
                    <div class="col-lg-6">
                        <div class="d-none d-lg-block">
                            <ol class="breadcrumb m-0 float-end">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Project Images</a></li>
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
                                        <form action="{{ route('admin.storeprojectimages')}}" class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label">Select the Project</label>
                                                <div class="col-md-10">
                                                    <select name="project_id"class="form-control">
                                                        @foreach($projectlist as $item)
                                                        <option value={{$item->id}}>{{$item->title}}</option>
                                                        @endforeach
                                                       
                                                    </select>
                                                    {{-- <input type="text" name="title" id="simpleinput" value={{$item->id}}>{{$item->title}} class="form-control"> --}}
                                                </div>
                                            </div>
                                            <div class="mb-2 row">
                                                <label class="col-md-2 col-form-label" for="example-fileinput">Thumbnail</label>
                                                <div class="col-md-10">
                                                    <input type="file" name="images[]" class="form-control" id="example-fileinput" multiple>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                           

                                            
                                            

                                        </form>
                                    </div>
                                </div>

                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
           

            

        </div> 

    </div>
@endsection

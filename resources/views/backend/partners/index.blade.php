@extends('backend.include.main')

@section('content')
<div class="container-fluid">
    <div class="py-3 py-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="page-title mb-0">Partners List</h4>
            </div>
            <div class="col-lg-6">
                <div class="d-none d-lg-block">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('partners.create') }}"><button type="button" class="btn btn-secondary waves-effect">Add</button></a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Imgage</th>
                  
                    <th>Link</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($partners as $partner)
              
                <tr>
                    <td>{{ $partner->id }}</td>
                    <td>{{ $partner->name }}</td>
                    <td><img src="{{ asset('storage/' . $partner->image) }}" alt="{{ $partner->name }}" width="100"></td>
                    {{-- <td>
                        @if($content->image)
                        <img src="{{ asset('storage/' . $content->image) }}" width="100" alt="">
                        @endif
                    </td> --}}
                    <td>{{ $partner->link }}</td>
                    <td>
                        <a href="{{ route('partners.edit', $partner->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('partners.destroy', $partner->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

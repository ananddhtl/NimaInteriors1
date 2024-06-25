@extends('backend.include.main')

@section('content')
<div class="container-fluid">
    <div class="py-3 py-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="page-title mb-0">Frontend Hero Section</h4>
            </div>
            <div class="col-lg-6">
                <div class="d-none d-lg-block">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('homepage.create') }}"><button type="button" class="btn btn-secondary waves-effect">Add</button></a></li>
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
                    <th>Content</th>
                  
                    <th>Carousel Items</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($contents as $content)
                <tr>
                    <td>{{ $content->id }}</td>
                    <td>{{ $content->title }}</td>
                    <td>{{ Str::limit($content->content, 50) }}</td>
                    {{-- <td>
                        @if($content->image)
                        <img src="{{ asset('storage/' . $content->image) }}" width="100" alt="">
                        @endif
                    </td> --}}
                    <td>
                        @if ($content->carouselItems->isNotEmpty())
                        <ul>
                                @foreach($content->carouselItems as $item)
                                <li>{{ $item->text }}</li>
                                @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" width="100" alt="">
                                @endif
                                @endforeach
                            </div>
                        @else
                       
                        No carousel items
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('homepage.edit', $content->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('homepage.destroy', $content->id) }}" method="POST" style="display:inline-block;">
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

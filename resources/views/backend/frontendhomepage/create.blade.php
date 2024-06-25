@extends('backend.include.main')

@section('content')
    <div class="container">
        <h1>{{ isset($content) ? 'Edit' : 'Add' }} Content</h1>
        <form action="{{ isset($content) ?  route('admin.homepage.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if(isset($content))
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="section">Section</label>
                <input type="text" class="form-control" id="section" name="section" value="{{ old('section', $content->section ?? '') }}" required>
            </div>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $content->title ?? '') }}">
            </div>

            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content">{{ old('content', $content->content ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="image" name="image">
                @if(isset($content) && $content->image)
                    <img src="{{ asset('storage/' . $content->image) }}" width="100" alt="">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">{{ isset($content) ? 'Update' : 'Add' }} Content</button>
        </form>
    </div>
@endsection

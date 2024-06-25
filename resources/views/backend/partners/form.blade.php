<!-- resources/views/partners/form.blade.php -->

@extends('backend.include.main')

@section('content')

<div class="container">
    <h1>{{ isset($partner) ? 'Edit Partner' : 'Add Partner' }}</h1>

    <form action="{{ isset($partner) ? route('partners.update', $partner->id) : route('partners.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($partner))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', isset($partner) ? $partner->name : '') }}" required>
        </div>

        <div class="form-group">
            <label for="link">Website Link</label>
            <input type="url" name="link" id="link" class="form-control" value="{{ old('link', isset($partner) ? $partner->link : '') }}" required>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            
            @if(isset($partner) && $partner->image)
                <img src="{{ asset('storage/' . $partner->image) }}" alt="Partner Image" width="100">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($partner) ? 'Update' : 'Save' }}</button>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</div>

@endsection

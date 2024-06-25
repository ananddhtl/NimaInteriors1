@extends('backend.include.main')

@section('content')
<div class="container">
    <h1>{{ isset($content) ? 'Edit' : 'Add' }} Content</h1>
    <form action="{{ isset($content) ? route('homepage.update', $content->id) : route('homepage.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($content))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $content->title ?? '') }}" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" required>{{ old('content', $content->content ?? '') }}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            @if(isset($content) && $content->image)
                <img src="{{ asset('storage/' . $content->image) }}" alt="Image" width="100">
            @endif
        </div>
        <div id="carousel-items-container">
            <div class="carousel-item">
                <div class="form-group">
                    <label for="carousel_items_0_text">Carousel Item Text</label>
                    <input type="text" name="carousel_items[0][text]" id="carousel_items_0_text" class="form-control" value="{{ old('carousel_items.0.text') }}" required>
                </div>
                <div class="form-group">
                    <label for="carousel_items_0_image">Carousel Item Image</label>
                    <input type="file" name="carousel_items[0][image]" id="carousel_items_0_image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="carousel_items_0_project_id">Project</label>
                    <select name="carousel_items[0][project_id]" id="carousel_items_0_project_id" class="form-control">
                        @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <button type="button" id="add-carousel-item">Add Carousel Item</button>
        <button type="submit" class="btn btn-primary">Save</button>
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

    <!-- Display existing carousel items for editing -->
    @if(isset($content) && $content->carousel_items)
        <div class="mt-4">
            <h3>Existing Carousel Items</h3>
            <ul>
                @foreach($content->carousel_items as $index => $item)
                    <li>Text: {{ $item['text'] }}</li>
                    @if(isset($item['image']))
                        <li>Image: <img src="{{ asset('storage/' . $item['image']) }}" width="100" alt=""></li>
                    @endif
                    <li>Project: {{ $item['project_id'] }}</li>
                    <hr>
                @endforeach
            </ul>
        </div>
    @endif

</div>

<style>
    button[type=submit] {
        cursor: pointer;
    }

    .carousel-item {
        display: block;
        margin-right: 0;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const addCarouselItemBtn = document.getElementById('add-carousel-item');
        const carouselItemsContainer = document.getElementById('carousel-items-container');

        addCarouselItemBtn.addEventListener('click', function() {
            const key = Date.now();
            const itemHtml = `<div class="carousel-item mb-3 border p-3">
                <div class="form-group">
                    <label for="carousel_items[${key}][text]">Text</label>
                    <input type="text" class="form-control" id="carousel_items[${key}][text]" name="carousel_items[${key}][text]" required>
                </div>
                <div class="form-group">
                    <label for="carousel_items[${key}][image]">Image</label>
                    <input type="file" class="form-control" id="carousel_items[${key}][image]" name="carousel_items[${key}][image]">
                </div>
                <div class="form-group">
                    <label for="carousel_items[${key}][project_id]">Project</label>
                    <select name="carousel_items[${key}][project_id]" id="carousel_items[${key}][project_id]" class="form-control">
                        @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->title }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="button" class="btn btn-danger remove-item">Remove</button>
            </div>`;
            carouselItemsContainer.insertAdjacentHTML('beforeend', itemHtml);
        });

        carouselItemsContainer.addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-item')) {
                event.target.closest('.carousel-item').remove();
            }
        });
    });
</script>

@endsection

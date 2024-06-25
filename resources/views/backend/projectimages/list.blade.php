@extends('backend.include.main')
@section('content')
<style>
    .image-container {
        position: relative;
        display: inline-block;
    }

    .image-container img {
        display: block;
    }

    .image-container .close-icon {
        position: absolute;
        top: 5px;
        right: 6px;
        width: 24px;

        height: 24px;

        background-color: rgb(124, 41, 41);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 16px;

    }
</style>
<div class="container-fluid">

    <div class="py-3 py-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="page-title mb-0">Project Data</h4>
            </div>
            <div class="col-lg-6">
                <div class=" d-lg-block">
                    <ol class="breadcrumb m-0 ">
                        <div class="btn btn-secondary ">
                            <a href="{{route('admin.addprojectimages')}}" class="menu-link text-white">
                                <span class="menu-text">Add </span>

                            </a>
                        </div>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">


                    <div class="table-responsive">
                        <table class="table mb-0">
                            <thead>
                                <tr>

                                    <th>Title</th>

                                    <th>Image</th>


                                </tr>
                            </thead>
                           
                            <tbody>
                                @foreach($projectsWithImages as $project)
                                <tr>
                                    <td>{{ $project->title }}</td>
                                    <td>
                                        <div class="image-list" id="image-list-{{ $project->id }}">
                                            @foreach($project->images->sortBy('position') as $item)
                                            <div class="image-container" data-image-id="{{ $item->id }}">
                                                <img src="{{ asset($item->images) }}" alt="Project Image" height="100px" width="150px">
                                                <i class="mdi mdi-close close-icon" onclick="deleteImage({{ $item->id }})"></i>
                                                <p>{{ $item->image_name }}</p>
                                            </div>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                               
                                
                                {{-- @foreach($projectsWithImages as $project)
                                <tr>
                                    <td>{{ $project->title }}</td>
                                    <td>
                                       
                                        @foreach($project->images as $item)
                                        <div class="image-container" data-image-id="{{ $item->id }}">
                                            <img src="{{ asset($item->images) }}" alt="Project Image" height="100px"
                                                width="150px">
                                            <i class="mdi mdi-close close-icon"
                                                onclick="deleteImage({{ $item->id }})"></i>
                                                <p>{{ $item->image_name }}</p>
                                        </div>
                                        @endforeach
                                    </td>

                                </tr>
                                @endforeach --}}

                        </table>
                    </div>
                </div>
            </div> <!-- end card -->
        </div> <!-- end col -->


    </div>
    <!--- end row -->




</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.14.0/Sortable.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var imageLists = document.querySelectorAll('.image-list');

        imageLists.forEach(function (el) {
            new Sortable(el, {
                animation: 150,
                onEnd: function (evt) {
                    let order = [];
                    el.querySelectorAll('.image-container').forEach(function (container, index) {
                        order.push({
                            id: container.getAttribute('data-image-id'),
                            position: index + 1
                        });
                    });
                    updateImagePositions(order);
                }
            });
        });
    });

    function updateImagePositions(order) {
        $.ajax({
            url: '{{ route("admin.updateImagePositions") }}',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: { order: order },
            success: function (response) {
                if (response.success) {
                    alert('Image positions updated successfully!');
                } else {
                    alert('Failed to update image positions.');
                }
            },
            error: function (xhr) {
                console.error('Error:', xhr.responseText);
                alert('Failed to update image positions.');
            }
        });
    }
</script>
<script>
    function deleteImage(imageId) {
            if (confirm('Are you sure you want to delete this image?')) {
                $.ajax({
                    url: '{{ route("admin.destroyproductimages", ":id") }}'.replace(':id', imageId),
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            // Remove the image container from the DOM
                            $('.image-container[data-image-id="' + imageId + '"]').remove();
    
                            // Show success message
                            alert('Image deleted successfully!');
                        } else {
                            alert('Failed to delete the image.');
                        }
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr.responseText);
                        alert('Failed to delete the image.');
                    }
                });
            }
        }
</script>


@endsection
@extends('backend.include.main')

@section('content')
<div class="container">
    <h1>Upload Latest Brochure</h1>
    <form id="uploadForm" action="{{ route('upload.brochure') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="brochure">Brochure (PDF, max 25MB)</label>
            <input type="file" class="form-control-file" id="brochure" name="brochure" required>
        </div>
        <div class="progress mb-3" style="display: none;">
            <div id="progressBar" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
        </div>
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    document.getElementById('uploadForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);

        // Show progress bar
        const progressBar = document.getElementById('progressBar');
        const progress = document.querySelector('.progress');
        progress.style.display = 'block';

        // Disable submit button during upload
        const submitBtn = document.querySelector('button[type="submit"]');
        submitBtn.disabled = true;

        axios.post('{{ route("upload.brochure") }}', formData, {
            headers: {
                'Content-Type': 'multipart/form-data'
            },
            onUploadProgress: function(progressEvent) {
                const percentCompleted = Math.round((progressEvent.loaded * 100) / progressEvent.total);
                progressBar.style.width = percentCompleted + '%';
                progressBar.innerHTML = percentCompleted + '%';
            }
        })
        .then(function(response) {
            // Handle successful upload
            console.log('File uploaded successfully:', response.data);
            window.location.href = '{{ route("admin.download") }}';
            // Optionally redirect or show success message
        })
        .catch(function(error) {
            // Handle failed upload
            console.error('Upload failed:', error);
            // Optionally show error message
        })
        .finally(function() {
            // Reset form and progress bar
            submitBtn.disabled = false;
            progress.style.display = 'none';
            progressBar.style.width = '0%';
            progressBar.innerHTML = '0%';
            document.getElementById('uploadForm').reset();
        });
    });
</script>
@endsection

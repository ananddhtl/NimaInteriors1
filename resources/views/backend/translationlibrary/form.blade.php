@extends('backend.include.main')

@section('content')

<div class="container">
    <h1>{{ isset($translation) ? 'Edit Translation' : 'Add Translation' }}</h1>

    <form action="{{ isset($translation) ? route('translations.update', $translation->id) : route('translations.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if(isset($translation))
            @method('PUT')
        @endif

        <div class="form-group">
            <label for="key">Key</label>
            <input type="text" id="key" name="key" class="form-control" value="{{ isset($translation) ? $translation->key : '' }}" required>
        </div>

        <div class="form-group">
            <label for="nl_be_translation">Belgian Dutch Translation</label>
            <textarea id="nl_be_translation" name="nl_be_translation" class="form-control" rows="4">{{ isset($translation) ? $translation->nl_be_translation : '' }}</textarea>
        </div>

        <div class="form-group">
            <label for="nl_translation">Nederlands Translation</label>
            <textarea id="nl_translation" name="nl_translation" class="form-control" rows="4">{{ isset($translation) ? $translation->nl_translation : '' }}</textarea>
        </div>
        <div class="form-group">
            <label for="en_translation">English Translation</label>
            <textarea id="en_translation" name="en_translation" class="form-control" rows="4">{{ isset($translation) ? $translation->en_translation : '' }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">{{ isset($translation) ? 'Update Translation' : 'Save Translation' }}</button>
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

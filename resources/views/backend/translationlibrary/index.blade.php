@extends('backend.include.main')

@section('content')
<div class="container-fluid">
    <div class="py-3 py-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="page-title mb-0">Translations List</h4>
            </div>
            <div class="col-lg-6">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <form action="{{ route('translations.index') }}" method="GET" class="form-inline mb-2">
                            <input type="text" name="search" class="form-control mr-sm-2" placeholder="Search...">
                            <button type="submit" class="btn btn-secondary">Search</button>
                        </form>
                    </div>
                    <div class="d-none d-lg-block">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('translations.create') }}"><button type="button" class="btn btn-secondary waves-effect">Add</button></a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end mt-3">
        {{ $translations->links('vendor.pagination.bootstrap-4') }}
    </div>
    <div class="table-responsive">
        {{-- <div class="d-flex justify-content-end mb-3">
            {{ $translations->links() }}
        </div> --}}
        <table class="table mt-4">
            <thead>
                <tr>
                    <th><a href="{{ route('translations.index', ['sort' => 'key']) }}">Key</a></th>
                    <th><a href="{{ route('translations.index', ['sort' => 'nl_be_translation']) }}">Belgian Translation</a></th>
                    <th><a href="{{ route('translations.index', ['sort' => 'nl_translation']) }}">Nederlands Translation</a></th>
                    <th><a href="{{ route('translations.index', ['sort' => 'en_translation']) }}">English Translation</a></th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($translations as $translation)
                <tr>
                    <td>{{ $translation->key }}</td>
                    <td>{{ $translation->nl_be_translation }}</td>
                    <td>{{ $translation->nl_translation }}</td>
                    <td>{{ $translation->en_translation }}</td>
                    <td>
                        <div class="d-flex">
                            <a href="{{ route('translations.edit', $translation->id) }}" class="btn btn-sm btn-primary mr-2">Edit</a>
                            <form action="{{ route('translations.destroy', $translation->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this translation?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-end mt-3">
            {{ $translations->links('vendor.pagination.bootstrap-4') }}
        </div>
        
        @if ($translations->hasPages())
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($translations->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">previous</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $translations->previousPageUrl() }}" rel="prev">previous</a>
                    </li>
                @endif
        
                {{-- Next Page Link --}}
                @if ($translations->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $translations->nextPageUrl() }}" rel="next">next</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">next</span>
                    </li>
                @endif
            </ul>
        @endif
        
        

    </div>
</div>
@endsection

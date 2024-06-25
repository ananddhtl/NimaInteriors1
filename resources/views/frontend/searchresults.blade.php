@extends('welcome')
@section('title','Search Results - Nimainteriors.com')
@section('content')
<style>
    .search-results {
        margin-top: 200px;
        margin-bottom: 40px;
    }

    .search-results h1 {
        font-weight: 300;
    }

    .tabs-reasult {
        margin-top: 30px;
    }

    .tab-header {
        display: flex;
        gap: 30px;
        border-bottom: 2px solid rgb(224, 224, 224);
    }

    .tab-header p {
        font-weight: 600;
        color: rgb(31, 30, 30);
        padding-bottom: 10px;
        cursor: pointer;
    }

    .tab-header p span {
        color: rgb(163, 163, 163)!important;
        font-weight: 400;
    }

    .tab-header p.active-tab {
        border-bottom: 3px solid rgb(41, 41, 41);
    }

    .results-tabs {
        margin-top: 30px;
    }

    .no-results p {
        text-align: center;
        color: rgb(167, 167, 167);
    }
</style>
<div class="container">
    <div class="search-results">
        <h1>Search results for: {{ $query }}</h1>
        <div class="tabs-results">
            <div class="tab-header">
                @if($products->count() > 0)
                    <p class="tab active-tab" data-tab="products">Products <span>({{ $products->count() }})</span></p>
                @endif
                @if($pages->count() > 0)
                    <p class="tab {{ $products->count() == 0 ? 'active-tab' : '' }}" data-tab="pages">Pages <span>({{ $pages->count() }})</span></p>
                @endif
            </div>
            <div class="results-tabs">
                @if($products->count() > 0)
                    <div class="results {{ $pages->count() == 0 ? 'active-results' : '' }}" id="products">
                        @if($products->isEmpty())
                            <div class="no-results">
                                <p>There are no products matching your search. Please try using a different term.</p>
                            </div>
                        @else
                            <ul>
                                @foreach($products as $product)
                                    <a href="{{ route_with_locale('productdesc', ['slug' => $product->slug]) }}">
                                        <li style="display: flex; align-items: center; margin-bottom: 15px;">
                                            <img src="{{ $product->thumbnail }}" alt="{{ $product->title }}" style="width: 150px; height: 120px; margin-right: 15px;">
                                            <p style="font-weight: bold; margin: 0;">{{ $product->title }}</p>
                                        </li>
                                    </a>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endif

                <!-- Display Blogs and Projects -->
                @if($pages->count() > 0)
                    <div class="results {{ $products->count() == 0 ? 'active-results' : '' }}" id="pages">
                        @if($pages->isEmpty())
                            <div class="no-results">
                                <p>There are no pages matching your search. Please try using a different term.</p>
                            </div>
                        @else
                            <ul>
                                @foreach($pages as $page)
                    <li>
                        @if ($page instanceof \App\Models\Blog)
                            <a href="{{ route_with_locale('blog.show', ['slug' => $page->slug]) }}">{{ $page->title }}</a>
                        @elseif ($page instanceof \App\Models\Project)
                            <a href="{{ route_with_locale('project.show', ['slug' => $page->slug]) }}">{{ $page->title }}</a>
                        @endif
                        
                    </li>
                @endforeach
                            </ul>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('.tab');
        const results = document.querySelectorAll('.results');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                document.querySelector('.active-tab').classList.remove('active-tab');
                tab.classList.add('active-tab');

                document.querySelector('.active-results').classList.remove('active-results');
                document.getElementById(tab.getAttribute('data-tab')).classList.add('active-results');
            });
        });
    });
</script>

@endsection

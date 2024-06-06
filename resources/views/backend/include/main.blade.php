@include('backend.include.header')

<body>


    <div class="layout-wrapper">
        @include('backend.include.sidebar')
        <div class="page-content">
            @include('backend.include.navbar')
            @yield('content')

            @include('backend.include.footer')
        </div>
    </div>
    @include('backend.include.scripts')
</body>

</html>

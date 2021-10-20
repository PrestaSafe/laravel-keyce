<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>@yield('meta_title','Blog Post - Start Bootstrap Template')</title>
        <meta name="description" content="@yield('meta_description')" />
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('dist/assets/favicon.ico') }}" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('dist/css/styles.css') }}" rel="stylesheet" />
        @yield('css')
    </head>
    <body>

        
        @include('partials.header')
        <!-- Page content-->
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-12">
                    @include('admin.notifications')
                    @yield('content')
                </div>
            </div>
        </div>
       @include('partials.footer')
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('dist/js/scripts.js') }}"></script>

        @yield('scripts')
    </body>
</html>

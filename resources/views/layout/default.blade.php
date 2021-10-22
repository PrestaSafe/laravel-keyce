<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>@yield('meta_title','Blog Post - Start Bootstrap Template')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="description" content="@yield('meta_description')" />
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('dist/assets/favicon.ico') }}" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('dist/css/styles.css') }}" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        @livewireStyles
        @yield('css')
    </head>
    <body>

        
        @include('partials.header')
        <!-- Page content-->
        <div class="container mt-5">
            @include('admin.notifications')
            <div class="row">
                <div class="col-lg-8">
                    @yield('content')
                </div>
                <!-- Side widgets-->
                <div class="col-lg-4">
                    @include('partials.right_column')
                    @yield('right_column')
                </div>
            </div>
        </div>
       @include('partials.footer')
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('dist/js/scripts.js') }}"></script>
        @livewireScripts
        @yield('scripts')
    </body>
</html>

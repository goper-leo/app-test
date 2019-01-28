<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    @include('includes/header');

    <body>
        <div class="flex-center position-ref full-height" id="app">

            <div class="content">
                @yield('content')
            </div>
        </div>

    </body>

    @include('includes/footer');

</html>

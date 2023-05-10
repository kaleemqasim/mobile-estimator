<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials.head')
    </head>
    <body>
        @include('partials.nav')
        @yield('content')

        @include('partials.script')
        @yield('page_script')
    </body>
</html>

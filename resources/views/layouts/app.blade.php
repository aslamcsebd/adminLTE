<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>@yield('title', 'My Laravel App')</title>
        @include('layouts.head')
        @yield('css')
    </head>
    <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
        <div class="app-wrapper">
            @include('layouts.header')            
            @include(Auth::user()->role . '.sidebar')

            <main class="app-main">
                <div class="app-content">
                    @yield('content')
                </div>
            </main>

            <footer class="app-footer">
                <div class="float-end d-none d-sm-inline">Anything you want</div>
                <strong>
                    Copyright &copy; {{date('Y')}} &nbsp;
                    <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
                </strong>
                All rights reserved.
            </footer>
        </div>
        @include('layouts.footer')
        @yield('js')
    </body>
</html>
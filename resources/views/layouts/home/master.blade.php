<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{ Html::style(asset('//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css')) }}
    {{ Html::script(asset('//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js')) }}
    {{ Html::script(asset('//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js')) }}
    {{ Html::script(asset('//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js')) }}
    <title>@yield('title')</title>

    @include('particals.home.styles')
    @yield('styles')

</head>

<body class="fix-header card-no-border logo-center">

    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>

    <div id="main-wrapper">

        @include('particals.home.header')

        @include('particals.home.sidebar')

        <div class="page-wrapper">

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('particals.home.footer')

        </div>
    </div>

    @include('particals.home.scripts')
    @yield('scripts')
</body>

</html>

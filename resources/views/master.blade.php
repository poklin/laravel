<!DOCTYPE html>
<html>
<head>
    <title> @yield('title') </title>

    <link rel="stylesheet" type="text/css" href="{!! asset('css/lumen/bootstrap.min.css') !!}">
    <link rel="stylesheet" href="{!! asset('css/bootstrap-theme.min.css') !!}">
    <script src="{!! asset('js/jquery-1.12.3.min.js') !!}"></script>
    <script src="{!! asset('js/bootstrap.min.js') !!}"></script>

</head>
<body>
@include('shared.navbar')
@yield('content')
</body>
</html>
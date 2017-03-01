<!DOCTYPE html>
<html lang="en">

<head>
    <title>Migohood - @yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{url('/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('/assets/css/font-awesome.min.css')}}'" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,700" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{url('/assets/css/styles.css')}}" rel="stylesheet">
    <link rel="shortcut icon" href="{{url('/assets/img/favicon.ico')}}">
</head>

<body class='@yield("class")'>
@if(Auth::check())
                @include('headers.header-login')
@else
                @include('headers.home')
 @endif
    @yield ('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="{{url('/assets/js/jquery.min.js')}}"></script>
    <script src="{{url('/assets/js/bootstrap.min.js')}}'"></script>
    <footer>
    @include ("footers/footer")
    </footer>
</body>
</html>
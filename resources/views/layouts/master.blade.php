<!DOCTYPE html>
<html lang="en">

<head>
    <title>Migohood - @yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{url('/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('/assets/css/font-awesome.min.css')}}'" rel="stylesheet">
    <link href="{{url('/assets/css/styles.css')}}" rel="stylesheet">
    <link rel="shortcut icon" href="{{url('/assets/img/favicon.ico')}}">
    <link href="{{url('/assets/css/sweetalert.css')}}" rel="stylesheet">
    <link href="{{url('/assets/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,700" rel="stylesheet">
    <link href="{{url('/assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
</head>
<body class='@yield("class")'>
    @if(Auth::check()) 
        @include('headers.header-login') 
    @else 
        @include('headers.home') 
    @endif 
    
    @include('partials.alert') 
    @yield ('content')
    <footer>
        @include ("footers/footer")
    </footer>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFDO4osYM3UiwGQxABj2HJaiu-IMQypHA&callback=myMap"></script>
    <script src="{{url('assets/js/jquery-3.2.0.min.js')}}"></script>
    <script src="{{url('/assets/js/moment.js')}}"></script>
    <script src="{{url('/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{url('/assets/js/bootstrap-datetimepicker.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/i18n/defaults-*.min.js"></script>
    <script src="{{url('/assets/js/init.js')}}"></script>
</body>

</html>
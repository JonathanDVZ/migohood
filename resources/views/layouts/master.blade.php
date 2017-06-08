<!DOCTYPE html>
<html lang="en">

<head>
    <title>Migohood - @yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{url('/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('/assets/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{url('/assets/css/fullcalendar.min.css')}}" rel="stylesheet">
    <link href="{{url('/assets/css/styles.css')}}" rel="stylesheet">
    <link rel="shortcut icon" href="{{url('/assets/img/favicon.ico')}}">
    <link href="{{url('/assets/css/sweetalert.css')}}" rel="stylesheet">
    <link href="{{url('/assets/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/assets/css/bootstrap-select.min.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,700" rel="stylesheet">
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css">-->
    <link href="{{url('/assets/css/jquery.datepick.css')}}" rel="stylesheet">

    @yield("stylesheet")
</head>
<body class='@yield("class")'>
    @if(session()->has('user'))
        @include('headers.header-login')
    @else
        @include('headers.home')
    @endif

    @include('partials.alert')
    <main>
        @yield ('content')
    </main>
    <footer>
        @include ("footers/footer")
    </footer>

    <script src="{{url('assets/js/jquery-3.2.0.min.js')}}"></script>
    <script src="{{url('/assets/js/moment.js')}}"></script>
    <script src="{{url('/assets/js/bootstrap.min.js')}}"></script>
    <script src="{{url('/assets/js/bootstrap-datetimepicker.js')}}"></script>
    <script src="{{url('/assets/js//bootstrap-select.min.js')}}"></script>
    <script src="{{url('/assets/js/fullcalendar.min.js')}}"></script>
    <script src="{{url('/assets/js/fullcalendar.js')}}"></script>
    <script src="{{url('/assets/js/moment.min.js')}}"></script>
    <!-- <script src="{{url('/assets/js/i18n/defaults-*.min.js')}}"></script> -->
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>-->
    <script src="{{url('/assets/js/jquery.plugin.js')}}"></script>
    <script src="{{url('/assets/js/jquery.datepick.js')}}"></script>
    <script src="{{url('/assets/js/init.js')}}"></script>
    <script src="{{url('/assets/js/parking.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFDO4osYM3UiwGQxABj2HJaiu-IMQypHA"></script>
    @yield("script")
</body>

</html>

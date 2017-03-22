<!DOCTYPE html>
<html lang="en">

<head>
    <title>Migohood - @yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{url('/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('/assets/css/font-awesome.min.css')}}'" rel="stylesheet">
    <link href="{{url('/assets/css/styles.css')}}" rel="stylesheet">
    <link href="{{url('/assets/js/jquery.min.js')}}" rel="stylesheet">
    <link rel="shortcut icon" href="{{url('/assets/img/favicon.ico')}}">
    <link href="{{url('/assets/css/sweetalert.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,700" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <script>
$(document).ready(function(){
    $("#show").click(function(){
        $("#Hidden").show(3000);
    });
});
</script>
</head>
<script>
    $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'dd/mm/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/i18n/defaults-*.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
</body>

</html>
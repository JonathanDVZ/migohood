<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{url('/assets/css/styles.css')}}" rel="stylesheet">
    <link href="{{url('/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('/assets/css/font-awesome.min.css')}}'" rel="stylesheet">
    <link href="{{url('/assets/css/bootstrap-form-helpers.min.css')}}" rel="stylesheet" media="screen">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,700" rel="stylesheet">
    
</head>

<body>
    @include ("headers/home") 
    @yield ('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{url('/assets/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{url('/assets/js/bootstrap.min.js')}}'"></script>
    <script src="{{url('/assets/js/bootstrap-formhelpers.min.js')}}"></script>
</body>

</html>

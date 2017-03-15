<script src="{{url('/assets/js/sweetalert.min.js')}}"></script>
    @if (Session::has('message-alert'))              
    <script type="text/javascript">                 
        swal({
                 title: "{{ Session::get('message-alert') }}",                           
                imageUrl: "assets/img/Logo.png",
                imageSize: '233x51',    
                confirmButtonColor:"#1994B5"                                        
        }); 
    @endif         
</script>   
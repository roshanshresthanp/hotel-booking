<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRIMURTI</title>
    @if(isset($hotel))  
    <link rel="icon" href="{{asset('storage/hotel/'.$hotel->logo)}}">
    @endif

    <link rel="stylesheet" href="{{asset('front/node_modules/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front/node_modules/bootstrap-icons/font/bootstrap-icons.css')}}">
    <link rel="stylesheet" href="{{asset('front/node_modules/owl.carousel/dist/assets/owl.carousel.min.css')}}">
    <script src="https://use.fontawesome.com/b005d80e47.js"></script>
    
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    
    <link href="{{asset('front/css/magnific-popup.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{asset('front/css/main.css')}}">
    <!--Toastr  -->

    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    {{-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    
</head>
<body>
    @include('inc.messages')
    @include('inc.navbar')
    
    @yield('content')
    @include('inc.footer')
    @yield('scripts')

<script src="{{asset('front/node_modules/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('front/node_modules/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('front/node_modules/owl.carousel/dist/owl.carousel.min.js')}}"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script src="{{asset('front/js/jquery.easing.min.js')}}"></script>
<script src="{{asset('front/js/jquery.magnific-popup.min.js')}}"></script>

<script src="{{asset('front/js/Main.js')}}"></script>
<script>
  $('#datepicker').datepicker({
      uiLibrary: 'bootstrap4'
  });
  $('#datepicker2').datepicker({
      uiLibrary: 'bootstrap4'
  });
</script>


</body>
</html>
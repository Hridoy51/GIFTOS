<!DOCTYPE html>
<html>

<head>
  @include('home.css')
</head>

<body>
  <div class="hero_area">

    @include('home.header')

    @include('home.slider')

  </div>

  @include('home.product')

  @include('home.contact')

  @include('home.info')<!-- footer section is inside info -->


  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('js/custom.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
    @if(Session::has('message'))
    toastr.options = {
      "closeButton": true,
      "progressBar": true,
      "timeOut": "5000"
    }

    // Determine the message type
    let messageType = "{{ session('message_type') ?? 'info' }}";

    switch (messageType) {
      case 'success':
      toastr.success("{{ session('message') }}");
      break;
      case 'error':
      toastr.error("{{ session('message') }}");
      break;
      case 'warning':
      toastr.warning("{{ session('message') }}");
      break;
      case 'info':
      default:
      toastr.info("{{ session('message') }}");
      break;
    }
  @endif
  </script>

</body>

</html>
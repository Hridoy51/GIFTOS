<!DOCTYPE html>
<html>

<head>
  @include('home.css')
</head>

<body>
  <div class="hero_area">

    @include('home.header')

    <section class="contact_section layout_padding">
      <div class="container px-0">
        <div class="heading_container ">
          <h2 class="">
            Contact Us
          </h2>
        </div>
      </div>
      <div class="container container-bg">
        <div class="row">
          <div class="col-lg-7 col-md-6 px-0">
            <div class="map_container">
              <div class="map-responsive">
                <iframe
                  src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France"
                  width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%"
                  allowfullscreen></iframe>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-5 px-0">
            <form action="#">
              <div>
                <input type="text" placeholder="Name" />
              </div>
              <div>
                <input type="email" placeholder="Email" />
              </div>
              <div>
                <input type="text" placeholder="Phone" />
              </div>
              <div>
                <input type="text" class="message-box" placeholder="Message" />
              </div>
              <div class="d-flex ">
                <button>
                  SEND
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

  </div>



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
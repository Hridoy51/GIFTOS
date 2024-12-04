<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  <style>
    .div_deg {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 60px;
    }
  </style>
</head>

<body>
  <div class="hero_area">

    @include('home.header')


  </div>

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          All Products
        </h2>
      </div>
      <div class="row">

        @foreach ($products as $product)


      <div class="col-sm-6 col-md-4 col-lg-3">
        <div class="box">
        <a href="{{url('product_details', $product->id)}}">
          <div class="img-box">
          <img src="products/{{$product->image}}" alt="Loading">
          </div>
          <div class="detail-box">
          <h6>
            {{$product->title}}
          </h6>
          <h6>
            Price
            <span>
            ${{$product->price}}
            </span>
          </h6>
          </div>
          <a class="btn btn-info" href="{{url('product_details', $product->id)}}">Details</a>
          <a class="btn btn-warning" href="{{url('add_cart', $product->id)}}">Add to Cart</a>
        </a>
        </div>
      </div>

    @endforeach
      </div>

    </div>
    <div class="div_deg">
      {{$products->onEachSide(1)->links()}}
    </div>
  </section>


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
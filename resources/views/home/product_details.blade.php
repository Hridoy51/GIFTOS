<!DOCTYPE html>
<html>

<head>
  @include('home.css')
  <style>
    .div_center {
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 30px;
    }

    .detail-box {
      padding: 15px;
    }
  </style>
</head>

<body>
  <div class="hero_area">

    @include('home.header')

  </div>
  <!----Product details start here------>

  <section class="shop_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Details of the Product
        </h2>
      </div>
      <div class="row">

        <div class="col-md-12">
          <div class="box">

            <div class="div_center">
              <img width="350px" src="/products/{{$data->image}}" alt="Loading">
            </div>
            <div class="detail-box">
              <h6>
                {{$data->title}}
              </h6>
              <h6>
                Price
                <span>
                  ${{$data->price}}
                </span>
              </h6>
            </div>
            <div class="detail-box">
              <h6>
                Category : {{$data->category}}
              </h6>
              <h6>
                Available Quantity :
                <span>
                  {{$data->quantity}}
                </span>
              </h6>
            </div>
            <div class="detail-box">
              <p>Description : {{$data->description}}</p>
            </div>
            <div>
              <a class="btn btn-warning" href="{{url('add_cart', $data->id)}}">Add to Cart</a>
            </div>

          </div>
        </div>


      </div>

    </div>
  </section>

  <!----Product details end here------>
  @include('home.info')<!-- footer section is inside info -->


  <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
  <script src="{{asset('js/bootstrap.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <script src="{{asset('js/custom.js')}}"></script>

</body>

</html>
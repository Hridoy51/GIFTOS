<!DOCTYPE html>
<html>

<head>
    @include('home.css')

    <style>
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-left: 20px;
            margin-right: 20px;
        }

        .add_title {
            margin-top: 30px;
            color: black;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;

        }

        .table_deg {
            width: 65%;
            text-align: center;
            border: 2px solid black;
        }

        th {
            background-color: black;
            font-size: 20px;
            font-weight: bold;
            color: white;
            text-align: center;
            border: 2px solid black;
        }

        td {
            color: black;
            padding: 10px;
            border: 1px solid skyblue;

        }

        .total_price {
            text-align: center;
            margin-bottom: 70px;
            padding: 18px;
        }

        .order_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            padding-right: 5px;
            margin-top: -50px;

        }

        label {
            width: 100px;
        }

        .div_gap {
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="hero_area">

        @include('home.header')

    </div>

    <div>
        <h1 class="add_title">My Cart</h1>
        <div class="div_deg">

            <table class="table_deg">
                <tr>
                    <th>Product Title</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Remove</th>
                </tr>

                <?php
$value = 0;
                ?>
                @foreach ($carts as $cart)

                                <tr>
                                    <td>{{$cart->product->title}}</td>
                                    <td>{{$cart->product->category}}</td>
                                    <td>{{$cart->product->price}}</td>
                                    <td><img width="150" src="/products/{{$cart->product->image}}" alt="Loading"></td>
                                    <td><a class="btn btn-danger" onclick="confirmation(event)"
                                            href="{{url('remove_from_cart', $cart->id)}}">Remove</a></td>
                                </tr>
                                <?php
                    $value = $value + $cart->product->price;
                                                                                                                    ?>
                @endforeach

            </table>
        </div>
        <div class="div_deg">
            {{$carts->onEachSide(1)->links()}}
        </div>
        <div class="total_price">
            <h3>
                Total Price of the Cart is : ${{$value}}
            </h3>
        </div>
        <div class="order_deg">
            <div>
                <h1 class="add_title">Place Order</h1>
                <form action="{{url('place_order')}}" method="post">
                    @csrf
                    <div class="div_gap">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{Auth::user()->name}}">
                    </div>

                    <div class="div_gap">
                        <label for="address">Address</label>
                        <textarea name="address">{{Auth::user()->address}}</textarea>
                    </div>

                    <div class="div_gap">
                        <label for="phone">Phone</label>
                        <input type="text" name="phone" value="{{Auth::user()->phone}}">
                    </div>

                    <div class="div_gap">

                        <input class="btn btn-warning" type="submit" value="Cash on Delivery">
                        <a class="btn btn-danger" href="{{url('stripe', $value)}}">Online Payment</a>
                    </div>


                </form>
            </div>

        </div>
    </div>



    @include('home.info')<!-- footer section is inside info -->


    <script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <script src="{{asset('js/custom.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            swal({
                title: "Are You Sure to Remove this",
                text: "This removal will be parmanent",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willCancel) => {
                    if (willCancel) {
                        window.location.href = urlToRedirect;
                    }
                });
        }
    </script>

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
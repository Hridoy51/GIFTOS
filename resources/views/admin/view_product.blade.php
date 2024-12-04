<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style type="text/css">
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }

        .add_title {
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        .table_deg {
            width: 80%;
            text-align: center;
            border: 2px solid #ee6f89;
            border-collapse: collapse;
        }

        th {
            background-color: skyblue;
            padding: 15px;
            font-size: 20px;
            font-weight: bold;
            color: white;
        }

        td {
            color: white;
            padding: 10px;
            border: 1px solid skyblue;

        }

        input[tyepe='search'] {
            width=500px;
            height: 70px !important;
            margin-left: 50px;
        }

        .search_product {
            display: flex;
            justify-content: right;
            align-items: right;
            margin-top: 50px;
            width: 90%;
            height: auto;

        }

        .footer {
            text-align: center;
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')
    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">


                <h1 class="add_title">Products / Inventory</h1>
                <div class="search_product">
                    <form action="{{url('search_product')}}" method="get">
                        <input type="search" name="search" placeholder="search for products">
                        <input class="btn btn-primary" type="submit" value="Search">
                    </form>
                </div>

                <div class="div_deg">
                    <table class="table_deg">
                        <tr>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>

                        </tr>

                        @foreach ($data as $product)
                            <tr>
                                <td>{{$product->title}}</td>
                                <td>{!!Str::limit($product->description, 50)!!}</td>
                                <td>{{$product->category}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->quantity}}</td>
                                <td>
                                    <img height="120px" width="120" src="products/{{$product->image}}" alt="Loading">
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="{{url('edit_product', $product->id)}}">Edit</a>
                                </td>

                                <td>
                                    <a class="btn btn-danger" onclick="confirmation(event)"
                                        href="{{url('delete_product', $product->id)}}">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <div class="div_deg">
                    {{$data->onEachSide(1)->links()}}
                </div>
            </div>

        </div>
        <footer class="footer" style="text-align: center;">
            <div class="footer__block block no-margin-bottom">
                <div class="container-fluid text-center">
                    <p class="no-margin-bottom">2024 &copy; GIFTOS.</p>
                </div>
            </div>
        </footer>
    </div>

    </div>
    <!-- JavaScript files-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            swal({
                title: "Are You Sure to Delete this",
                text: "This delete will be parmanent",
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
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
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
<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style type="text/css">
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 15px;
            font-size: 15px;
            width: 100%;
        }

        .div-deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 15px;
        }

        .add_title {
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .table_deg {
            width: 100%;
            text-align: center;
            border: 2px solid white;
            margin-top: 50px;
            table-layout: auto;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid skyblue;
            color: white;
            text-align: center;
        }

        th {
            background-color: #0d98ba;
        }

        th:nth-child(1),
        td:nth-child(1) {
            width: 10%;
        }

        /* Customer_name */
        th:nth-child(2),
        td:nth-child(2) {
            width: 15%;
        }

        /* Address */
        th:nth-child(3),
        td:nth-child(3) {
            width: 10%;
        }

        /* Phone */
        th:nth-child(4),
        td:nth-child(4) {
            width: 12%;
        }

        /* Product_title */
        th:nth-child(5),
        td:nth-child(5) {
            width: 8%;
        }

        /* Price */
        th:nth-child(6),
        td:nth-child(6) {
            width: 10%;
        }

        /* Image */
        th:nth-child(7),
        td:nth-child(7) {
            width: 10%;
        }

        /* Status */
        th:nth-child(8),
        td:nth-child(8) {
            width: 10%;
        }

        /* Change Status */
        th:nth-child(9),
        td:nth-child(9) {
            width: 10%;
        }

        /* Print PDF */

        /* Style for horizontally aligned buttons */
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 5px;
            /* Adjusts space between buttons */
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

                <div>
                    <h1 class="add_title">The Placed Orders</h1>
                    <br>
                    <div class="div_deg">
                        <table>
                            <tr>
                                <th>Customer_name</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Product_title</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Payment</th>
                                <th>Status</th>
                                <th>Change Status</th>
                                <th>Print PDF</th>
                            </tr>
                            @foreach ($data as $order)

                                <tr>
                                    <td>{{$order->name}}</td>
                                    <td>{{$order->rec_address}}</td>
                                    <td>{{$order->phone}}</td>
                                    <td>{{$order->product->title}}</td>
                                    <td>{{$order->product->price}}</td>
                                    <td><img width="120" src="/products/{{$order->product->image}}" alt="Loading"></td>
                                    <td>{{$order->payment_status}}</td>
                                    <td>
                                        @if ($order->status == 'In progress' || $order->status == 'in progress')
                                            <span style="color:red">{{$order->status}}</span>
                                        @elseif ($order->status == 'On The Way')
                                            <span style="color:yellow">{{$order->status}}</span>
                                        @else
                                            <span style="color:#52cc00">{{$order->status}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-warning" href="{{url('on_the_way', $order->id)}}">On - Way</a>
                                        <a class="btn btn-success" href="{{url('delivered', $order->id)}}">Delivered</a>
                                    </td>

                                    <td>
                                        <a class="btn btn-primary" href="{{url('print_pdf', $order->id)}}">Print</a>
                                    </td>
                                </tr>

                            @endforeach
                        </table>
                    </div>
                    <div class="div-deg">
                        {{$data->onEachSide(1)->links()}}
                    </div>
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
    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
</body>

</html>
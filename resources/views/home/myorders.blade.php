<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @include('home.css')
    <style>
        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 60px;
        }

        .table_deg {
            border: 2px solid black;
            text-align: center;
            width: 80%;
        }

        th {
            border: 2px solid skyblue;
            background-color: black;
            color: white;
            font-size: 20px;
            font-weight: bold;
            text-align: center;
        }

        td {
            border: 1px solid skyblue;
            padding: 10px;
        }

        .add_title {
            margin-top: 30px;
            color: black;
            display: flex;
            justify-content: center;
            align-items: center;


        }
    </style>
</head>

<body>

    <div class="hero_area">

        @include('home.header')

        <div>
            <h1 class="add_title">My Orders</h1>
            <div class="div_deg">
                <table class="table_deg">
                    <tr>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Delivery Status</th>
                        <th>Image</th>
                        <th>Payment_status</th>
                    </tr>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{$order->product->title}}</td>
                            <td>{{$order->product->price}}</td>
                            <td>{{$order->status}}</td>
                            <td> <img width="120" src="products/{{$order->product->image}}" alt="Loading"> </td>
                            <td>{{$order->payment_status}}</td>
                        </tr>
                    @endforeach
                </table>


            </div>
            <div class="div_deg">
                {{$orders->onEachSide(1)->links()}}
            </div>
        </div>

    </div>

    @include('home.info')

</body>

</html>
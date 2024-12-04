<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Summary</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #4CAF50;
        }

        .customer-info,
        .product-info {
            margin-bottom: 20px;
            padding: 15px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        .customer-info h2,
        .product-info h2 {
            font-size: 20px;
            margin-top: 0;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            padding: 5px 0;
        }

        .product-details {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .product-image img {
            max-width: 150px;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Order Summary</h1>

        <!-- Customer Information -->
        <div class="customer-info">
            <h2>Customer Details</h2>
            <div class="info-item"><strong>Name:</strong>{{$data->name}}</div>
            <div class="info-item"><strong>Address:</strong> {{$data->rec_address}}</div>
            <div class="info-item"><strong>Phone Number:</strong>{{$data->phone}}</div>
        </div>

        <!-- Product Information -->
        <div class="product-info">
            <h2>Product Details</h2>
            <div class="product-details">
                <div class="product-image">
                    <img src="products/{{$data->product->image}}" alt="Product Image">
                </div>
                <div class="product-description">
                    <div class="info-item"><strong>Product Title:</strong>{{$data->product->title}} </div>
                    <div class="info-item"><strong>Category:</strong>{{$data->product->category}}</div>
                    <div class="info-item"><strong>Price:</strong>{{$data->product->price}}</div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; 2024 E-commerce Site. All rights reserved.
        </div>
    </div>
</body>

</html>
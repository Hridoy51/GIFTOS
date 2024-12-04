<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style type="text/css">
        input[type='text'] {
            width: 350px;
            height: 40px;
        }

        input[type='number'] {
            width: 350px;
            height: 40px;
        }

        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 60px;
        }

        .add_title {
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        label {
            display: inline-block;
            width: 200px;
            font-size: 18px !important;
            color: white !important;
        }

        textarea {
            width: 450px;
            height: 80px;
        }

        .input_deg {
            padding: 10px;
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
                    <h1 class="add_title">Edit Product Info</h1>
                    <div class="div_deg">
                        <form action="{{url('update_product', $data->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="input_deg">
                                <label for="title">Product Title</label>
                                <input class="rounded-3" type="text" name="title" value="{{$data->title}}">
                            </div>
                            <div class="input_deg">
                                <label for="description">Product Description</label>
                                <textarea class="rounded-3" name="description">{{$data->description}}</textarea>
                            </div>
                            <div class="input_deg">
                                <label for="price">Product Price</label>
                                <input class="rounded-3" type="text" name="price" value="{{$data->price}}">
                            </div>
                            <div class="input_deg">
                                <label for="quantity">Product Quantity</label>
                                <input class="rounded-3" type="number" name="quantity" value="{{$data->quantity}}">
                            </div>
                            <div class="input_deg">
                                <label for="category">Product Category</label>
                                <select name="category" required>

                                    <option value="{{$data->category}}">{{$data->category}}</option>

                                    @foreach ($category as $cat)
                                        <option value="{{$cat->category_name}}">{{$cat->category_name}}</option>
                                    @endforeach
                                </select>


                            </div>
                            <div class="input_deg">
                                <label>Product current Image</label>
                                <img width="150" src="/products/{{$data->image}}" alt="">
                            </div>
                            <div class="input_deg">
                                <label for="image">Product New Image</label>
                                <input class="rounded-3" type="file" name="image">
                            </div>
                            <div class="input_deg">
                                <input class="btn btn-primary" type="submit" value="Update Product">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
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
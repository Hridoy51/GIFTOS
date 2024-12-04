<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style type="text/css">
        input[type='text'] {
            width: 400px;
            height: 36px;
        }

        .div-deg {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 30px;
        }

        .add_title {
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;

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
                    <h1 class="add_title">Update Category</h1>
                    <div class="div-deg">

                        <form action="{{url('update_category', $data->id)}}" method="post"> @csrf
                            <input type="text" name="category" value="{{$data->category_name}}">
                            <input class="btn btn-primary" type="submit" value="Update">
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
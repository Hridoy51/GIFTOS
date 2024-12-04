<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use Stripe;
use Session;
class HomeController extends Controller
{
    public function index()
    {
        $user = User::where('usertype', 'user')->get()->count();
        $product = Product::all()->count();
        $order = Order::all()->count();
        $delivered = Order::where('status', 'Delivered')->get()->count();
        return view('admin.index', compact('user', 'order', 'product', 'delivered'));
    }
    public function home()
    {
        $products = Product::paginate(8);
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
        } else {
            $count = '';
        }

        return view('home.index', compact('products', 'count'));
    }

    public function login_home()
    {
        $products = Product::all();
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
        } else {
            $count = '';
        }
        return view('home.index', compact('products', 'count'));
    }

    public function product_details($id)
    {
        $data = Product::find($id);
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
        } else {
            $count = '';
        }
        return view('home.product_details', compact('data', 'count'));
    }

    public function add_cart($id)
    {
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;
        $data = new Cart();
        $data->user_id = $user_id;
        $data->product_id = $product_id;
        $data->save();
        return redirect()->back()->with(['message' => 'Product has been added to the cart successfully', 'message_type' => 'success']);

    }

    public function mycart()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();

            $carts = Cart::where('user_id', $user_id)->paginate(5);
        }
        return view('home.mycart', compact('count', 'carts'));
    }

    public function place_order(Request $request)
    {
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $userid = Auth::user()->id;
        $carts = Cart::where('user_id', $userid)->get();

        foreach ($carts as $cart) {
            $order = new Order();
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->product_id = $cart->product_id;
            $order->save();

        }

        $cart_remove = Cart::where('user_id', $userid)->get();

        foreach ($cart_remove as $remove) {
            $data = Cart::find($remove->id);
            $data->delete();
        }
        return redirect()->back()->with(['message' => 'The ordered placed successfully', 'message_type' => 'success']);


    }

    public function myorders()
    {

        $user = Auth::user()->id;
        $count = Cart::where('user_id', $user)->get()->count();
        $orders = Order::where('user_id', $user)->paginate(5);

        return view('home.myorders', compact('count', 'orders'));
    }

    public function stripe($value)
    {
        $val = $value;
        return view('home.stripe', compact('val'));

    }
    public function stripePost(Request $request, $val)
    {

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));



        Stripe\Charge::create([

            "amount" => $val * 100,

            "currency" => "usd",

            "source" => $request->stripeToken,

            "description" => "Test payment from Complete"

        ]);



        $name = Auth::user()->name;
        $phone = Auth::user()->phone;
        $address = Auth::user()->address;
        $userid = Auth::user()->id;
        $carts = Cart::where('user_id', $userid)->get();

        foreach ($carts as $cart) {
            $order = new Order();
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $userid;
            $order->product_id = $cart->product_id;
            $order->payment_status = "Paid";
            $order->save();

        }

        $cart_remove = Cart::where('user_id', $userid)->get();

        foreach ($cart_remove as $remove) {
            $data = Cart::find($remove->id);
            $data->delete();
        }
        return redirect('/mycart')->with(['message' => 'The ordered placed successfully', 'message_type' => 'success']);

    }

    public function shop()
    {
        $products = Product::paginate(12);
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
        } else {
            $count = '';
        }

        return view('home.shop', compact('products', 'count'));
    }

    public function why()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
        } else {
            $count = '';
        }

        return view('home.why', compact('count'));
    }

    public function testimonial()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
        } else {
            $count = '';
        }

        return view('home.testimonial', compact('count'));
    }

    public function contactus()
    {
        if (Auth::id()) {
            $user = Auth::user();
            $user_id = $user->id;
            $count = Cart::where('user_id', $user_id)->count();
        } else {
            $count = '';
        }

        return view('home.contactus', compact('count'));
    }

    public function remove_from_cart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect('/mycart')->with(['message' => 'The product has been removed from cart successfully', 'message_type' => 'success']);
    }

}

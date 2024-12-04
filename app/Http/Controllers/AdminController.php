<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::paginate(5);
        return view('admin.category', compact('data'));
    }

    public function add_category(Request $request)
    {
        $category = new Category();
        $category->category_name = $request->category;
        $category->save();
        // toastr()->closeButton()->timeOut(5000)->addSuccess('Category added Successfully');
        return redirect()->back()->with(['message' => 'Category added successfully', 'message_type' => 'success']);
    }

    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        // toastr()->closeButton()->timeOut(5000)->addSuccess('Category added Successfully');
        return redirect()->back()->with(['message' => 'Category deleted successfully', 'message_type' => 'success']);
    }

    public function edit_category($id)
    {
        $data = Category::find($id);
        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id)
    {
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();

        return redirect('/view_category')->with(['message' => 'Category Updated successfully', 'message_type' => 'success']);
    }

    public function add_product()
    {
        $category = Category::all();
        return view('admin.add_product', compact('category'));
    }

    public function upload_product(Request $request)
    {
        $data = new Product();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;

        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $data->image = $imagename;
        }
        $data->save();
        return redirect()->back()->with(['message' => 'Product has been added successfully', 'message_type' => 'success']);
    }

    public function view_product()
    {
        $data = Product::paginate(5);
        return view('admin.view_product', compact('data'));
    }

    public function delete_product($id)
    {
        $data = Product::find($id);
        $image_path = public_path('products/' . $data->image);
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $data->delete();
        return redirect()->back()->with(['message' => 'Category deleted successfully', 'message_type' => 'success']);
    }

    public function edit_product($id)
    {
        $data = Product::find($id);
        $category = Category::all();
        return view('admin.edit_product', compact('data', 'category'));
    }

    public function update_product(Request $request, $id)
    {
        $data = Product::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;
        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('products', $imagename);
            $data->image = $imagename;
        }
        $data->save();
        return redirect('/view_product')->with(['message' => 'Product info Updated successfully', 'message_type' => 'success']);
    }

    public function search_product(Request $request)
    {
        $key = $request->search;
        $data = Product::where('title', 'like', '%' . $key . '%')->orWhere('category', 'like', '%' . $key . '%')->paginate(5);
        return view('admin.view_product', compact('data'));
    }

    public function view_orders()
    {
        $data = Order::paginate(5);
        return view('admin.view_orders', compact('data'));
    }

    public function on_the_way($id)
    {
        $order = Order::find($id);
        $order->status = 'On The Way';
        $order->save();
        return redirect()->back();
    }

    public function delivered($id)
    {
        $order = Order::find($id);
        $order->status = 'Delivered';
        $order->save();
        return redirect()->back();
    }
    public function print_pdf($id)
    {
        $data = Order::find($id);
        $pdf = Pdf::loadView('admin.invoice', compact('data'));
        return $pdf->download('invoice.pdf');

    }

}

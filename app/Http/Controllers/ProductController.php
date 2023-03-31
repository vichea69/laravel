<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $category = Category::all();
        $products = Product::orderBy("id", 'desc')->get();
        return view('Admin.index', compact('products', 'category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' =>'required|exists:categories,id',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:20000'
        ]);
        $product = new product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $extension = $request->file('image')->extension();
        $fileName = date('ymdHis') . '.' . $extension;
        $request->file('image')->move(public_path('uploads/'), $fileName);
        $product->image = $fileName;
        $product->save();
        return redirect()->route('Admin.index');

    }
    public function edit($id)
    {

        $product = Product::where('id', $id)->first();
//        dd($product);
        return view('Admin.edit', compact('product'));
    }
    public function update($id, Request $request)
    {

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' =>'required|exists:categories,id'
        ]);

        $product = Product::where('id', $id)->first();

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048'
            ]);
            if (file_exists(public_path('uploads/' . $product->image)) and !empty($product->image)) {
                unlink(public_path('uploads/' . $product->image));
            }
            $extension = $request->file('image')->extension();
            $fileName = date('ymdHis') . '.' . $extension;
            $request->file('image')->move(public_path('uploads/'), $fileName);

        }
        $product->title = $request->title;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->image = $fileName;
        $product->update();
        return redirect()->route('Admin.index');
    }
    public function delete($id)
    {

        $product = Product::where('id', $id)->first();
        if (file_exists(public_path('uploads/' . $product->image)) and !empty($product->image)) {
            unlink(public_path('uploads/' . $product->image));
        }
        $product->delete();
        return redirect()->route('Admin.index');
    }
}

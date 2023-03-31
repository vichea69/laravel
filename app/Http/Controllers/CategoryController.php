<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
class CategoryController extends Controller
{
    public function index()
    {
    $category  = Category::all();
        return view('Category.index', compact('category'));
    }
    public function create(){
        return view('Category.create');
    }
    public function store(Request $request)
    {
        $category = new category();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('Category.index');
    }
    public function edit($id)
    {
        $category  = Category::where('id', $id)->first();
        return view('Category.edit', compact('category'));
    }
    public function update($id, Request $request)
    {
        $category  = Category::where('id', $id)->first();
        $category ->name = $request->name;
        $category ->update();
        return redirect()->route('Category .index');
    }
    public function delete($id)
    {
        $category= Category::where('id', $id)->first();
        $category->delete();
        return redirect()->route('Category.index');
    }
}

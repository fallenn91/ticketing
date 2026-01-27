<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function showProducts()
    {
      return view ('layouts.products');
    }

    public function showAddProducts(){
      $categories = Category::all();
      return view('/products/add', compact('categories'));
    }

    public function add(Request $request)
    {

      $request->validate([
        'name' => 'required|string|max:50|unique:products,name',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'img' => 'required|image|max:2048|mimes:jpg,png,jpeg',
      ]);

      $path = null;
      if ($request->hasFile('img')) {
        $file = $request->file('img');
        $path = $file->storeAs('products', $file->getClientOriginalName(), 'public');
      }

      Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'category_id' => $request->category_id,
        'img' => $path,
      ]);

      return redirect()->route('products.list');
    }

    public function list()
    {
      $products = Product::all();
      $category = null;
      return view('/products/list', compact('products', 'category'));
    }

    public function destroy($id)
    {
      $product = Product::findOrFail($id);
      $product->delete();

      return redirect()->back()->with('success', 'Product eliminated');
    }

    public function categoryProduct($category)
    {
      
        $categoryModel = Category::where('name', $category)->first();

        if (!$categoryModel) {
          return redirect()->route('products.list')->with('error', 'Category not found.');
        }

        $products = $categoryModel->products; // Relacion
      

      return view('products.list', [
        'products' => $products, 
        'category' => $categoryModel
        ]);
      
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function showCategory()
    {
      $categories = Category::all();
      
      return view('categories.list', compact('categories'));
    }

    public function add()
    {
      return view('categories.add');
    }

    public function addCategory(Request $request)
    {
      $request->validate([
        'name' => 'required|string|max:15|unique:categories,name',
      ],
      [
        'name.required' => 'Name is required.',
        'name.max' => 'Name max 15 characters.',
        'name.unique' => 'Name already exists.'
      ]);

      Category::create([
        'name' => $request->name,
      ]);

      return redirect()->route('category.list');
    }

    public function destroy($id)
    {
      $category = Category::findOrFail($id);
      $category->delete();

      return redirect()->back()->with('success', 'Category deleted successfully.');
    }

    public function showProduct($categoryId)
    {
      $category = Category::findOrFail($categoryId);
      $products = $category->products;

      return view('products.list', compact('category', 'products'));
    }
}

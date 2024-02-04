<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
class ProductController extends Controller
{
    public function __construct()
    {   //
        // 
        $this->middleware(function ($request, $next) {
            return $next($request);
        });
    }
    public function index()
    {
       // Temporarily disable authorization to allow everyone to access the product list
        // Comment out or remove the following line
        // $this->authorize('viewAny', Product::class);

        // Logic to fetch and display products
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    public function guest(){
        $products = Product::all();
        return view('client.catalogo', ['products' => $products]);
    }

    public function create()
    {
        // Check if the user has the necessary role (role 0)
        //$this->authorize('create', Product::class);

        // Logic to show the create form
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'stock' => 'required|integer',
            'category' => 'required|exists:categories,id',
            'price' => 'required|numeric',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    // Assuming you have a method like this in your controller
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'stock' => 'required|integer',
            'category' => 'required|exists:categories,id',
            'price' => 'required|numeric',
        ]);

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }


}

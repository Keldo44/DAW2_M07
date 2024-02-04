<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart(Request $request, $productId)
    {
        // Assuming you have authentication middleware to get the current user
        $userId = auth()->user()->id;

        // Check if a cart entry exists for the user and product
        $cartEntry = Cart::where('client', $userId)->where('product', $productId)->first();

        if ($cartEntry) {
            // If entry exists, increment the amount
            $cartEntry->increment('amount');
        } else {
            // If entry doesn't exist, create a new one with amount 1
            Cart::create([
                'client' => $userId,
                'product' => $productId,
                'amount' => 1,
            ]);
        }

        // Update product stock
        $product = Product::findOrFail($productId);

        // Check if there is enough stock
        if ($product->stock >= 1) {
            $product->decrement('stock');
        } else {
            // Handle insufficient stock error
            // You may want to redirect back with an error message
        }

        return redirect()->route('catalogo')->with('success', 'Product added to cart successfully.');;
    }

    public function viewCart(){
        try {
            // Assuming you have authentication middleware to get the current user
            $userId = auth()->user()->id;

            // Get the user's cart items
            $cartItems = Cart::where('client', $userId)->with('product')->get();

            // Check if cart items are found
            if ($cartItems->isEmpty()) {
                return view('cart.empty');
            }
            return view('cart.index', compact('cartItems'));
        } catch (\Exception $e) {
            return back()->with('error', 'Error retrieving cart items');
        }
    }


    public function deleteFromCart($cartId)
    {
        // Find the cart entry
        $cartEntry = Cart::findOrFail($cartId);

        // Update product stock
        $product = Product::findOrFail($cartEntry->product_id);
        $product->increment('stock');

        // Delete the cart entry
        $cartEntry->delete();

        return redirect()->route('cart.index')->with('success', 'Product removed from cart successfully.');
    }
    public function destroy($cartId)
    {
         // Find the cart entry
         $cartEntry = Cart::findOrFail($cartId);

         // Update product stock
         $product = Product::findOrFail($cartEntry->product_id);
         $product->increment('stock');
 
         // Delete the cart entry
         $cartEntry->delete();
 
         return redirect()->route('cart.index')->with('success', 'Product removed from cart successfully.');
    }
    

}

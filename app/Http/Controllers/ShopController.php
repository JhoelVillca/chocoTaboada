<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::with('batches')->get();

        // Calculate total stock and filter
        $availableProducts = $products->map(function ($product) {
            $product->total_stock = $product->batches->sum('quantity');
            return $product;
        });/*->filter(function ($product) {
            return $product->total_stock > 0;
        });*/


        return view('shop.index', ['prods' => $availableProducts]);
    }

    public function show($slug)
    {
        $product = Product::where('slug', $slug)->with('batches')->firstOrFail();
        $product->total_stock = $product->batches->sum('quantity');

        return view('shop.show', ['prod' => $product]);
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image_path
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Producto agregado al carrito!');
    }

    public function viewCart()
    {
        return view('shop.cart');
    }

    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->route('shop.cart')->with('success', 'Carrito vaciado!');
    }
}

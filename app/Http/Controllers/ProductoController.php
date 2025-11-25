<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Product::with('category')->get();
        return view('producto.index', ['prods' => $productos]);
    }

    public function create()
    {
        $categorias = Category::all();
        return view('producto.create', ['cats' => $categorias]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/products'), $imageName);
            $data['image_path'] = 'uploads/products/' . $imageName;
        }

        Product::create($data);

        return redirect('/producto');
    }

    public function edit($id)
    {
        $producto = Product::findOrFail($id);
        $categorias = Category::all();
        return view('producto.edit', ['prod' => $producto, 'cats' => $categorias]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $producto = Product::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/products'), $imageName);
            $data['image_path'] = 'uploads/products/' . $imageName;
        }

        $producto->update($data);

        return redirect('/producto');
    }

    public function destroy($id)
    {
        $producto = Product::findOrFail($id);
        $producto->delete();
        return redirect('/producto');
    }
}

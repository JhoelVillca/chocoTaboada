<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Category::all();
        return view('categoria.index', ['cats' => $categorias]);
    }

    public function create()
    {
        return view('categoria.create');
    }

    public function save(Request $request)
    {
        Category::create($request->all());
        return redirect('/categoria');
    }

    public function edit($id)
    {
        $categoria = Category::findOrFail($id);
        return view('categoria.edit', ['cat' => $categoria]);
    }

    public function update(Request $request, $id)
    {
        $categoria = Category::findOrFail($id);
        $categoria->update($request->all());
        return redirect('/categoria');
    }

    public function destroy($id)
    {
        $categoria = Category::findOrFail($id);
        $categoria->delete();
        return redirect('/categoria');
    }
}

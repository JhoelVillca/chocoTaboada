<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use Illuminate\Http\Request;

use App\Models\Product;

class LoteController extends Controller
{
    public function index()
    {
        $lotes = Batch::all();
        return view('lote.index', ['lotes' => $lotes]);
    }

    public function create()
    {
        $productos = Product::all();
        return view('lote.create', ['prods' => $productos]);
    }

    public function save(Request $request)
    {
        Batch::create($request->all());
        return redirect('/lote');
    }

    public function edit($id)
    {
        $lote = Batch::findOrFail($id);
        $productos = Product::all();
        return view('lote.edit', ['lote' => $lote, 'prods' => $productos]);
    }

    public function update(Request $request, $id)
    {
        $lote = Batch::findOrFail($id);
        $lote->update($request->all());
        return redirect('/lote');
    }

    public function destroy($id)
    {
        $lote = Batch::findOrFail($id);
        $lote->delete();
        return redirect('/lote');
    }
}

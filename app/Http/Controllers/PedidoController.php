<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Order::with('user')->orderBy('created_at', 'desc')->get();
        return view('pedido.index', ['pedidos' => $pedidos]);
    }

    public function create()
    {
        $clientes = User::all();
        $lotes = Batch::where('quantity', '>', 0)->with('product')->get();
        return view('pedido.create', ['clientes' => $clientes, 'lotes' => $lotes]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'lote_id' => 'required|array',
            'lote_id.*' => 'exists:batches,id',
            'quantity' => 'required|array',
            'quantity.*' => 'integer|min:1',
        ]);

        try {
            DB::beginTransaction();

            $order = Order::create([
                'user_id' => $request->user_id,
                'status' => 'paid', // Assuming paid for POS
                'total' => 0,
                'payment_method' => 'cash',
                'order_type' => 'pos',
                'shipping_address' => 'Local Store',
            ]);

            $total = 0;

            foreach ($request->lote_id as $index => $loteId) {
                $quantity = $request->quantity[$index];
                $lote = Batch::with('product')->findOrFail($loteId);

                if ($lote->quantity < $quantity) {
                    throw new \Exception("Stock insuficiente para el lote: " . $lote->batch_code);
                }

                $price = $lote->product->price;
                $subtotal = $price * $quantity;
                $total += $subtotal;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $lote->product_id,
                    'batch_id' => $lote->id,
                    'quantity' => $quantity,
                    'price' => $price,
                ]);

                $lote->decrement('quantity', $quantity);
            }

            $order->update(['total' => $total]);

            DB::commit();

            return redirect('/pedido')->with('success', 'Pedido creado correctamente');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error al crear el pedido: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $pedido = Order::with(['user', 'items.product', 'items.batch'])->findOrFail($id);
        return view('pedido.show', ['pedido' => $pedido]);
    }
}

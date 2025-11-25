<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Batch;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Total Ventas Mes Actual
        $totalVentasMes = Order::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->sum('total');

        // 2. Cantidad de Pedidos Pendientes
        $cantPedidosPendientes = Order::where('status', 'pending')->count();

        // 3. Productos Bajo Stock (Stock total <= min_stock_alert)
        // Obtenemos todos los productos y filtramos en la colección (o usamos subquery/having)
        // Para eficiencia en Laravel, podemos usar withSum y filtrar.
        $productosBajoStock = Product::withSum('batches', 'quantity')
            ->get()
            ->filter(function ($product) {
                return $product->batches_sum_quantity <= $product->min_stock_alert;
            })
            ->count();

        // 4. Últimos 5 Pedidos
        $ultimosPedidos = Order::with('user')
            ->latest()
            ->take(5)
            ->get();

        // 5. Lotes por Vencer (Próximos 30 días)
        $lotesPorVencer = Batch::where('expiration_date', '>=', Carbon::now())
            ->where('expiration_date', '<=', Carbon::now()->addDays(30))
            ->count();

        return view('dashboard.index', compact(
            'totalVentasMes',
            'cantPedidosPendientes',
            'productosBajoStock',
            'ultimosPedidos',
            'lotesPorVencer'
        ));
    }
}

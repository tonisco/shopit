<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\UtilsTrait;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	use UtilsTrait;

	public function index(Request $request)
	{
		$period = $this->getPeriod($request);

		$currentOrders = Order::whereDate('created_at', '>', $period)
			->count();

		$productOrdered = OrderProduct::whereDate('created_at', '>', $period)
			->sum('qty');

		$pendingOrder = Order::whereDate('created_at', '>', $period)
			->where('status', 'pending')
			->count();

		$pendingProductOrdered = OrderProduct::whereDate('created_at', '>', $period)
			->whereHas('order', function ($query) {
				$query->where('status', 'pending');
			})
			->sum('qty');

		$completedProductOrdered = OrderProduct::whereDate('created_at', '>', $period)
			->whereHas('order', function ($query) {
				$query->where('status', 'delivered');
			})
			->sum('qty');


		$completedOrder = Order::whereDate('created_at', '>', $period)
			->where('status', 'delivered')
			->count();

		$earnings = OrderProduct::whereDate('created_at', '>', $period)
			->whereHas('order', function ($query) {
				$query->where('status', 'delivered');
			})
			->sum('total');

		$pendingEarnings = OrderProduct::whereDate('created_at', '>', $period)
			->whereHas('order', function ($query) {
				$query->where('status', 'pending');
			})
			->sum('total');

		$mostSold = Product::whereDate('created_at', '>', $period)
			->withSum('orderProducts', 'qty')
			->orderBy('order_products_sum_qty', 'desc')
			->limit(5)
			->get();


		$lowestQuantities = Product::whereDate('created_at', '>', $period)
			->orderBy('qty')->limit(5)->get();

		$graphEarnings = OrderProduct::all()
			->where('created_at', '>', $period)
			->where(function ($query) {
				return $query->order()
					->get()
					->where('status', 'delivered');
			})
			->sortBy('created_at')
			->groupBy(function ($post) {
				return $post->created_at->format('Y M');
			})
			->map(function ($row) {
				return $row->sum('total');
			});

		return view("admin.index", [
			'currentOrders' => $currentOrders,
			'productOrdered' => $productOrdered,
			'pendingOrder' => $pendingOrder,
			'pendingProductOrdered' => $pendingProductOrdered,
			'completedOrder' => $completedOrder,
			'completedProductOrdered' => $completedProductOrdered,
			'earnings' => $earnings,
			'pendingEarnings' => $pendingEarnings,
			'mostSold' => $mostSold,
			'lowestQuantities' => $lowestQuantities,
			'graphEarnings' => $graphEarnings,
		]);
	}
}

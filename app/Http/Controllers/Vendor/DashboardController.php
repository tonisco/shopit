<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Traits\UtilsTrait;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
	use UtilsTrait;

	public function index(Request $request)
	{
		$period = $this->getPeriod($request);

		$currentOrders = Order::whereDate('created_at', '>', $period)
			->whereHas('orderProducts', function ($query) {
				$query->where('vendor_id', Auth::user()->vendor->id);
			})
			->count();

		$productOrdered = OrderProduct::whereDate('created_at', '>', $period)
			->where('vendor_id', Auth::user()->vendor->id)
			->sum('qty');

		$pendingOrder = Order::whereDate('created_at', '>', $period)
			->where('status', 'pending')
			->whereHas('orderProducts', function ($query) {
				$query->where('vendor_id', Auth::user()->vendor->id);
			})
			->count();

		$pendingProductOrdered = OrderProduct::whereDate('created_at', '>', $period)
			->where('vendor_id', Auth::user()->vendor->id)
			->whereHas('order', function ($query) {
				$query->where('status', 'pending');
			})
			->sum('qty');

		$completedProductOrdered = OrderProduct::whereDate('created_at', '>', $period)
			->where('vendor_id', Auth::user()->vendor->id)
			->whereHas('order', function ($query) {
				$query->where('status', 'delivered');
			})
			->sum('qty');


		$completedOrder = Order::whereDate('created_at', '>', $period)
			->where('status', 'delivered')
			->whereHas('orderProducts', function ($query) {
				$query->where('vendor_id', Auth::user()->vendor->id);
			})
			->count();

		$earnings = OrderProduct::whereDate('created_at', '>', $period)
			->where('vendor_id', Auth::user()->vendor->id)
			->whereHas('order', function ($query) {
				$query->where('status', 'delivered');
			})
			->sum('total');

		$pendingEarnings = OrderProduct::whereDate('created_at', '>', $period)
			->where('vendor_id', Auth::user()->vendor->id)
			->whereHas('order', function ($query) {
				$query->where('status', 'pending');
			})
			->sum('total');

		$customers = User::whereHas('orders', function ($query) use ($period) {
			$query->whereHas('orderProducts', function ($q) use ($period) {
				$q->where('vendor_id', Auth::user()->vendor->id)
					->whereDate('created_at', '>', $period);
			});
		})->count();

		$mostSold = Product::whereDate('created_at', '>', $period)
			->where('vendor_id', Auth::user()->vendor->id)
			->withSum('orderProducts', 'qty')
			->orderBy('order_products_sum_qty', 'desc')
			->limit(5)
			->get();


		$lowestQuantities = Product::whereDate('created_at', '>', $period)
			->where('vendor_id', Auth::user()->vendor->id)
			->orderBy('qty')->limit(5)->get();

		$graphEarnings = OrderProduct::all()
			->where('created_at', '>', $period)
			->where('vendor_id', Auth::user()->vendor->id)
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

		return view('vendor.index', compact(
			'currentOrders',
			'productOrdered',
			'pendingOrder',
			'pendingProductOrdered',
			'completedOrder',
			'completedProductOrdered',
			'earnings',
			'pendingEarnings',
			'customers',
			'mostSold',
			'lowestQuantities',
			'graphEarnings'
		));
	}
}

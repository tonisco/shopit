<?php

namespace App\Http\Controllers\vendor;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
	public function index(Request $request)
	{
		if ($request->ajax()) {
			$orders = Order::whereHas('orderProducts', function (Builder $query) {
				$query->where('vendor_id', Auth::user()->vendor->id);
			})
				->with(['user', 'orderProducts' => function ($val) {
					return $val->where('vendor_id', Auth::user()->vendor->id);
				}])
				->get();

			return DataTables::of($orders)
				->addColumn('sum', function ($query) {
					$total = $query->orderProducts->sum('total');
					return '$' . number_format($total);
				})
				->addColumn('items', function ($query) {
					return $query->orderProducts->sum('qty');
				})
				->addColumn('action', function ($query) {
					return route('vendor.orders.details', $query->id);
				})
				->make();
		}

		return view('vendor.Orders.index');
	}

	public function OrderDetails(string $id)
	{
		return view('vendor.Orders.details');
	}
}

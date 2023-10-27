<?php

namespace App\Http\Controllers\Admin;

use App\Enums\OrderStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Traits\UtilsTrait;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\ProductReview;
use App\Models\Transaction;
use App\Models\Vendor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	use UtilsTrait;

	public function index(Request $request)
	{
		$period = $this->getPeriod($request);

		$currentOrders = Order::whereDate('created_at', '>', $period)
			->count();

		$todayOrders = Order::whereDate('created_at', Carbon::today());

		$todayEarnings = OrderProduct::whereHas('order', function ($query) {
			$query->where('status', 'delivered');
		})->sum('total');

		$activeOrders = Order::where('status', '!=', OrderStatusEnum::Delivered)
			->where('status', '!=', OrderStatusEnum::Cancelled)
			->count();

		$newOrders = Order::where('status',  OrderStatusEnum::Created)
			->count();

		$cancelledOrders = Order::whereDate('created_at', '>', $period)
			->where('status', OrderStatusEnum::Cancelled)
			->count();

		$completedOrder = Order::whereDate('created_at', '>', $period)
			->where('status', OrderStatusEnum::Delivered)
			->count();

		$earnings = OrderProduct::whereDate('created_at', '>', $period)
			->whereHas('order', function ($query) {
				$query->where('status', 'delivered');
			})
			->sum('total');

		$totalBrands = Brand::all()->count();

		$totalCategories = Category::all()->count();

		$totalVendors = Vendor::all()->count();

		$totalReviews = ProductReview::all();

		$totalReviewsCount = $totalReviews->count();

		$reviewsArray = $totalReviews->toArray();
		$reviews = array_splice($reviewsArray, 5);

		// TODO: vendor request
		// TODO: vendor user and admin activities

		$activeEarnings = OrderProduct::whereDate('created_at', '>', $period)
			->whereHas('order', function ($query) {
				$query->where('status', '!=', OrderStatusEnum::Delivered)
					->where('status', '!=', OrderStatusEnum::Cancelled);
			})
			->sum('total');

		$mostSold = Product::whereDate('created_at', '>', $period)
			->withSum('orderProducts', 'qty')
			->with('vendor')
			->orderBy('order_products_sum_qty', 'desc')
			->limit(5)
			->get();


		$lowestQuantities = Product::whereDate('created_at', '>', $period)
			->with('vendor')
			->orderBy('qty')
			->limit(5)
			->get();

		$transactions = Transaction::limit(5)->get();
		$transactionsByDate = Transaction::whereDate('created_at', '>', $period)->limit(5)->get();

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
			'todayOrders' => $todayOrders,
			'todayEarnings' => $todayEarnings,
			'activeOrders' => $activeOrders,
			'completedOrder' => $completedOrder,
			'cancelledOrders' => $cancelledOrders,
			'earnings' => $earnings,
			'activeEarnings' => $activeEarnings,
			'mostSold' => $mostSold,
			'lowestQuantities' => $lowestQuantities,
			'graphEarnings' => $graphEarnings,
			'totalBrands' => $totalBrands,
		]);
	}
}

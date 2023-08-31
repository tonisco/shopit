<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderProductSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		//

		$products = Product::all();
		$orders = Order::with('shippingMethod')->get();

		foreach ($orders as $order) {
			$qty = $order->product_qty; // total quantity of product in order
			$used_product_id = []; // if product has been added

			$order_total = 0; // sum total of all products

			while ($qty > 0) {
				$item_len = rand(1, $qty);
				$qty -= $item_len;

				$product = $products[rand(0, count($products) - 1)];

				if (!in_array($product->id, $used_product_id)) {
					array_push($used_product_id, $product->id);

					OrderProduct::factory()
						->state([
							'price' => $product->price,
							'qty' => $item_len,
							'order_id' => $order->id,
							'product_id' => $product->id,
							'vendor_id' => $product->vendor_id,
							'product_name' => $product->name,
							'product_image' => $product->image,
							'total' => $product->price * $item_len,
							'created_at' => $order->created_at,
							'updated_at' => $order->created_at,
						])
						->create();

					$total = $item_len + $product->price;
					$order_total += $total;
				}
			}

			$order->sub_total = $order_total;
			$order->total = $order_total + $order->shippingMethod->cost;
			$order->save();
		}
	}
}

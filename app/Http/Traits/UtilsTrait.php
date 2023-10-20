<?php

namespace App\Http\Traits;

use Carbon\Carbon;
use Illuminate\Http\Request;

trait UtilsTrait
{
	public function searchForId($id, $array)
	{
		foreach ($array as $key => $val) {
			if ($val['id'] == $id) {
				return $key;
			}
		}
		return null;
	}

	public function getPeriod(Request $request)
	{
		$p = $request->get('p');
		$periods = [
			'today' => Carbon::now()->today(),
			'last_7_days' => Carbon::now()->subWeek(),
			'last_30_days' => Carbon::now()->subMonth(),
			'last_12_months' => Carbon::now()->subYear(),
		];

		if ($p && array_key_exists($p, $periods)) {
			return $periods[$p];
		} else {
			return Carbon::now()->subDecade();
		}
	}
}

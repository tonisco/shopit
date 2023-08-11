<?php

namespace App\Http\Traits;


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
}

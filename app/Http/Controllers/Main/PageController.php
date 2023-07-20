<?php

namespace App\Http\Controllers\main;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class PageController extends Controller
{
	public function about()
	{
		$about = About::first();
		return view('main.about', compact('about'));
	}

	public function contact()
	{
		return view('main.contact');
	}
}

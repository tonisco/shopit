<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
	/**
	 * Display the login view.
	 */
	public function create(): View
	{
		return view('auth.login');
	}

	/**
	 * Handle an incoming authentication request.
	 */
	public function store(LoginRequest $request): RedirectResponse
	{
		$request->authenticate();

		$request->session()->regenerate();


		if ($request->user()->status === 'inActive') {
			Auth::guard('web')->logout();
			$request->session()->regenerateToken();
			$error_message = ['title' => 'Account Banned', 'message' => 'Your account has been banned. Please connect with support'];
			Session::flash('info', $error_message);
			return redirect('/');
		}

		if ($request->user()->role === 'admin') {
			return redirect()->intended(route("admin.dashboard"));
		} else if ($request->user()->role === 'vendor') {
			return redirect()->intended(route("vendor.dashboard"));
		}

		return redirect()->intended(RouteServiceProvider::HOME);
	}

	/**
	 * Destroy an authenticated session.
	 */
	public function destroy(Request $request): RedirectResponse
	{
		Auth::guard('web')->logout();

		$request->session()->invalidate();

		$request->session()->regenerateToken();

		return redirect('/');
	}
}

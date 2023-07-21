<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Exception;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
	public function redirectToGoogle()
	{
		return Socialite::driver('google')->redirect();
	}

	public function handleCallback()
	{
		try {
			$user = Socialite::driver('google')->user();

			$find_user = User::where('email', $user->email)->first();

			if ($find_user) {
				notify()->error('Your account has been banned. Please connect with support', 'Account Banned');
				return redirect('/');
			}

			if (!$find_user) {
				$find_user = User::create([
					'email' => $user->email,
					'first_name' => $user->user['given_name'],
					'last_name' => $user->user['family_name'],
					'password' => encrypt($user->id),
				]);
			}

			Auth::login($find_user);

			$user = Auth::user();

			if ($user->role === 'admin') {
				return redirect()->intended('/admin/dashboard');
			} else if ($user->role === 'vendor') {
				return redirect()->intended('/vendor/dashboard');
			}

			return redirect()->intended('/');
		} catch (Exception $e) {
			return redirect()->route('login')->withErrors(['oauth' => $e->getMessage()]);
		}
	}
}

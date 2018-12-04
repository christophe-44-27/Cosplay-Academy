<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserAdminRole {
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure                 $next
	 * @return mixed
	 */
	public function handle($request, Closure $next) {
		if (!Auth::user()->is_admin) {
			$request->session()->flash('error', "Vous n'avez pas l'autorisation d'accéder à cette page.");
			return redirect(route('homepage'));
		}
		return $next($request);
	}
}

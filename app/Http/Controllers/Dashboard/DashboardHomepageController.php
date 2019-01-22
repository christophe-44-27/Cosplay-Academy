<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardHomepageController extends Controller {
	public function __construct() {
		$this->middleware('auth');
	}

	public function index() {
        $controller = 'dashboard';
        return view('dashboard.homepage', compact('controller'));
	}
}

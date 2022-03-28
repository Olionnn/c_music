<?php namespace App\Controllers\Main;

// Load model
// End load model

class Dashboard extends BaseController
{

	public function index() {
		return view('main/setting');
	}
}
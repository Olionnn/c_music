<?php namespace App\Controllers\Main;

// Load model
// End load model

class Setting extends BaseController
{

	public function index() {
		$this->session->get('user_username');

		return view('main/setting');
	}
}
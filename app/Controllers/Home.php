<?php

namespace App\Controllers;

use App\Models\DataDiriModel;

class Home extends BaseController
{
	public function index()
	{
		$model = new DataDiriModel();
		$data = [
			'data' => $model->findAll()
		];
		return view('welcome_message', $data);
	}
}

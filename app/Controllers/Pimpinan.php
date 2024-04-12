<?php

namespace App\Controllers;

// use \Myth\Auth\Models\UserModel;

class Pimpinan extends BaseController
{
	// protected $userModel;
	// public function __construct()
	// {
	// 	$this->userModel = new UserModel();
	// }

	public function index()
	{
		$data = [
			'title' => 'Home Pimpinan | Penggajian Karyawan'
		];

		return view('pimpinan/index', $data);
	}
}

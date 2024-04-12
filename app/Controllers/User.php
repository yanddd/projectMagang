<?php

namespace App\Controllers;

// use \Myth\Auth\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        if (in_groups('admin')) {
            $data = [
                'title' => 'Home Admin | Penggajian Karyawan'
            ];

            return view('user/admin', $data);
        } else {
            $data = [
                'title' => 'Home Pimpinan | Penggajian Karyawan'
            ];

            return view('user/pimpinan', $data);
        }
    }
}

<?php

namespace App\Controllers;

use \Myth\Auth\Models\UserModel;
use App\Models\UserrModel;
use App\Models\GrupUserModel;

class Users extends BaseController
{
    protected $db, $builder;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->userrModel = new UserrModel();
        $this->grupUserModel = new GrupUserModel();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }

    // public function index()
    // {
    //     $data['title'] = 'List User';

    //     $this->builder->select('users.id as userid, username, email, foto, name as role');
    //     $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
    //     $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
    //     $query = $this->builder->get();
    //     $data['users'] = $query->getResultArray();

    //     return view('users/index', $data);
    // }

    public function index()
    {


        $data = [
            'title' => 'Daftar User',
            'users' => $this->userrModel->getUser(),
            'grup'  => $this->grupUserModel->getGrupUser(),

        ];

        return view('users/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Users',
            'validation' => \Config\Services::validation()
        ];

        return view('users/create', $data);
    }

    public function delete($id)
    {
        $users = $this->userrModel->find($id);

        // cek jika file gambarnya default
        if ($users['foto'] != 'undraw_profile.svg') {
            // hapus gambar
            unlink('images/' . $users['foto']);
        }

        $this->userrModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus!');

        return redirect()->to('/users');
    }

    public function changeRole($id)
    {
        $this->grupUserModel->save([
            'id' => $id,
            'group_id' => $this->request->getVar('group_id'),
        ]);

        return redirect()->to('/users');
    }

    public function changeActive($id)
    {
        $this->userrModel->save([
            'id' => $id,
            'active' => $this->request->getVar('active'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil dihapus!');
        return redirect()->to('/users');
    }

    public function detail($id = 0)
    {
        $data['title'] = 'Detail User';
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id as userid, username, email, nama_depan, nama_belakang, tanggal_lahir, jK, no_hp, alamat, foto, active, name as role, group_id');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('users.id', $id);
        $query = $builder->get();
        $data['users'] = $query->getRowArray();

        return view('users/detail', $data);
    }
}

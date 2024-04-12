<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\UserrModel;
use Myth\Auth\Password;
use PhpParser\Node\Stmt\Echo_;

class Akun extends BaseController
{
    protected $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->userrModel = new UserrModel();
    }

    public function index()
    {
        $data['title'] = 'Info Akun';
        $users = new \Myth\Auth\Models\UserModel();
        $data['validation'] = \Config\Services::validation();
        $data['users'] = $users->findAll();
        $data['grup'] =  $this->userrModel->getUser();
        return view('akun/index', $data);
    }

    public function update($id)
    {
        $fileFoto = $this->request->getFile('foto');

        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('images', $namaFoto);
            if ($this->request->getVar('fotoLama') != 'undraw_profile.svg') {
                unlink('images/' . $this->request->getVar('fotoLama'));
            }
        }

        $params = [
            'id' => $id,
            'nama_depan' => $this->request->getVar('nama_depan'),
            'nama_belakang' => $this->request->getVar('nama_belakang'),
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'jK' => $this->request->getVar('jK'),
            'no_hp' => $this->request->getVar('no_hp'),
            'foto' => $namaFoto
        ];

        $userSelected = $this->userModel->find($id);
        $userSelected->fill($params);
        // $userSelected->password = $this->request->getVar('password_hash');
        $this->userModel->save($userSelected);

        session()->setFlashdata('pesan', 'Active');

        return redirect()->to('/akun');
    }

    private function getChangePasswordRules()
    {
        $rules = [
            'current_pass' => [
                'label'  => 'Password Lama',
                'rules'  => 'required'
            ],
            'new_pass' => [
                'label'  => 'Password baru',
                'rules'  => 'required'
            ],
            'repeat_pass' => [
                'label'  => 'Konfirmasi password',
                'rules'  => 'required|matches[new_pass]'
            ],

        ];

        return $rules;
    }

    public function changePassword()
    {

        $user = user();

        $currentPass = $this->request->getPost('current_pass');
        $newPass = $this->request->getPost('new_pass');

        $rules = $this->getChangePasswordRules();

        session()->setFlashdata('isChangePw', true);

        if ($this->validate($rules)) {

            if (Password::verify($currentPass, $user->password_hash)) {
                $user->password = $newPass;
                // $this->userModel->save($user);

                session()->setFlashdata('pesan', 'Data Akun berhasil diubah!');

                return redirect()->to('/akun');
            } else {
                $this->validator->setError('verify', 'Password lama salah!');
            }
        }

        return redirect()->to('/akun')->withInput()->with('errors', $this->validator->getErrors());
    }
}

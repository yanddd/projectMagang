<?php

namespace App\Controllers;

use App\Models\KaryawanModel;

class Karyawan extends BaseController
{
    protected $karyawanModel;
    public function __construct()
    {
        $this->karyawanModel = new KaryawanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Karyawan',
            'karyawan' => $this->karyawanModel->getKaryawan(),
            'pager' => $this->karyawanModel->pager,
        ];

        return view('karyawan/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Data Karyawan',
            'validation' => \Config\Services::validation()
        ];

        return view('karyawan/create', $data);
    }

    public function save()
    {
        // validasi input
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[data_karyawan.nama]',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'email' => [
                'rules' => 'required|is_unique[data_karyawan.email]',
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'no_hp' => [
                'rules' => 'required|is_unique[data_karyawan.no_hp]',
                'errors' => [
                    'required' => 'no telpon harus di isi',
                    'is_unique' => 'no telpon sudah terdaftar'
                ]
            ],
            'jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi',
                ]
            ],
            'tempat_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi',
                ]
            ],
            'tgl_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi',
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi',
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/karyawan/create')->withInput();
        }

        // ambil gambar
        $fileFoto = $this->request->getFile('foto');
        // apakah tidak ada gambar yang di upload
        if ($fileFoto->getError() == 4) {
            $namaFoto = 'default2.jpg';
        } else {
            // generate nama Foto random
            $namaFoto = $fileFoto->getRandomName();
            // pindahkan file ke folder img
            $fileFoto->move('images', $namaFoto);
        }

        $this->karyawanModel->save([
            'nama' => $this->request->getVar('nama'),
            'jabatan' => $this->request->getVar('jabatan'),
            'email' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('no_hp'),
            'alamat' => $this->request->getVar('alamat'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'foto' => $namaFoto
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan!');

        return redirect()->to('/karyawan');
    }

    public function delete($id)
    {
        // cari gambar berdasarkan id
        $karyawan = $this->karyawanModel->find($id);

        // cek jika file gambarnya default
        if ($karyawan['foto'] != 'default2.jpg') {
            // hapus gambar
            unlink('images/' . $karyawan['foto']);
        }

        $this->karyawanModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus!');

        return redirect()->to('/karyawan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Ubah Data Karyawan',
            'validation' => \Config\Services::validation(),
            'karyawan' => $this->karyawanModel->getKaryawan($id)
        ];

        return view('karyawan/edit', $data);
    }

    public function update($id)
    {
        $dataLama = $this->karyawanModel->getKaryawan($this->request->getVar('id'));
        if ($dataLama['nama'] == $this->request->getVar('nama')) {
            $rule_nama = 'required';
            $rule_2 = 'required';
            $rule_3 = 'required';
        } else {
            $rule_nama = 'required';
            $rule_2 = 'required|is_unique[data_karyawan.no_hp]';
            $rule_3 = 'required|is_unique[data_karyawan.email]';
        }
        if ($dataLama['no_hp'] == $this->request->getVar('no_hp')) {
            $rule_2 = 'required';
        } else {
            $rule_2 = 'required|is_unique[data_karyawan.no_hp]';
        }
        if ($dataLama['email'] == $this->request->getVar('email')) {
            $rule_3 = 'required';
        } else {
            $rule_3 = 'required|is_unique[data_karyawan.email]';
        }
        if (!$this->validate([
            'nama' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} harus di isi.',
                ]
            ],
            'email' => [
                'rules' => $rule_3,
                'errors' => [
                    'required' => '{field} harus di isi',
                    'is_unique' => '{field} sudah terdaftar'
                ]
            ],
            'no_hp' => [
                'rules' => $rule_2,
                'errors' => [
                    'required' => 'no telpon harus di isi',
                    'is_unique' => 'no telpon sudah terdaftar'
                ]
            ],
            'jabatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi',
                ]
            ],
            'alamat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi',
                ]
            ],
            'tempat_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi',
                ]
            ],
            'tgl_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi',
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus di isi',
                ]
            ],
            'foto' => [
                'rules' => 'max_size[foto,1024]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to('/karyawan/edit/' . $this->request->getVar('id'))->withInput();
        }

        $fileFoto = $this->request->getFile('foto');

        if ($fileFoto->getError() == 4) {
            $namaFoto = $this->request->getVar('fotoLama');
        } else {
            $namaFoto = $fileFoto->getRandomName();
            $fileFoto->move('images', $namaFoto);
            if ($this->request->getVar('fotoLama') != 'default2.jpg') {
                unlink('images/' . $this->request->getVar('fotoLama'));
            }
        }

        $this->karyawanModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'jabatan' => $this->request->getVar('jabatan'),
            'email' => $this->request->getVar('email'),
            'no_hp' => $this->request->getVar('no_hp'),
            'alamat' => $this->request->getVar('alamat'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tgl_lahir' => $this->request->getVar('tgl_lahir'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'foto' => $namaFoto
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah!');

        return redirect()->to('/karyawan');
    }

    public function form($id)
    {

        $data = [
            'title' => 'Form Loker',
            'validation' => \Config\Services::validation(),
            'loker' => $this->lokerModel->getForm($id)
        ];

        return view('loker/form', $data);
    }

    public function saveCalon()
    {

        if (!$this->validate([

            'nama_calon' => [
                'rules' => 'required',
            ],

            'alamat_calon' => [
                'rules' => 'required',
            ],

            'no_hp' => [
                'rules' => 'required',
            ],

            'sampul' => [
                'rules' => 'required'
            ]
        ])) {
            session()->setFlashdata('pesan_gagal', 'Lengkapi ' . '<a href="/akun" class="alert-link">Data Akun</a>' . ' (klik link) terlebih dahulu');
            return redirect()->to('/loker');
        }

        $this->calonModel->save([
            'id_calon' => $this->request->getVar('id_calon'),
            'username' => $this->request->getVar('username'),
            'nama_calon' => $this->request->getVar('nama_calon'),
            'alamat_calon' => $this->request->getVar('alamat_calon'),
            'no_hp' => $this->request->getVar('no_hp'),
            'id_loker' => $this->request->getVar('id_loker'),
            'nama_loker' => $this->request->getVar('nama_loker'),
            'jenis_loker' => $this->request->getVar('jenis_loker'),
            'nama_perusahaan' => $this->request->getVar('nama_perusahaan'),
            'sampul' => $this->request->getVar('sampul')
        ]);

        session()->setFlashdata('pesan', 'Formulir berhasil dikirim!');

        return redirect()->to('/loker');
    }
}

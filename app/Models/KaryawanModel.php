<?php

namespace App\Models;

use CodeIgniter\Model;
use phpDocumentor\Reflection\Types\Null_;

class KaryawanModel extends Model
{
    protected $table      = 'data_karyawan';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id', 'nama', 'jabatan', 'email', 'no_hp', 'alamat', 'tempat_lahir', 'tgl_lahir', 'jenis_kelamin', 'foto'];

    // protected $useTimestamps = true;
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getKaryawan($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function id()
    {
        $kode = $this->db->table('data_karyawan')->select('RIGHT(id,5) as id', false)->orderBy('id', 'DESC')->limit(1)->get()->getRowArray();

        if (empty($kode['id'])) {
            $no = 1;
        } else {
            $no = intval($kode['id']) + 1;
        }

        $id = str_pad($no, 5, "0", STR_PAD_LEFT);
        return $id;
    }

    public function jk()
    {
    }

    public function getForm($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
    public function search($keyword)
    {
        // $builder = $this->table('orang');
        // $builder->like('nama', $keyword);
        // return $builder;
        return $this->table('loker')->like('nama_loker', $keyword)->orLike('jenis_loker', $keyword)->orLike('nama_perusahaan', $keyword);
    }
}

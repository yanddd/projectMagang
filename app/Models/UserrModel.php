<?php

namespace App\Models;

use CodeIgniter\Model;

class UserrModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id', 'active'];

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getUser($id = false)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id as userid, username, email, active, foto, name as role, group_id');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $builder->get();
        $data = $query->getResultArray();
        if ($id == false) {
            return $data;
        }

        return $this->where(['id' => $id])->first();
    }

    public function getUserDetail($id = false)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('users');
        $builder->select('users.id as userid, username, email, nama_depan, nama_belakang, tanggal_lahir, jK, no_hp, alamat, foto, active, name as role, group_id');
        $builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $builder->where('users.id', $id);
        $query = $builder->get();
        $data = $query->getRowArray();

        if ($id == false) {
            return $data;
        }

        return $this->where(['id' => $id])->first();
    }
}

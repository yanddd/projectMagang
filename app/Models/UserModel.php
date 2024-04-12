<?php

namespace App\Models;

use Myth\Auth\Models\UserModel as BaseUserModel;

class UserModel extends BaseUserModel
{
    protected $allowedFields = [
        'email', 'username', 'foto', 'nama_depan', 'nama_belakang', 'alamat', 'no_hp', 'jK', 'tanggal_lahir', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash',
        'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'deleted_at',
    ];
}

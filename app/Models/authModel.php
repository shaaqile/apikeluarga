<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class authModel extends Model
{
    protected $table = 'auth';
    protected $primaryKey = 'auth_id';
    protected $allowedFields = ['email', 'pass'];

    function getEmail($email)
    {
        $builder = $this->table('auth');
        $data = $builder->where('email', $email)->first();
        if (!$data) {
            throw new Exception("Data auth tidak ditemukan");
        }
        return $data;
    }
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class keluargaModel extends Model
{
    protected $table = 'keluarga';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'jk', 'f_id'];
    protected $validationRules = [
        'nama' => 'required',
        'jk' => 'required'
    ];
    protected $validationMessages = [
        'nama' => [
            'required' => "Harus diisi"
        ],
        'jk' => [
            'required' => "Harus diisi"
        ]
    ];
}

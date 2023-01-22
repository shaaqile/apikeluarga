<?php

namespace App\Models;

use CodeIgniter\Model;

class pegawaiModel extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'pegawai_id';
    protected $allowedFields = ['pegawai_name', 'jabatan_id', 'kontrak_id'];
    protected $validationRules = [
        'pegawai_name' => 'required',
        'jabatan_id' => 'required',
        'kontrak_id' => 'required'
    ];
    protected $validationMessages = [
        'pegawai_name' => [
            'required' => "Harus diisi"
        ],
        'jabatan_id' => [
            'required' => "Harus diisi"
        ],
        'kontrak_id' => [
            'required' => "Harus diisi"
        ]
    ];
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class kontrakModel extends Model
{
    protected $table = 'kontrak';
    protected $primaryKey = 'kontrak_id';
    // protected $allowedFields = ['kontrak_title', 'kontrak_id'];
    // protected $validationRules = [
    //     'pegawai_name' => 'required',
    //     'kontrak_id' => 'required'
    // ];
    // protected $validationMessages = [
    //     'pegawai_name' => [
    //         'required' => "Harus diisi"
    //     ],
    //     'jabatan_id' => [
    //         'required' => "Harus diisi"
    //     ],
    //     'kontrak_id' => [
    //         'required' => "Harus diisi"
    //     ]
    // ];
}

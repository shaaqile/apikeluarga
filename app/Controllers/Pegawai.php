<?php

namespace App\Controllers;

use App\Models\pegawaiModel;
use CodeIgniter\API\ResponseTrait;

class Pegawai extends BaseController
{

    use ResponseTrait;
    protected $pegawaiModel;

    public function __construct()
    {
        $this->pegawaiModel = new pegawaiModel();
    }

    public function index()
    {
        $data = $this->pegawaiModel->findAll();
        return $this->respond($data, 200);
    }

    public function show($id)
    {
        $data = $this->pegawaiModel->where('pegawai_id', $id)->findAll();
        if ($data) {
            return $this->respond($data, 200);
        } else {
            return $this->failNotFound("Data tidak ditemukan");
        }
    }

    public function create()
    {

        // $nama = $this->request->getVar('nama');
        // $jabatan = $this->request->getVar('jabatan');
        // $kontrak = $this->request->getVar('kontrak');

        // $data = [
        //     'pegawai_name' => $nama,
        //     'jabatan_id' => $jabatan,
        //     'kontrak_id' => $kontrak
        // ];

        $data = $this->request->getPost();
        if (!$this->pegawaiModel->insert($data)) {
            return $this->fail($this->pegawaiModel->errors());
        }

        $response = [
            'status' => 201,
            'error' => null,
            'messages' => [
                'success' => "Data berhasil dibuat"
            ]
        ];
        return $this->respond($response);
    }
}

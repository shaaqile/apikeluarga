<?php

namespace App\Controllers;

use App\Models\keluargaModel;
use CodeIgniter\API\ResponseTrait;

class Keluarga extends BaseController
{

    use ResponseTrait;
    protected $keluargaModel;

    public function __construct()
    {
        $this->keluargaModel = new keluargaModel();
    }

    public function index()
    {
        $data = $this->keluargaModel->findAll();
        return $this->respond($data, 200);
    }

    public function show($id)
    {
        $data = $this->keluargaModel->where('id', $id)->findAll();
        if ($data) {
            return $this->respond($data, 200);
        } else {
            return $this->failNotFound("Data tidak ditemukan");
        }
    }

    public function create()
    {

        $data = $this->request->getPost();
        if (!$this->keluargaModel->insert($data)) {
            return $this->fail($this->keluargaModel->errors());
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

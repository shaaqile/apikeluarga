<?php

namespace App\Controllers;

use App\Models\kontrakModel;
use CodeIgniter\API\ResponseTrait;

class Kontrak extends BaseController
{

    use ResponseTrait;
    protected $kontrakModel;

    public function __construct()
    {
        $this->kontrakModel = new kontrakModel();
    }

    public function index()
    {
        $data = $this->kontrakModel->findAll();
        return $this->respond($data, 200);
    }

    public function show($id)
    {
        $data = $this->kontrakModel->where('kontrak_id', $id)->findAll();
        if ($data) {
            return $this->respond($data, 200);
        } else {
            return $this->failNotFound("Data tidak ditemukan");
        }
    }
}

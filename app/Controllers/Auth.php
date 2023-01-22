<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use App\Models\authModel;

class Auth extends BaseController
{
    use ResponseTrait;
    public function create()
    {
        $validation = \Config\Services::validation();
        $aturan = [
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => "Harus diisi",
                    'valid_email' => "Email tidak valid"
                ]
            ],
            'pass' => [
                'rules' => 'required',
                'errors' => [
                    'required' => "Harus diisi"
                ]
            ]
        ];

        $validation->setRules($aturan);
        if (!$validation->withRequest($this->request)->run()) {
            return $this->fail($validation->getErrors());
        }

        $authModel = new authModel();
        $email = $this->request->getVar('email');
        $pass = $this->request->getVar('pass');

        $data = $authModel->getEmail($email);
        if ($data['pass'] != md5($pass)) {
            return $this->fail("Password tidak sesuai");
        }

        helper('jwt');
        $response = [
            'message' => "Autentikasi berhasil dilakukan",
            'data' => $data,
            'access_token' => createJWT($email)
        ];
        return $this->respond($response);
    }
}

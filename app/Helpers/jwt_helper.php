<?php

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Models\authModel;

function getJWT($authHeader)
{
    if (is_null($authHeader)) {
        throw new Exception("Autentikasi JWT Gagal");
    }
    return explode(" ", $authHeader)[1];
}

function validateJWT($encodedToken)
{
    $key = getenv('JWT_SECRET_KEY');
    $decodedToken = JWT::decode($encodedToken, new Key($key, 'HS256'));
    $authModel = new authModel();
    $authModel->getEmail($decodedToken->email);
}

function createJWT($email)
{
    $reqTime = time();
    $tokenTime = getenv('JWT_TIME_TO_LIVE');
    $expTime = $reqTime + $tokenTime;
    $payload = [
        'email' => $email,
        'iat' => $reqTime,
        'exp' => $expTime
    ];
    $jwt = JWT::encode($payload, getenv('JWT_SECRET_KEY'), 'HS256');
    return $jwt;
}

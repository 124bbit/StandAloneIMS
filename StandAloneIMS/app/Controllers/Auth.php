<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Auth extends BaseController
{
    protected $user;
    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);
        $this->user = new User();
        // Add your code here.
    }
    public function index()
    {
        //
        if (session()->get("isLoggedIn")) {
            return redirect()->to("/Dashboard");
        }
        return view("auth/index");
    }
    public function doLogin()
    {
        if (!$this->request->is("post")) {
            session()->setFlashdata("err", "Mohon mengisi semua field !");
            return redirect()->to("/");
        }
        $dataPost = $this->request->getPost(["email", "password"]);
        $validationRules      = [
            "email" => "required|valid_email",
            "password" => "required",
        ];
        $validationMessages   = [
            "email" =>
            [
                "required" => "Email harus diisi",
                "valid_email" => "Email Tidak Valid",
            ],
            "password" =>
            [
                "required" => "Password harus diisi",
                "min_length" => "Password minimal 8 karakter",
            ],
        ];

        if (!$this->validateData($dataPost, $validationRules, $validationMessages)) {
            session()->setFlashdata("err", "Invalid Input !");
            return view("auth/index");
        }
        $query = $this->user->where('email', $dataPost['email'])->first();
        if (!$query) {
            session()->setFlashdata("err", "Email atau password salah !");
            return redirect()->to("/");
        }
        if (!password_verify($dataPost['password'], $query['password'])) {
            session()->setFlashdata("err", "Email atau password salah !");
            return redirect()->to("/");
        }
        $sessionData = [
            'nama'  => $query['nama'],
            'email'     => $query['email'],
            'isLoggedIn' => true,
        ];
        session()->set($sessionData);

        $info = [
            'id' => $query['idUser'],
            "nama" => $query['nama'],
            'ip_address' => $this->request->getIPAddress(),
        ];
        log_message('info', 'User id = {id} Nama = {nama} logged into the system from {ip_address}', $info);
        return redirect()->to("/Dashboard");
    }
    public function doLogout()
    {
        if (!session()->get("isLoggedIn")) {
            session()->setFlashdata("err", "Session Expired !");
            session()->destroy();
            return redirect()->to("/");
        }
        $array_items = ['nama', 'email', 'isLoggedIn'];
        $info = [
            "nama" => session()->get("nama"),
            'ip_address' => $this->request->getIPAddress(),
        ];
        log_message('info', 'User {nama} logged out into the system from {ip_address}', $info);
        session()->remove($array_items);
        session()->stop();
        session()->setFlashdata("msg", "Logout Success");
        return redirect()->to('/');
    }
}

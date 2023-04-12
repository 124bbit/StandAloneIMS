<?php

namespace App\Controllers;

use App\Models\User as ModelsUser;
use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class User extends ResourceController
{
    protected $user;
    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);
        $this->user = new ModelsUser();
        // Add your code here.
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        //
        $data['title'] = "User";
        $data['namaTable'] = "User";
        $data['user'] = $this->user->where("email", session("email"))->first();
        $data['users'] = $this->user->findAll();
        return view("user/index", $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
        if (!$this->user->find($id)) {
            session()->setFlashData('err', 'Data User Tidak Ditemukan ');
            return redirect()->to('User');
        }
        $data['user'] = $this->user->where("email", session("email"))->first();
        $data['usr'] = $this->user->find($id);
        $data['title'] = "Detail User";
        $data['header'] = "Detail User";
        return view("user/detail", $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
        $data['user'] = $this->user->where("email", session("email"))->first();
        $data['title'] = "Add New User";
        $data['header'] = "Add New User";
        return view("user/add", $data);
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
        if (!$this->request->is('post')) {
            session()->setFlashData('err', 'HTTP Method Is Not POST !');
            return redirect()->to('/User');
        }
        $dataPost = $this->request->getPost();
        $query = $this->user->save([
            "nama" => $dataPost['nama'],
            "email" => $dataPost['email'],
            "nohp" => $dataPost['nohp'],
            "password" => password_hash($dataPost['password'], PASSWORD_DEFAULT),
            "role" => $dataPost['role'],
        ]);
        if (!$query) {
            session()->setFlashData('err', 'Gagal membuat User Baru !');
            return redirect()->to('User');
        } else {
            $log = [
                "nama" => session()->get("nama"),
                "ipAddress" => $this->request->getIPAddress(),
                "namaUser" => $dataPost['nama'],
            ];
            log_message("info", "User {nama} creating New User = {namaUser} using this IP {ipAddress}", $log);
            session()->setFlashData('msg', 'Berhasil Membuat User Baru !');
            return redirect()->to('User');
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
        if (!$this->user->find($id)) {
            session()->setFlashData('err', 'Data User Tidak Ditemukan ');
            return redirect()->to('User');
        }

        $data['user'] = $this->user->where("email", session("email"))->first();
        $data['usr'] = $this->user->find($id);
        $data['title'] = "Modify User";
        $data['header'] = "Modify User";
        return view("user/update", $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
        if (!$this->request->is("put")) {
            session()->setFlashData('err', 'HTTP Method Is Not PUT !');
            return redirect()->to('User');
        }
        $dataPost = $this->request->getPost();
        $query = $this->user->save([
            "idUser" => $id,
            "nama" => $dataPost['nama'],
            "email" => $dataPost['email'],
            "nohp" => $dataPost['nohp'],
            "role" => $dataPost['role'],
        ]);
        if (!$query) {
            session()->setFlashData('err', 'Something went wrong !');
            return redirect()->to('/User/Edit' . $id);
        }
        $log = [
            "nama" => session()->get("nama"),
            "ipAddress" => $this->request->getIPAddress(),
            "nama" => $dataPost['nama'],
        ];
        log_message("info", "User {nama} Modifying  User = {nama} using this IP {ipAddress}", $log);
        session()->setFlashData('msg', 'Success Modifying User');
        return redirect()->to('User');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
        $user = $this->user->find($id);
        if (!$user) {
            session()->setFlashData('err', 'Data User tidak Ditemukan !');
            return redirect()->to('User');
        }
        $query = $this->user->delete($id);
        if (!$query) {
            session()->setFlashData('err', 'Something went wrong !');
            return redirect()->to('User');
        } else {
            session()->setFlashData('msg', 'Berhasil Menghapus User');
            $log = [
                "nama" => session()->get("nama"),
                "ipAddress" => $this->request->getIPAddress(),
                "nama" => $user['nama'],
            ];
            log_message("info", "User {nama} Deleting  User = {nama} using this IP {ipAddress}", $log);
            return redirect()->to('User');
        }
    }
    public function ResetPassword($id)
    {
        $user = $this->user->find($id);
        if (!$user) {
            session()->setFlashData('err', 'Data User Tidak Ditemukan !');
            return redirect()->to('User');
        } else {
            $newPassword = $this->generatePassword();
            $query = $this->user->save([
                "idUser" => $id,
                "password" => password_hash($newPassword, PASSWORD_DEFAULT),
            ]);
            if (!$query) {
                session()->setFlashData('err', 'Something went wrong !');
                return redirect()->to('User');
            } else {
                session()->setFlashData('msg', 'Berhasil Reset Password. New Password = ' . $newPassword);
                return redirect()->to('User');
            }
        }
    }
    private function generatePassword($length = 8)
    {

        $string = "";
        $chars = "abcdefghijklmanopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789;'.>,</?}]{[=+-_)(**&^%%$#@!";
        $size = strlen($chars);
        for ($i = 0; $i < $length; $i++) {
            $string .= $chars[random_int(0, $size - 1)];
        }
        return $string;
    }
}

<?php

namespace App\Controllers;

use App\Models\Barang as ModelsBarang;
use CodeIgniter\RESTful\ResourceController;
use App\Models\User;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Barang extends ResourceController
{
    protected $user;
    protected $barang;
    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);
        $this->user = new User();
        $this->barang = new ModelsBarang();
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
        $data['title'] = "Barang";
        $data['namaTable'] = "Barang";
        $data['user'] = $this->user->where("email", session("email"))->first();
        $data['barang'] = $this->barang->findAll();
        return view("barang/index", $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
        if (!$this->barang->find($id)) {
            session()->setFlashdata("err", "Data Barang tidak ditemukan !");
            return redirect()->to('/Barang');
        }
        $data['title'] = "Detail Barang ";
        $data['user'] = $this->user->where("email", session("email"))->first();
        $data['barang'] = $this->barang->find($id);
        $data['header'] = "Detail Barang " . $data['barang']['namaBarang'];
        $tglbuat = date_create($data['barang']['created_at']);
        $tglubah = date_create($data['barang']['updated_at']);
        $data['dibuat_tgl'] = date_format($tglbuat, "d/m/Y H:i:s");
        $data['diubah_tgl'] = date_format($tglubah, "d/m/Y H:i:s");
        $data['dibuat'] = $this->user->find($data['barang']['created_by']);
        $data['diubah'] = $this->user->find($data['barang']['created_by']);
        return view("barang/detail", $data);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
        $data['title'] = "Add New Barang ";
        $data['header'] = "Add New Barang ";
        $data['user']  = $this->user->where("email", session("email"))->first();
        return view("barang/add", $data);
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
            return redirect()->to('/Dashboard');
        }
        $dataPost = $this->request->getPost([
            "namaBarang",
            "Qty",
        ]);
        $dataUser = $this->user->where("email", session()->get("email"))->first();
        $query = $this->barang->save([
            "namaBarang" => $dataPost['namaBarang'],
            "Qty" => $dataPost['Qty'],
            "created_by" => $dataUser['idUser'],
            "updated_by" => $dataUser['idUser']
        ]);
        if (!$query) {
            session()->setFlashData('err', 'Something went wrong !');
            return redirect()->to('/Barang/New');
        }
        $log = [
            "nama" => session()->get("nama"),
            "ipAddress" => $this->request->getIPAddress(),
            "namaBarang" => $dataPost['namaBarang'],
        ];
        log_message("info", "User {nama} creating New Barang = {namaApplicants} using this IP {ipAddress}", $log);
        session()->setFlashData('msg', 'Success Create New Barang');
        return redirect()->to('/Barang');
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
        if (!$this->barang->find($id)) {
            session()->setFlashData('err', 'Barang Tidak ditemukan !');
            return redirect()->to('/Barang');
        }
        $data['title'] = "Update  Barang ";
        $data['header'] = "Update Barang ";
        $data['user']  = $this->user->where("email", session("email"))->first();
        $data['barang'] = $this->barang->find($id);
        return view("barang/update", $data);
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
        if (!$this->request->is('put')) {
            session()->setFlashData('err', 'HTTP Method Is Not PUT !');
            return redirect()->to('/Dashboard');
        }
        $dataPost = $this->request->getPost();
        $dataUser = $this->user->where("email", session()->get("email"))->first();
        $query = $this->barang->save([
            "idBarang" => $id,
            "namaBarang" => $dataPost['namaBarang'],
            "Qty" => $dataPost['Qty'],
            "updated_by" => $dataUser['idUser']
        ]);
        if (!$query) {
            session()->setFlashData('err', 'Something went wrong !');
            return redirect()->to('/Barang/Update/' . $id);
        }
        $log = [
            "nama" => session()->get("nama"),
            "ipAddress" => $this->request->getIPAddress(),
            "namaBarang" => $dataPost['namaBarang'],
        ];
        log_message("info", "User {nama} Modifying  Barang = {namaApplicants} using this IP {ipAddress}", $log);
        session()->setFlashData('msg', 'Success Modifying Barang');
        return redirect()->to('/Barang');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
        $barang = $this->barang->find($id);
        if (!$barang) {
            session()->setFlashData('err', 'Barang Tidak Temukan ! ');
        }
        $query = $this->barang->delete($id);
        if (!$query) {
            session()->setFlashData('err', 'Gagal Menghapus Barang !');
            return redirect()->to('Barang');
        } else {
            session()->setFlashData('msg', 'Berhasil Menghapus Barang');
            $log = [
                "nama" => session()->get("nama"),
                "ipAddress" => $this->request->getIPAddress(),
                "namaBarang" => $barang['namaBarang'],
            ];
            log_message("info", "User {nama} Deleting  Barang = {namaBarang} using this IP {ipAddress}", $log);
            return redirect()->to('Barang');
        }
    }
}

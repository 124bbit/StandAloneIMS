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
        $data['user'] = $data['user'] = $this->user->where("email", session("email"))->first();
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
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}

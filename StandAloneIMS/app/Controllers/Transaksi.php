<?php

namespace App\Controllers;

use App\Models\Barang as ModelsBarang;
use App\Models\DetailTransaksi;
use App\Models\Transaksi as ModelsTransaksi;
use CodeIgniter\RESTful\ResourceController;
use App\Models\User;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Transaksi extends ResourceController
{
    protected $user;
    protected $barang;
    protected $transaksi;
    protected $detailTransaksi;
    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);
        $this->user = new User();
        $this->barang = new ModelsBarang();
        $this->transaksi = new ModelsTransaksi();
        $this->detailTransaksi = new DetailTransaksi();
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
        $data['title'] = "Transaksi";
        $data['namaTable'] = "Transaksi";
        $data['user'] = $this->user->where("email", session("email"))->first();
        $data['transaksi'] = $this->transaksi->tblTransaksi();
        return view("transaksi/index", $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
        //
        if (!$this->transaksi->find($id)) {
            session()->setFlashdata("err", "Data Transaksi tidak ditemukan !");
            return redirect()->to('Transaksi');
        }
        $data['title'] = "Detail Transaksi ";
        $data['user'] = $this->user->where("email", session("email"))->first();
        $data['transaksi'] = $this->transaksi->detailTransaksi($id);
        $data['header'] = "Detail Transaksi ";
        return view("transaksi/detail", $data);
        // return var_dump($data['transaksi']);
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
        $data['title'] = "Transaksi";
        $data['user'] = $this->user->where("email", session("email"))->first();
        $data['barang'] = $this->barang->findAll();
        return view("transaksi/add", $data);
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
            "idBarang",
            "Jml",
        ]);
        $dataUser = $this->user->where("email", session()->get("email"))->first();
        $query = $this->transaksi->insert([
            "created_by" => $dataUser['idUser'],
            "updated_by" => $dataUser['idUser'],
        ]);
        if (!$query) {
            session()->setFlashData('err', 'Something went wrong !');
            return redirect()->to('/Transaksi/New');
        }
        $idTrans = $query;
        for ($i = 0; $i < count($dataPost['idBarang']); $i++) {
            $this->transaksi->store([
                "idBarang" => $dataPost['idBarang'][$i],
                "Jml" => $dataPost['Jml'][$i],
            ]);
            $this->detailTransaksi->save([
                "Jml" => $dataPost['Jml'][$i],
                "barangId" => $dataPost['idBarang'][$i],
                "transaksiId" => $idTrans,
            ]);
        }
        $log = [
            "nama" => session()->get("nama"),
            "ipAddress" => $this->request->getIPAddress(),
            "Transaksi" => $idTrans,
        ];
        log_message("info", "User {nama} creating New Transaksi = {namaApplicants} using this IP {ipAddress}", $log);
        session()->setFlashData('msg', 'Success Create New Transaksi');
        return redirect()->to('/Transaksi');
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
        $tr = $this->transaksi->find($id);
        if (!$tr) {
            session()->setFlashData('err', 'Data Tidak Ditemukan !');
            return redirect()->to('Transaksi');
        }
        $query = $this->transaksi->delete($id);
        if (!$query) {
            session()->setFlashData('err', 'Gagal Menghapus Transaksi !');
            return redirect()->to('Transaksi');
        } else {
            session()->setFlashData('msg', 'Berhasil Menghapus Transaksi');
            $log = [
                "nama" => session()->get("nama"),
                "ipAddress" => $this->request->getIPAddress(),
                "namaTransaksi" => $tr['idTransaksi'],
            ];
            log_message("info", "User {nama} Deleting  Transaksi = {namaTransaksi} using this IP {ipAddress}", $log);
            return redirect()->to('Transaksi');
        }
    }
}

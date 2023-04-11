<?php

namespace App\Models;

use CodeIgniter\Model;

class Transaksi extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'transaksi';
    protected $primaryKey       = 'idTransaksi';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "created_by",
        "updated_by",
        "created_at",
        "updated_at",
        "deleted_at",
    ];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    public function store($data)
    {
        $barangModel = new Barang();
        return $barangModel->transaksiBarang($data['idBarang'], $data['Jml']);
    }
    public function tblTransaksi()
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('transaksi');
        return $builder->select("transaksi.idTransaksi,transaksi.created_by,transaksi.deleted_at,transaksi.created_at AS tgl,users.idUser,users.nama")->where("transaksi.deleted_at", NULL)->join("users", "users.idUser = transaksi.created_by")->get()->getResultArray();
        // $transaksi->select("transaksi.idTransaksi,transaksi.created_by,transaksi.created_at,users.idUser,users.nama")->join("users", "users.idUser = transaksi.created_by")->findAll();
    }
    public function detailTransaksi($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('transaksi');
        return $builder
            ->select("
        transaksi.idTransaksi,
        transaksi.created_by,
        transaksi.created_at AS tgl,
        detail_transaksi.idDetailTransaksi,
        detail_transaksi.Jml,
        detail_transaksi.transaksiId,
        detail_transaksi.barangId,
        barangs.idBarang,
        barangs.namaBarang,
        users.idUser,
        users.nama
        ")
            ->where("transaksi.idTransaksi", $id)
            ->join("detail_transaksi", "detail_transaksi.transaksiId = transaksi.idTransaksi")
            ->join("barangs", "barangs.idBarang = detail_transaksi.barangId")
            ->join("users", "users.idUser = transaksi.created_by")
            ->get()->getResultArray();
    }
}

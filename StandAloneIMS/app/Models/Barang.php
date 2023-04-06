<?php

namespace App\Models;

use CodeIgniter\Model;

class Barang extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'barangs';
    protected $primaryKey       = 'idBarang';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = [
        "namaBarang",
        "Qty",
        "created_by",
        "updated_by",
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

    public function transaksiBarang($id, $jml)
    {
        $dataBarang =  $this->where(['idBarang' => $id])->first();
        $hasil =  $dataBarang['Qty'] - $jml;
        return $this->where(['idBarang' => $id])->save([
            "idBarang" => $id,
            "Qty" => $hasil
        ]);
    }
}

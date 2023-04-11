<?php

namespace App\Database\Seeds;

use App\Models\Barang as ModelsBarang;
use CodeIgniter\Database\Seeder;

class Barang extends Seeder
{
    public function run()
    {
        //
        $model = new ModelsBarang();
        $data = [
            [
                "namaBarang" => "Monitor HP",
                "Qty" => 100,
                "created_by" => 1,
                "updated_by" => 1,
            ],
            [
                "namaBarang" => "Mouse Logitech G Pro Wireless",
                "Qty" => 200,
                "created_by" => 2,
                "updated_by" => 2,
            ],
            [
                "namaBarang" => "Type-C Dongle",
                "Qty" => 300,
                "created_by" => 3,
                "updated_by" => 3,
            ],
            [
                "namaBarang" => "Stop Kontak",
                "Qty" => 400,
                "created_by" => 3,
                "updated_by" => 3,
            ],
            [
                "namaBarang" => "Kertas HVS",
                "Qty" => 500,
                "created_by" => 1,
                "updated_by" => 1,
            ],
        ];
        $model->insertBatch($data);
    }
}

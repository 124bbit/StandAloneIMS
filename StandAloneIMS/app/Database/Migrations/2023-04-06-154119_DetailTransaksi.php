<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailTransaksi extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            "idDetailTransaksi" => [
                "type" => "int",
                "auto_increment" => true,
                "null" => false,
            ],
            "Jml" => [
                "type" => "int",
                "null" => false,
            ],
            "transaksiId" => [
                "type" => "int",
                "null" => false,
            ],
            "barangId" => [
                "type" => "int",
                "null" => false,
            ],
            "created_at" => [
                "type" => "DATETIME",
            ],
            "updated_at" => [
                "type" => "DATETIME",
            ],
            "deleted_at" => [
                "type" => "DATETIME",
            ],

        ]);
        $this->forge->addPrimaryKey("idDetailTransaksi");
        $this->forge->addForeignKey("transaksiId", "transaksi", "idTransaksi", "CASCADE", "CASCADE");
        $this->forge->addForeignKey("barangId", "barangs", "idBarang", "CASCADE", "CASCADE");
        $this->forge->createTable("detail_transaksi");
    }

    public function down()
    {
        //
        $this->forge->dropTable("detail_transaksi");
    }
}

<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            "idTransaksi" => [
                "type" => "int",
                "auto_increment" => true,
            ],
            "created_by" => [
                "type" => "int",
                "null" => false,
            ],
            "updated_by" => [
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
        $this->forge->addKey("idTransaksi", true);
        $this->forge->addForeignKey("created_by", "users", "idUser", "CASCADE", "CASCADE");
        $this->forge->addForeignKey("updated_by", "users", "idUser", "CASCADE", "CASCADE");
        $this->forge->createTable("transaksi");
    }

    public function down()
    {
        //
        $this->forge->dropTable("transaksi");
    }
}

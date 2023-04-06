<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            "idBarang" => [
                "type" => "int",
                "auto_increment" => true,
            ],
            "namaBarang" => [
                "type" => "varchar",
                "constraint" => "255",
                "null" => false,
            ],
            "Qty" => [
                "type" => "int",
                "null" => false,
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
        //
        $this->forge->addKey('idBarang', true);
        $this->forge->addForeignKey("created_by", "users", "idUser", "CASCADE", "CASCADE");
        $this->forge->addForeignKey("updated_by", "users", "idUser", "CASCADE", "CASCADE");
        $this->forge->createTable("barangs");
    }

    public function down()
    {
        //
        $this->forge->dropTable("barangs");
    }
}

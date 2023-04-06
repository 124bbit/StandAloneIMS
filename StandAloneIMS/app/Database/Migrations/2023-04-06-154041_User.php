<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class User extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            "idUser" => [
                "type" => "INT",
                "auto_increment" => true
            ],
            "nama" => [
                "type" => "VARCHAR",
                "constraint" => "255",
            ],
            "email" => [
                "type" => "VARCHAR",
                "constraint" => "255",
                "unique" => true,
            ],
            "nohp" => [
                "type" => "VARCHAR",
                "constraint" => "15",
                "unique" => true,
            ],
            "password" => [
                "type" => "VARCHAR",
                "constraint" => "255",
            ],
            "role" => [
                "type" => "ENUM",
                'constraint' => [
                    'SuperAdmin',
                    'Admin',
                    'User',
                    'Viewer',
                ],
                "default" => "User",
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
        $this->forge->addKey('idUser', true);
        $this->forge->createTable('users');
    }

    public function down()
    {
        //
        $this->forge->dropTable("users");
    }
}

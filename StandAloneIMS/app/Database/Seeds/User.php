<?php

namespace App\Database\Seeds;

use App\Models\User as ModelsUser;
use CodeIgniter\Database\Seeder;

class User extends Seeder
{
    public function run()
    {
        //
        $model = new ModelsUser();

        $data = [
            [
                "nama" => "Super Admin Dummy",
                "email" => "superadmin@ims.com",
                "nohp" => "081284989981",
                "password" => password_hash("superadmin1", PASSWORD_DEFAULT),
                "role" => "SuperAdmin",
            ],
            [
                "nama" => "Admin Dummy",
                "email" => "admin@ims.com",
                "nohp" => "081284989982",
                "password" => password_hash("admin1", PASSWORD_DEFAULT),
                "role" => "Admin",
            ],
            [
                "nama" => "User Dummy",
                "email" => "user@ims.com",
                "nohp" => "081284989983",
                "password" => password_hash("user1", PASSWORD_DEFAULT),
                "role" => "User",
            ],
            [
                "nama" => "Viewer Dummy",
                "email" => "viewer@ims.com",
                "nohp" => "081284989984",
                "password" => password_hash("viewer1", PASSWORD_DEFAULT),
                "role" => "Viewer",
            ],
        ];
        $model->insertBatch($data);
    }
}

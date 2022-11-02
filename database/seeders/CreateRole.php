<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class CreateRole extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Admin
        $admin = new Role();
        $admin->name         = 'root';
        $admin->display_name = 'Root'; // optional
        $admin->description  = 'Позволят управлять всем сервисом'; // optional
        $admin->save();

        //Client
        $client = new Role();
        $client->name         = 'client';
        $client->display_name = 'Client'; // optional
        $client->description  = 'Клиент'; // optional
        $client->save();
    }
}

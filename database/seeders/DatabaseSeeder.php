<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CreateRole::class);
        $this->call(CreateUser::class);
        $this->call(PermissionSeeder::class);
        $this->call(QuoteSeeder::class);
    }
}

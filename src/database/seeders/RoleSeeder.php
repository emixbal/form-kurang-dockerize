<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = [
            [
                'name' => "superadmin",
            ],
            [
                'name' => "manager",
            ],
            [
                'name' => "admin",
            ],
            [
                'name' => "kasir",
            ],
        ];
        DB::table('roles')->insert($roles);
    }
}

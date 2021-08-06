<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->insert([
           ['id' => '1', 'id_user' => '1', 'id_role' => '1']
        ]);

    }
}

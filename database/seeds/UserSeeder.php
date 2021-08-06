<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['id' => 1, 'user_name' => 'Đức Thủy', 'date' => '17/05/2000', 'phone' => '0982782923', 'picture' => 'IPXwSrw73Xa2.JPG', 'email' => 'ndt1705@gmail.com', 'password' => '$2y$10$6yXg3fMI0Edrr0IPVyDCo.eCvMz1lmERJSIFAQ2OeVBMmbRIVSANe', 'status' => 'active', 'created_at' => '2021-06-04 23:27:22', 'updated_at' => '2021-08-03 08:46:08'],
        ]);
    }
}

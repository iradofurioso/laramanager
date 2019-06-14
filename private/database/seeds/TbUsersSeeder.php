<?php

use Illuminate\Database\Seeder;

class TbUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_users')->insert([
            'id' => 2,
            'name' => 'Test User',
            'email' => 'admin@admin.com',
            'profile_pic' => 'teste.jpg',
            'password' => '$2y$10$g62bg0TytuAhqE6C56dNs.TQtGjMf76VKnBfFfrha1h3Dlzjd3Kzy',
            'status' => '1',
            'role' => 'admin',
            'remember_token' => 'qn2ufNHjByJDme1eIKEuX6IynAuUuX3D8dTqnxCNQZDgjSHcpBbMvLWdxPZu',
            'created_at' => '2019-06-14 00:31:29',
            'updated_at' => '2019-06-14 00:31:29'
        ]);
    }
}

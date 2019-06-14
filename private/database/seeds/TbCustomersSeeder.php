<?php

use Illuminate\Database\Seeder;

class TbCustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_customers')->insert([
            'id' => 5,
            'name' => 'Teste Cliente',
            'email' => 'teste@cliente.com',
            'phone' => '3333-4444',
            'photo' => '1560486420-ori.jpeg',
            'status' => '1',
            'created_at' => '2019-06-14 00:31:29',
            'updated_at' => '2019-06-14 00:31:29',
            'fk_id_user' => 2
        ]);
    }
}

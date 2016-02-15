<?php

use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => '老王(超管)',
            'email' => 'laowang@gmail.com',
            'password' => bcrypt('123456')
        ]);

        DB::table('users')->insert([
            'name' => '小王(第一号旗舰店经理)',
            'email' => 'xiaowang@gmail.com',
            'password' => bcrypt('123456')
        ]);

        DB::table('roles')->insert([
            'name' => 'manager',
            'label' => '店铺经理'
        ]);

        DB::table('roles')->insert([
            'name' => 'assistant',
            'label' => '店员'
        ]);

        DB::table('role_user')->insert([
            'user_id' => 2,
            'role_id' => 1,
        ]);

        DB::table('permissions')->insert([
            'name' => 'add seller',
            'label' => '增加店员'
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 1,
            'role_id' => 1,
        ]);

        DB::table('commodities')->insert([
            'name' => '苹果',
            'remark' => '来自火星的苹果,很难吃',
            'price' => 1024.00
        ]);

        DB::table('commodities')->insert([
            'name' => '梨子',
            'remark' => '来自火星的梨子,很好吃',
            'price' => 128.00
        ]);
    }
}

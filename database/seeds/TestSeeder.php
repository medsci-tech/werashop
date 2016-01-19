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

        DB::table('locales')->insert([
            'province' => '湖北省',
            'city' => '武汉市',
        ]);

        DB::table('locales')->insert([
            'province' => '江苏省',
            'city' => '南京市',
        ]);

        DB::table('shops')->insert([
            'id' => 0,
            'name' => '总店',
            'address' => '火星',
            'locale_id' => 1,
            'remark' => '巨贵无比,不要来'
        ]);

        DB::table('shops')->insert([
            'name' => '第二号旗舰店',
            'address' => '火星路28号',
            'locale_id' => 1,
            'remark' => '巨贵无比,不要来'
        ]);

        DB::table('shops')->insert([
            'name' => '第三号旗舰店',
            'address' => '水星路100号',
            'locale_id' => 2,
            'remark' => '巨贵无比,不要来'
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
            'shop_id' => 1
        ]);

        DB::table('role_user')->insert([
            'user_id' => 2,
            'role_id' => 1,
            'shop_id' => 2
        ]);

        DB::table('permissions')->insert([
            'name' => 'add seller',
            'label' => '增加店员'
        ]);

        DB::table('permission_role')->insert([
            'permission_id' => 1,
            'role_id' => 1,
        ]);
    }
}

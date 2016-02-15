<?php

use Illuminate\Database\Seeder;

class CommoditySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('commodities')->insert([
            'name' => '诺和针®32G Tip ETW',
            'introduction' => '诺和针®32G Tip ETW位一次性使用无菌注射针，与诺和诺德胰岛素注射系统配合使用。',
            'price' => 22.00
        ]);

        DB::table('commodities')->insert([
            'name' => '易折清洁消毒棒',
            'introduction' => '糖尿病患者血糖浓度高，血糖浓度含量更高，高糖环境是细菌良好的培养基。',
            'price' => 23.80
        ]);

        DB::table('commodities')->insert([
            'name' => '诺和笔5',
            'price' => 249.00
        ]);

        DB::table('commodities')->insert([
            'name' => '补邮，满79包邮(偏远地区除外)',
            'price' => 0.01
        ]);
    }
}

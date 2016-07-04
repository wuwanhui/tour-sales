<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * 运行数据库填充
     *
     * @return void
     */
    public function run()
    {
        DB::table('System_User')->insert(array('name' => '管理员', 'email' => 'wuhong@yeah.net', 'password' => bcrypt('wuhong')));
    }
}

<?php
//php artisan db:seed --class=AdminUserSeeder

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => '気虚の人',
            'email' => 'kikyo@kanri.com',
            'password' => Hash::make('kikyo@kanri.com'), // パスワードをハッシュ化して設定
            'construction' => '気虚',
            'kanri_flg' => 0,//1=無課金ユーザー、2=課金ユーザー、3=退会ユーザー、0=管理者
        ]);
        DB::table('users')->insert([
            'name' => '気滞の人',
            'email' => 'kitai@kanri.com',
            'password' => Hash::make('kitai@kanri.com'), // パスワードをハッシュ化して設定
            'construction' => '気滞',
            'kanri_flg' => 0,
        ]);
        DB::table('users')->insert([
            'name' => '血虚の人',
            'email' => 'kekkyo@kanri.com',
            'password' => Hash::make('kekkyo@kanri.com'), // パスワードをハッシュ化して設定
            'construction' => '血虚',
            'kanri_flg' => 0,
        ]);
        DB::table('users')->insert([
            'name' => '瘀血の人',
            'email' => 'oketsu@kanri.com',
            'password' => Hash::make('oketsu@kanri.com'), // パスワードをハッシュ化して設定
            'construction' => '瘀血',
            'kanri_flg' => 0,
        ]);
        DB::table('users')->insert([
            'name' => '水滞の人',
            'email' => 'suitai@kanri.com',
            'password' => Hash::make('suitai@kanri.com'), // パスワードをハッシュ化して設定
            'construction' => '水滞',
            'kanri_flg' => 0,
        ]);
    }
}
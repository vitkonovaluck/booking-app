<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => "Vit",
            'last_name' => "Kon",
            'gender' => "male",
            'phone' => "380180123456",
            'address' => "Vinnitsa",
            'email' => "ekonovaluck@gmail.com",
            'password' => bcrypt('password'),
            'avatar' => 'boy-1.png',
            'about' => "hello from the other world",
            'role' => 'admin',
            'status' => TRUE,
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        \App\Models\User::factory()->count(10)->create();
    }
}

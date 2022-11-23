<?php

use Illuminate\Database\Seeder;
use App\User;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'たきじい',
            'email' => 'takiji@ggmail.com',
            'password' => Hash::make('takiji'),
        ]);

        User::create([
            'name' => 'そうしのまくら',
            'email' => 'soushi@ggmail.com',
            'password' => Hash::make('soushi'),
        ]);

        User::create([
            'name' => 'あくたの龍ちゃん',
            'email' => 'akuta@ggmail.com',
            'password' => Hash::make('akuta'),
        ]);
    }
}

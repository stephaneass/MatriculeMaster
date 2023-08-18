<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users_list = collect($this->getUsersList());

        $users_list->each(function($data, $key){
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'last_name' => $data['last_name'],
                    'first_name' => $data['first_name'],
                    'email' => $data['email'],
                    'password' => Hash::make($data['password']),
                ]
            );

            $user->assignRole($data['role']);
        });
    }

    public function getUsersList()
    {
        return [
            [
                'last_name' => 'Admin',
                'first_name' => 'Super',
                'email' => 'stephaneassocle@gmail.com',
                'password' => 'P@ssw0rd',
                'role' => 'admin',
            ]
        ];
    }
}

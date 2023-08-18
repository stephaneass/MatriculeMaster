<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = $this->getRolesList();

        Role::upsert($roles, ['name']);
    }

    function getRolesList() : array 
    {
        return [
            [
                'name' => 'student', 'display_name' => 'Etudiant', 'guard_name'   => 'web'
            ],
            [
                'name' => 'admin',  'display_name' => 'Administrateur', 'guard_name'   => 'web'
            ]
        ];
    }
}

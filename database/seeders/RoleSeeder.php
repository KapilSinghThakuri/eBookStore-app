<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'Admin',
            'User'
        ];
        foreach ($roles as $value) {
            Role::create([
                'name' => $value,
            ]);
        }
    }
}

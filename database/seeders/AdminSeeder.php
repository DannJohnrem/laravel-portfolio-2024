<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::firstOrCreate([
            'email' => 'dann_johnrem@yahoo.com',
            'name' => 'Admin User',
            'password' => Hash::make('password'),
        ]);

        $adminRole = Role::where('name', 'Admin')->first();

        $admin->roles()->sync([$adminRole->id]);
    }
}

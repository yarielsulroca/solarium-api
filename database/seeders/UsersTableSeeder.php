<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Crear un usuario
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('1234qwer'),
            'dni'   => '63148844',
            'phone' => '+541187456123',
            'status' => 1,
            'birthday'=> '2017-12-27',
        ]);

        // Asignar el rol "admin" al usuario
        $role = Role::where('name', 'admin')->first();
        $user->assignRole($role);
    }
}

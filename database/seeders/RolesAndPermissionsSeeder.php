<?php


namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Membuat peran
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);

        // Menetapkan peran kepada pengguna tertentu
        $admin = User::where('email', 'admin@email.com')->first();
        $admin->assignRole($adminRole);

        $user = User::where('email', 'user@email.com')->first();
        $user->assignRole($userRole);
    }
}

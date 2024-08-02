<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\CommentFactory;
use Database\Factories\ContentFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $roleUser = Role::create(['name' => 'user']);
        $roleAdmin = Role::create(['name' => 'admin']);

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
        ]);

        $admin->assignRole($roleAdmin);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('user123'),
        ]);

        $user->assignRole($roleUser);

        User::factory(10)->create();
        ContentFactory::new()->count(20)->create();
        CommentFactory::new()->count(50)->create();
    }
}

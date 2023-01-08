<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $role_id = Role::where('id', 1)->first();

        
        // $profile_id = Profile::where('id', 1)->first();

        User::create([
            'firstname' => 'Admin',
            'lastname' => 'Super',
            'email' => 'admin@course.allocate',
            'password' => Hash::make('admin@course.allocate')
        ]);
        
        Profile::create([
            'user_id' => 1,
            'title' => 'SuperAdmin',
        ]);
        
        Role::create([
            'user_id' => 1,
            'role' => 'admin',
            'description' => 'This is the admin user role'
        ]);
    }
}

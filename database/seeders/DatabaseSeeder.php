<?php

namespace Database\Seeders;


use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PlanSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ConnectRelationshipsSeeder::class);


        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $role = config('roles.models.role')::where('name', '=', 'Admin')->first();
        $user->attachRole($role);
    }
}

<?php

namespace Database\Seeders;

use App\Models\Registration;
use App\Models\Event;
use App\Models\Plan;
use App\Models\User;
use App\Models\Subscription;
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
        // User::factory(10)->create();
 

        Model::unguard();
        ( config('database.default') != 'sqlite') ? DB::statement('SET FOREIGN_KEY_CHECKS=0;') : ''; 
        
        User::query()->delete();
         
        User::truncate();

        Event::truncate();
        Plan::truncate();
        Subscription::truncate();
        Registration::truncate();


        $this->call(PlanSeeder::class);

        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(ConnectRelationshipsSeeder::class);
        //$this->call('UsersTableSeeder');
        ( config('database.default') != 'sqlite') ? DB::statement('SET FOREIGN_KEY_CHECKS=1;') : '';
        Model::reguard();


        $organizerRole = config('roles.models.role')::where('name', '=', 'Organizer')->first();
        $organizers = User::factory(3)->create();

        $organizers->each(function ($user) use ($organizerRole) {
            $user->attachRole($organizerRole);
            Subscription::factory()->for($user, 'user')->create();
        });

        $events = Event::factory(10)->recycle($organizers)->create();

        Registration::factory(500)->recycle($events)->create();
 
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $role = config('roles.models.role')::where('name', '=', 'Admin')->first();
        $user->attachRole($role);
    }
}

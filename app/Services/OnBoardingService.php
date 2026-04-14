<?php

namespace App\Services;

use App\Models\Tenant;
use App\Models\User;

class OnBoardingService
{
    public function process($tenant, $tenantData)
    {
        $tenant->run(function ($tenant) use ($tenantData) {

            $this->createRoles($tenant);
            $this->createAdminUser($tenant, [
                'name' => $tenantData['admin_name'],
                'email' => $tenantData['admin_email'],
                'password' => $tenantData['admin_password'],
            ]);
        });

        return $tenant;
    }

    private function createAdminUser(Tenant $tenant, $adminData)
    {
        $tenant->run(function ($tenant) use ($adminData) {
            $user = User::create([
                'name' => $adminData['name'],
                'email' => $adminData['email'],
                'password' => bcrypt($adminData['password']),
            ]);

            // Assign admin role to the user
            $role = config('roles.models.role')::where('name', '=', 'Admin')->first();
            $user->attachRole($role);
            $user->email_verified_at = now();
            $user->save();
        });
    }

    private function createRoles(Tenant $tenant)
    {
        $tenant->run(function ($tenant) {
            $roles = [
                ['name' => 'Admin', 'slug' => 'admin', 'description' => 'Admin Role', 'level' => 5],
                ['name' => 'User', 'slug' => 'user', 'description' => 'User Role', 'level' => 1],
                ['name' => 'Unverified', 'slug' => 'unverified', 'description' => 'Unverified Role', 'level' => 0],
            ];

            foreach ($roles as $roleData) {
                $existingRole = config('roles.models.role')::where('slug', '=', $roleData['slug'])->first();
                if (!$existingRole) {
                    config('roles.models.role')::create($roleData);
                }
            }
        });
    }
}

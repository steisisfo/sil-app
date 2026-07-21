<?php

namespace Database\Seeders;

use App\Models\User;
use Exception;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class LegacyUserRoleSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        $validRoles = ['admin', 'content_creator'];

        foreach ($users as $user) {
            if (! in_array($user->role, $validRoles, true)) {
                throw new Exception("Unknown legacy role '{$user->role}' found for User ID {$user->id}. Aborting migration.");
            }

            // Sync using Spatie's syncRoles to ensure the user only has the intended role(s).
            // This also ensures guard_name 'web' is used by default.
            $user->syncRoles([$user->role]);
        }
    }
}

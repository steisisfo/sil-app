<?php

namespace Database\Seeders;

use App\Enums\PermissionType;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Admin Role
        $adminRole = Role::updateOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $adminRole->syncPermissions(Permission::where('guard_name', 'web')->get());

        // Content Creator Role
        $contentCreatorRole = Role::updateOrCreate(['name' => 'content_creator', 'guard_name' => 'web']);

        $contentCreatorPermissions = collect(PermissionType::cases())
            ->filter(fn (PermissionType $type) => ! in_array($type, [
                PermissionType::MANAGE_USERS,
                PermissionType::MANAGE_ROLES,
            ]))
            ->map(fn (PermissionType $type) => $type->value)
            ->toArray();

        $contentCreatorRole->syncPermissions($contentCreatorPermissions);

        app()[PermissionRegistrar::class]->forgetCachedPermissions();
    }
}

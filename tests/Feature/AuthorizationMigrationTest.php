<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class AuthorizationMigrationTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Setup permissions and roles
        $this->artisan('db:seed', ['--class' => 'PermissionSeeder']);
        $this->artisan('db:seed', ['--class' => 'RoleSeeder']);
    }

    public function test_legacy_users_are_migrated_correctly()
    {
        // Arrange: create users with legacy roles
        $admin = User::factory()->create(['role' => 'admin']);
        $creator = User::factory()->create(['role' => 'content_creator']);

        // Act: run legacy seeder
        $this->artisan('db:seed', ['--class' => 'LegacyUserRoleSeeder']);

        // Assert: check roles
        $this->assertTrue($admin->hasRole('admin'));
        $this->assertFalse($admin->hasRole('content_creator'));
        $this->assertTrue($creator->hasRole('content_creator'));
        $this->assertFalse($creator->hasRole('admin'));

        // Assert: admin has all permissions
        $this->assertTrue($admin->hasPermissionTo('manage_users'));
        $this->assertTrue($admin->hasPermissionTo('manage_pages'));

        // Assert: content creator has content permissions but not user/role management
        $this->assertFalse($creator->hasPermissionTo('manage_users'));
        $this->assertFalse($creator->hasPermissionTo('manage_roles'));
        $this->assertTrue($creator->hasPermissionTo('manage_pages'));
        $this->assertTrue($creator->hasPermissionTo('view_analytics'));
    }
}

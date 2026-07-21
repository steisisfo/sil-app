<?php

namespace Tests\Feature;

use App\Models\Admission;
use App\Models\Announcement;
use App\Models\Event;
use App\Models\Lecturer;
use App\Models\News;
use App\Models\Page;
use App\Models\Partnership;
use App\Models\Research;
use App\Models\ResearchGroup;
use App\Models\Service;
use App\Models\StudyProgram;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthorizationPolicyTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->artisan('db:seed', ['--class' => 'PermissionSeeder']);
        $this->artisan('db:seed', ['--class' => 'RoleSeeder']);
    }

    public function test_admin_can_manage_everything()
    {
        $admin = User::factory()->create();
        $admin->assignRole('admin');

        $models = [
            User::class, Page::class, StudyProgram::class, Admission::class,
            Lecturer::class, ResearchGroup::class, Research::class, Partnership::class,
            News::class, Event::class, Announcement::class, Service::class,
        ];

        foreach ($models as $modelClass) {
            $model = new $modelClass;
            $this->assertTrue($admin->can('viewAny', $modelClass));
            $this->assertTrue($admin->can('view', $model));
            $this->assertTrue($admin->can('create', $modelClass));
            $this->assertTrue($admin->can('update', $model));
            $this->assertTrue($admin->can('delete', $model));
            $this->assertTrue($admin->can('restore', $model));
        }
    }

    public function test_content_creator_can_manage_content_but_not_users()
    {
        $creator = User::factory()->create();
        $creator->assignRole('content_creator');

        $contentModels = [
            Page::class, StudyProgram::class, Admission::class,
            Lecturer::class, ResearchGroup::class, Research::class, Partnership::class,
            News::class, Event::class, Announcement::class, Service::class,
        ];

        foreach ($contentModels as $modelClass) {
            $model = new $modelClass;
            $this->assertTrue($creator->can('viewAny', $modelClass));
            $this->assertTrue($creator->can('view', $model));
            $this->assertTrue($creator->can('create', $modelClass));
            $this->assertTrue($creator->can('update', $model));
            $this->assertTrue($creator->can('delete', $model));
            $this->assertTrue($creator->can('restore', $model));
        }

        $userModel = new User;
        $this->assertFalse($creator->can('viewAny', User::class));
        $this->assertFalse($creator->can('view', $userModel));
        $this->assertFalse($creator->can('create', User::class));
        $this->assertFalse($creator->can('update', $userModel));
        $this->assertFalse($creator->can('delete', $userModel));
        $this->assertFalse($creator->can('restore', $userModel));
    }

    public function test_user_without_role_cannot_manage_anything()
    {
        $guest = User::factory()->create();

        $models = [
            User::class, Page::class, StudyProgram::class, Admission::class,
            Lecturer::class, ResearchGroup::class, Research::class, Partnership::class,
            News::class, Event::class, Announcement::class, Service::class,
        ];

        foreach ($models as $modelClass) {
            $model = new $modelClass;
            $this->assertFalse($guest->can('viewAny', $modelClass));
            $this->assertFalse($guest->can('view', $model));
            $this->assertFalse($guest->can('create', $modelClass));
            $this->assertFalse($guest->can('update', $model));
            $this->assertFalse($guest->can('delete', $model));
            $this->assertFalse($guest->can('restore', $model));
        }
    }
}

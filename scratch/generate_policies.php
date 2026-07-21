<?php

$models = [
    'User' => 'MANAGE_USERS',
    'Page' => 'MANAGE_PAGES',
    'StudyProgram' => 'MANAGE_STUDY_PROGRAMS',
    'Admission' => 'MANAGE_ADMISSIONS',
    'Lecturer' => 'MANAGE_LECTURERS',
    'ResearchGroup' => 'MANAGE_RESEARCH_GROUPS',
    'Research' => 'MANAGE_RESEARCH',
    'Partnership' => 'MANAGE_PARTNERSHIPS',
    'News' => 'MANAGE_NEWS',
    'Event' => 'MANAGE_EVENTS',
    'Announcement' => 'MANAGE_ANNOUNCEMENTS',
    'Service' => 'MANAGE_SERVICES',
];

$policyDir = __DIR__.'/../app/Policies';
if (! is_dir($policyDir)) {
    mkdir($policyDir, 0755, true);
}

foreach ($models as $model => $permissionConstant) {
    $policyCode = <<<PHP
<?php

namespace App\Policies;

use App\Models\\$model;
use App\Models\User;
use App\Enums\PermissionType;

class {$model}Policy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User \$user): bool
    {
        return \$user->can(PermissionType::{$permissionConstant}->value);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User \$user, $model \$model): bool
    {
        return \$user->can(PermissionType::{$permissionConstant}->value);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User \$user): bool
    {
        return \$user->can(PermissionType::{$permissionConstant}->value);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User \$user, $model \$model): bool
    {
        return \$user->can(PermissionType::{$permissionConstant}->value);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User \$user, $model \$model): bool
    {
        return \$user->can(PermissionType::{$permissionConstant}->value);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User \$user, $model \$model): bool
    {
        return \$user->can(PermissionType::{$permissionConstant}->value);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User \$user, $model \$model): bool
    {
        return \$user->can(PermissionType::{$permissionConstant}->value);
    }
}

PHP;

    file_put_contents($policyDir."/{$model}Policy.php", $policyCode);
    echo "Created {$model}Policy.php\n";
}

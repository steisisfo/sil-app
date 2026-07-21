<?php

namespace App\Policies;

use App\Enums\PermissionType;
use App\Models\Research;
use App\Models\User;

class ResearchPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can(PermissionType::MANAGE_RESEARCH->value);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Research $model): bool
    {
        return $user->can(PermissionType::MANAGE_RESEARCH->value);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can(PermissionType::MANAGE_RESEARCH->value);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Research $model): bool
    {
        return $user->can(PermissionType::MANAGE_RESEARCH->value);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Research $model): bool
    {
        return $user->can(PermissionType::MANAGE_RESEARCH->value);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Research $model): bool
    {
        return $user->can(PermissionType::MANAGE_RESEARCH->value);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Research $model): bool
    {
        return $user->can(PermissionType::MANAGE_RESEARCH->value);
    }
}

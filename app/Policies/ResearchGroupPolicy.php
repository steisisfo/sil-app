<?php

namespace App\Policies;

use App\Enums\PermissionType;
use App\Models\ResearchGroup;
use App\Models\User;

class ResearchGroupPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can(PermissionType::MANAGE_RESEARCH_GROUPS->value);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ResearchGroup $model): bool
    {
        return $user->can(PermissionType::MANAGE_RESEARCH_GROUPS->value);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can(PermissionType::MANAGE_RESEARCH_GROUPS->value);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ResearchGroup $model): bool
    {
        return $user->can(PermissionType::MANAGE_RESEARCH_GROUPS->value);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ResearchGroup $model): bool
    {
        return $user->can(PermissionType::MANAGE_RESEARCH_GROUPS->value);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ResearchGroup $model): bool
    {
        return $user->can(PermissionType::MANAGE_RESEARCH_GROUPS->value);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ResearchGroup $model): bool
    {
        return $user->can(PermissionType::MANAGE_RESEARCH_GROUPS->value);
    }
}

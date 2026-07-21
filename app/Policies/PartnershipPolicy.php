<?php

namespace App\Policies;

use App\Enums\PermissionType;
use App\Models\Partnership;
use App\Models\User;

class PartnershipPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can(PermissionType::MANAGE_PARTNERSHIPS->value);
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Partnership $model): bool
    {
        return $user->can(PermissionType::MANAGE_PARTNERSHIPS->value);
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can(PermissionType::MANAGE_PARTNERSHIPS->value);
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Partnership $model): bool
    {
        return $user->can(PermissionType::MANAGE_PARTNERSHIPS->value);
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Partnership $model): bool
    {
        return $user->can(PermissionType::MANAGE_PARTNERSHIPS->value);
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Partnership $model): bool
    {
        return $user->can(PermissionType::MANAGE_PARTNERSHIPS->value);
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Partnership $model): bool
    {
        return $user->can(PermissionType::MANAGE_PARTNERSHIPS->value);
    }
}

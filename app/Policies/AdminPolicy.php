<?php

namespace App\Policies;

use App\Models\Admin;
use Illuminate\Foundation\Auth\User;
use Illuminate\Auth\Access\Response;

class AdminPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function before($user,$ability){
        if($user->super_admin){
            return true;
        }
    }
    public function viewAny(User $user): bool
    {
        return $user->hasAbility('admins.view');

    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Admin $admin): bool
    {
        return $user->hasAbility('admins.view');

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasAbility('admins.create');

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Admin $admin): bool
    {
        return $user->hasAbility('admins.update');

    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Admin $admin): bool
    {
        return $user->hasAbility('admins.delete');

    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Admin $admin): bool
    {
        return $user->hasAbility('admins.restore');

    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Admin $admin): bool
    {
        return $user->hasAbility('admins.force-delete');

    }
}
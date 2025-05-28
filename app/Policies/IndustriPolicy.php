<?php

namespace App\Policies;

use App\Models\Industri;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class IndustriPolicy
{
    use HandlesAuthorization;
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_industri');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Industri $industri): bool
    {
        return $user->can('view_industri');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->can('create_industri');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Industri $industri): bool
    {
        return $user->can('update_industri');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Industri $industri): bool
    {
        return $user->can('delete_industri');
    }

    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_industri');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Industri $industri): bool
    {
        return $user->can('restore_industri');
    }

    public function restoreAny(User $user): bool
    {
        return $user->can('restore_any_industri');
    }

    public function replicate(User $user, Industri $industri): bool
    {
        return $user->can('replicate_industri');
    }

    public function reorder(User $user): bool
    {
        return $user->can('reorder_industri');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Industri $industri): bool
    {
        return $user->can('force_delete_industri');
    }

    public function forceDeleteAny(User $user): bool
    {
        return $user->can('force_delete_any_industri');
    }
}

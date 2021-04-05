<?php

namespace App\Policies;

use App\Models\Condominium;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\Collection;

class CondominiumPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Condominium  $condominium
     * @return mixed
     */
    public function view(User $user, Condominium $condominium)
    {
        return $condominium->sindico->id === $user->id || $condominium->subSindico->id === $user->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Condominium  $condominium
     * @return mixed
     */
    public function update(User $user, Condominium $condominium)
    {
        //
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Condominium  $condominium
     * @return mixed
     */
    public function delete(User $user, Condominium $condominium)
    {
        //
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Condominium  $condominium
     * @return mixed
     */
    public function restore(User $user, Condominium $condominium)
    {
        dd("restore");
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Condominium  $condominium
     * @return mixed
     */
    public function forceDelete(User $user, Condominium $condominium)
    {
        //
    }
}

<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Videogame;
use Illuminate\Auth\Access\HandlesAuthorization;

class VideogamePolicy
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
     * @param  \App\Models\Videogame  $videogame
     * @return mixed
     */
    public function view(User $user, Videogame $videogame)
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->tipo=='Administrador';
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Videogame  $videogame
     * @return mixed
     */
    public function update(User $user, Videogame $videogame)
    {
        return $user->tipo=='Administrador';
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Videogame  $videogame
     * @return mixed
     */
    public function delete(User $user, Videogame $videogame)
    {
        return $user->tipo=='Administrador';
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Videogame  $videogame
     * @return mixed
     */
    public function restore(User $user, Videogame $videogame)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Videogame  $videogame
     * @return mixed
     */
    public function forceDelete(User $user, Videogame $videogame)
    {
        //
    }
}

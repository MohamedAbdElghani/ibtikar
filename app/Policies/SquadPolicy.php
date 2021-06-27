<?php

namespace App\Policies;

use App\Squad;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SquadPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any squads.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the squad.
     *
     * @param  \App\User  $user
     * @param  \App\Squad  $squad
     * @return mixed
     */
    public function view(User $user, Squad $squad)
    {
        //
    }

    /**
     * Determine whether the user can create squads.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
      return in_array($user->role, [
        'client',
      ]);
    }

    /**
     * Determine whether the user can update the squad.
     *
     * @param  \App\User  $user
     * @param  \App\Squad  $squad
     * @return mixed
     */
    public function update(User $user, Squad $squad)
    {
        //
    }

    /**
     * Determine whether the user can delete the squad.
     *
     * @param  \App\User  $user
     * @param  \App\Squad  $squad
     * @return mixed
     */
    public function delete(User $user, Squad $squad)
    {
        //
    }

    /**
     * Determine whether the user can restore the squad.
     *
     * @param  \App\User  $user
     * @param  \App\Squad  $squad
     * @return mixed
     */
    public function restore(User $user, Squad $squad)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the squad.
     *
     * @param  \App\User  $user
     * @param  \App\Squad  $squad
     * @return mixed
     */
    public function forceDelete(User $user, Squad $squad)
    {
        //
    }
}

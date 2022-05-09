<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function checkCheckUserAge(User $user)
    {
        return $user->id == 2;
    }

    public function checkIfThisUserCanUpdateTheNumber(User $user)
    {

        return $user->role_id == 2 || $user->role_id == 10;

    }

}

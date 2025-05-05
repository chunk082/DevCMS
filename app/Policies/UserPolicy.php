<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Determine if the user can update another user.
     */
    public function update(User $user, User $targetUser)
    {
        // Prevent updating users with a higher rank
        if ($targetUser->rank > $user->rank) {
            return false;
        }

        // Prevent self-promotion
        if ($user->id === $targetUser->id) {
            return false;
        }

        return true;
    }
}

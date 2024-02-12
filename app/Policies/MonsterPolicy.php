<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Monster;

class MonsterPolicy
{
    /**
     * Create a new policy instance.
     */
    public function update(User $user, Monster $monster)
{
    return $user->id === $monster->user_id;
}

public function delete(User $user, Monster $monster)
{
    return $user->id === $monster->user_id;
}
}

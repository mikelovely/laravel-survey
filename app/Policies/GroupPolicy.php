<?php

namespace App\Policies;

use App\Models\Group;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupPolicy
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

    public function resource(User $user, Group $group)
    {
        $survey = $group->survey()->first();

        foreach ($survey->users()->get() as $survey_user) {
            if ($user->id === $survey_user->id) {
                return true;
            }
        }

        return false;
    }
}

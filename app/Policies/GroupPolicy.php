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

    public function index(User $user)
    {
        // if user has can view all group in this survey.
        return true;

        // TODO
        // else return false
    }

    public function create(User $user)
    {
        // if user has can edit this group.
        return true;

        // TODO
        // else return false
    }

    public function show(User $user, Group $group)
    {
        $survey = $group->survey()->first();

        foreach ($survey->users()->get() as $survey_user) {
            if ($user->id === $survey_user->id) {
                return true;
            }
        }

        return false;
    }

    public function edit(User $user, Group $group)
    {
        $survey = $group->survey()->first();

        foreach ($survey->users()->get() as $survey_user) {
            if ($user->id === $survey_user->id) {
                return true;
            }
        }

        return false;
    }

    public function delete(User $user, Group $group)
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

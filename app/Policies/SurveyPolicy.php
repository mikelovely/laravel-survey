<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Survey;
use Illuminate\Auth\Access\HandlesAuthorization;

class SurveyPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function create(User $user)
    {
        // if user has creating surveys permission
        return true;

        // TODO
        // else return false
    }

    public function show(User $user, Survey $survey)
    {
        foreach ($survey->users()->get() as $survey_user) {
            if ($user->id === $survey_user->id) {
                return true;
            }
        }

        return false;
    }

    public function edit(User $user, Survey $survey)
    {
        foreach ($survey->users()->get() as $survey_user) {
            if ($user->id === $survey_user->id) {
                return true;
            }
        }

        return false;
    }

    public function delete(User $user, Survey $survey)
    {
        foreach ($survey->users()->get() as $survey_user) {
            if ($user->id === $survey_user->id) {
                return true;
            }
        }

        return false;
    }
}

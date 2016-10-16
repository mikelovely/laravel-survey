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

    public function resource(User $user, Survey $survey)
    {
        foreach ($survey->users()->get() as $survey_user) {
            if ($user->id === $survey_user->id) {
                return true;
            }
        }

        return false;
    }
}

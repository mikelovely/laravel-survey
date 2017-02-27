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

    /**
     * Determines if the User has permission to view all Groups in a Survey
     *
     * @param  User $user
     * @param  Survey $survey
     * @return boolean
     */
    public function viewGroups(User $user, Survey $survey)
    {
        foreach ($survey->users()->get() as $survey_user) {
            if ($user->id === $survey_user->id) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determines if the User has permission to create a new Group for a Survey
     *
     * @param  User $user
     * @param  Survey $survey
     * @return boolean
     */
    public function createGroup(User $user, Survey $survey)
    {
        if ($user->can('action all surveys')) {
            return true;
        }

        foreach ($survey->users()->get() as $survey_user) {
            if ($user->id === $survey_user->id) {
                return true;
            }
        }

        return false;
    }

    public function edit(User $user, Survey $survey)
    {
        if ($user->can('action all surveys')) {
            return true;
        }

        foreach ($survey->users()->get() as $survey_user) {
            if ($user->id === $survey_user->id) {
                return true;
            }
        }

        return false;
    }

    public function delete(User $user, Survey $survey)
    {
        if ($user->can('action all surveys')) {
            return true;
        }

        foreach ($survey->users()->get() as $survey_user) {
            if ($user->id === $survey_user->id) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determines if the User has permission to view all Groups in a Survey
     *
     * @param  User $user
     * @param  Survey $survey
     * @return boolean
     */
    public function viewGroups(User $user, Survey $survey)
    {
        if ($user->can('action all surveys')) {
            return true;
        }

        foreach ($survey->users()->get() as $survey_user) {
            if ($user->id === $survey_user->id) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determines if the User has permission to create a new Group for a Survey
     *
     * @param  User $user
     * @param  Survey $survey
     * @return boolean
     */
    public function createGroup(User $user, Survey $survey)
    {
        if ($user->can('action all surveys')) {
            return true;
        }

        foreach ($survey->users()->get() as $survey_user) {
            if ($user->id === $survey_user->id) {
                return true;
            }
        }

        return false;
    }
}

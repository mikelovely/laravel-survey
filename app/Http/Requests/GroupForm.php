<?php

namespace App\Http\Requests;

use App\Models\Group;
use App\Models\Survey;
use Illuminate\Foundation\Http\FormRequest;

class GroupForm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'slug' => 'required|alpha_dash|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'order' => 'numeric',
        ];
    }

    /**
     * Validate request
     *
     * @return validate()
     */
    public function validate()
    {
        return parent::validate();
    }

    /**
     * Update for PATCH method
     */
    public function update(Group $group)
    {
        foreach ($group->getFillable() as $key) {
            if($this->input($key)) {
                $group->$key = $this->input($key);
            }
        }

        $group->save();
    }

    /**
     * Save a new group
     */
    public function persist(Survey $survey)
    {
        $input = $this->input();
        $input['survey_id'] = $survey->id;
        Group::create($input);
    }
}

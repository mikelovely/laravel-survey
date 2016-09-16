<?php

namespace App\Http\Requests;

use App\Models\Survey;
use Illuminate\Foundation\Http\FormRequest;

class SurveyForm extends FormRequest
{
    private $toggable = [
        'active',
        'allow_registration',
        'anonymized',
    ];

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
            'welcome_text' => 'required',
            'end_text' => 'required',
            'end_url' => 'url',
            'admin_name' => 'required|string|max:100',
            'admin_email' => 'required|email|max:255',
            'allow_registration' => 'boolean',
            'anonymized' => 'boolean',
            'starts_at' => 'required|date',
            'expires_at' => 'required|date',
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
    public function update(Survey $survey)
    {
        foreach ($survey->getFillable() as $key) {
            if($this->input($key)) {
                $survey->$key = $this->input($key);
            }

            if(!$this->input($key) && in_array($key, $this->toggable)) {
                $survey->$key = 0;
            }
        }

        $survey->save();
    }

    /**
     * Save a new survey
     */
    public function persist()
    {
        Survey::create($this->all());
    }
}

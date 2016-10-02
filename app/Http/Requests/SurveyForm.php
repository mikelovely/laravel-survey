<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SurveyForm extends FormRequest
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
}

<?php

namespace App\Http\Requests;

use App\Models\Group;
use App\Models\Question;
use App\Models\Survey;
use Illuminate\Foundation\Http\FormRequest;

class QuestionForm extends FormRequest
{
    private $toggable = [
        'mandatory',
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
            'title' => 'required|string',
            'description' => 'string',
            'type' => 'required|in:' . implode(",",Question::$question_types),
            'order' => 'integer',
            'mandatory' => 'boolean',
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
    public function update(Survey $survey, Group $group, Question $question)
    {
        foreach ($question->getFillable() as $key) {
            if($this->input($key)) {
                $question->$key = $this->input($key);
            }
        }

        if(!$this->input($key) && in_array($key, $this->toggable)) {
            $question->$key = 0;
        }

        $question->save();
    }

    /**
     * Save a new question
     */
    public function persist(Survey $survey, Group $group)
    {
        $input = $this->input();
        $input['group_id'] = $group->id;
        Question::create($input);
    }
}

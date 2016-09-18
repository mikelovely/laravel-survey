<?php

namespace App\Http\Controllers\Admins\Survey\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionForm;
use App\Models\Group;
use App\Models\Question;
use App\Models\Survey;

class QuestionController extends Controller
{
    public function index(Survey $survey, Group $group)
    {
        $questions = $group->questions;

        return view('admins.surveys.groups.questions.index')
            ->with('survey', $survey)
            ->with('group', $group)
            ->with('questions', $questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Survey $survey, Group $group)
    {
        return view('admins.surveys.groups.questions.create')
            ->with('survey', $survey)
            ->with('group', $group)
            ->with('question', new Question);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Survey $survey, Group $group, QuestionForm $request)
    {
        $request->persist($survey, $group);

        return redirect()->route('surveys.groups.questions.index', [$survey->id, $group->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Survey $survey, Group $group, Question $question)
    {
        $question = $survey->questions()->where('questions.id', $question->id)->first();

        return view('admins.surveys.groups.questions.show')
            ->with('survey', $survey)
            ->with('group', $group)
            ->with('question', $question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Survey $survey, Group $group, Question $question)
    {
        return view('admins.surveys.groups.questions.edit')
            ->with('survey', $survey)
            ->with('group', $group)
            ->with('question', $question);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionForm $request, Survey $survey, Group $group, Question $question)
    {
        $request->update($survey, $group, $question);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $survey, Group $group, Question $question)
    {
        $question->delete();

        return redirect()->route('surveys.groups.questions.index', [$survey->id, $group->id]);
    }
}

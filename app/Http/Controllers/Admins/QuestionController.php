<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionForm;
use App\Models\Group;
use App\Models\Question;
use App\Models\Survey;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this->middleware('group');
        $this->middleware('question');
    }

    public function index(Survey $survey, Group $group)
    {
        $questions = $group->questions;

        return view('admins.questions.index')
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
        return view('admins.questions.create')
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
        
        $group->questions()->create([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'order' => $request->order,
            'mandatory' => $request->has('mandatory'),
        ]);

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

        return view('admins.questions.show')
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
        return view('admins.questions.edit')
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
        $question->update([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'order' => $request->order,
            'mandatory' => $request->has('mandatory'),
        ]);

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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionForm;
use App\Models\Survey;
use App\Models\Group;
use App\Models\Question;

class QuestionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Survey $survey, Group $group)
    {
        return view('admin.questions.create')
            ->with('survey', $group->survey()->firstOrFail())
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

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Survey $survey, Group $group, Question $question)
    {
        $question = $group->questions()->where('questions.id', $question->id)->firstOrFail();

        return view('admin.questions.show')
            ->with('survey', $group->survey()->firstOrFail())
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
        return view('admin.questions.edit')
            ->with('survey', $group->survey()->firstOrFail())
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
    public function update(Survey $survey, Group $group, Question $question, QuestionForm $request)
    {
        $question->update([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'order' => $request->order,
            'mandatory' => $request->has('mandatory'),
        ]);

        return back();
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

        return redirect()->route('admin.surveys.groups.show', [
            $survey->id,
            $group->id,
        ]);
    }
}

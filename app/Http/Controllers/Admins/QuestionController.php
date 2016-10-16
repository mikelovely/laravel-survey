<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionForm;
use App\Models\Group;
use App\Models\Question;

class QuestionController extends Controller
{
    public function index(Group $group)
    {
        $questions = $group->questions;

        return view('admins.questions.index')
            ->with('survey', $group->survey()->firstOrFail())
            ->with('group', $group)
            ->with('questions', $questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Group $group)
    {
        return view('admins.questions.create')
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
    public function store(Group $group, QuestionForm $request)
    {
        $group->questions()->create([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'order' => $request->order,
            'mandatory' => $request->has('mandatory'),
        ]);

        return redirect()->route('groups.questions.index', [$group->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group, Question $question)
    {
        $question = $group->questions()->where('questions.id', $question->id)->firstOrFail();

        return view('admins.questions.show')
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
    public function edit(Group $group, Question $question)
    {
        return view('admins.questions.edit')
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
    public function update(Group $group, Question $question, QuestionForm $request)
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
    public function destroy(Group $group, Question $question)
    {
        $question->delete();

        return redirect()->route('groups.questions.index', [$group->id]);
    }
}

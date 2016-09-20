<?php

namespace App\Http\Controllers\Admins\Survey\Group\Question;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionForm;
use App\Models\Answer;
use App\Models\Group;
use App\Models\Question;
use App\Models\Survey;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    public function getAll(Request $request)
    {
        $question_id = $request->input('question_id');

        $answers = Answer::where('question_id', $question_id)->get();

        return response()->json($answers);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $answer = Answer::find($id);
        $answer->delete();

        return response(200)->header('Content-Type', 'text/plain');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Survey $survey, Group $group, Question $question)
    {
        $answers = $question->answers;

        return view('admins.surveys.groups.questions.answers.index')
            ->with('survey', $survey)
            ->with('group', $group)
            ->with('question', $question)
            ->with('answers', $answers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Survey $survey, Group $group, Question $question, Request $request)
    {
        $input = $request->input();
        $input['question_id'] = $question->id;

        Answer::create($input);

        return response(200)->header('Content-Type', 'text/plain');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

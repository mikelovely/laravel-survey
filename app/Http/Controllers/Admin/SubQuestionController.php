<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Survey;
use App\Models\Group;
use App\Models\Question;
use Illuminate\Http\Request;
use Request as RequestFacade;

class SubQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Survey $survey, Group $group, Question $question)
    {
        $sub_questions = $question->sub_questions;

        if(RequestFacade::ajax()) {
            return response()->json([
                'data' => $sub_questions
            ], 200);
        }

        return view('admin.sub_questions.index')
            ->with('survey', $survey)
            ->with('group', $group)
            ->with('question', $question)
            ->with('sub_questions', $sub_questions);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Survey $survey, Group $group, Question $question, Request $request)
    {
        $question->sub_questions()->create([
            'group_id' => $group->id,
            'title' => $request->title,
            'order' => $request->order,
            'mandatory' => $request->has('mandatory'),
        ]);

        return response()->json(null, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $survey, Group $group, Question $question, Question $subQuestion)
    {
        $subQuestion->delete();

        return response(200);
    }
}

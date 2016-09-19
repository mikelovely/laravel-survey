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
    public function getAll()
    {
        $answers = Answer::where('question_id', '33')->get();

        return response()->json($answers);
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
    // public function destroy($id)
    // {
    //     parse_str(file_get_contents('php://input'), $payload);

    //     if (!isset($payload['id']) || empty(trim($payload['id']))) {
    //         http_response_code(400);
    //         die();
    //     }

    //     $todo = $db->prepare("DELETE FROM todos WHERE id = :id");

    //     $todo->execute([
    //         'id' => $payload['id'],
    //     ]);

    //     http_response_code(200);
    //     die();
    // }
}

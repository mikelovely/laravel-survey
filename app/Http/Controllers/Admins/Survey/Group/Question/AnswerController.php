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
    public function getEmAll()
    {
        $answers = Answer::where('question_id', 33);
        
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

        // return view('admins.surveys.groups.questions.answers.index')
        //     ->with('survey', $survey)
        //     ->with('group', $group)
        //     ->with('question', $question)
        //     ->with('answers', $answers);

        // $todos = $db->query("SELECT id, title FROM todos");

        // if ($todos->rowCount() === 0) {
        //     echo json_encode([]);
        //     die();
        // }

        // return response()->->json($answers)


        // return response(
        //     view(
        //         'admins.surveys.groups.questions.answers.index',
        //         ['survey' => $survey],
        //         ['group' => $group],
        //         ['question' => $question],
        //         ['answers' => $answers]
        //     ),
        //     200,
        //     ['Content-Type' => 'application/json']
        // );

        // return response()->json([
        //     'body' => view('admins.surveys.groups.questions.answers.index', compact('answers'))->render(),
        //     'answers' => $answers,
        // ]);


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
    public function store(Request $request)
    {
        // validate somewhere else...
        /*
        if (!isset($_POST['title']) || empty(trim($_POST['title']))) {
            http_response_code(400);
            die();
        }
        return response('Hello World', 400)
            ->header('Content-Type', 'text/plain');
        */
    

        $input = $request->input();
        // $input['survey_id'] = $survey->id;
        $input['question_id'] = 33;
        Answer::create($input);
        // return redirect()->back();

        // $request->input[]  todo = $db->prepare("INSERT INTO todos (title) VALUES (:title)");
        // $todo->execute([
        //     'title' => $_POST['title'],
        // ]);

        return response(200)->header('Content-Type', 'text/plain');
        
        // http_response_code(200);
        // die();
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

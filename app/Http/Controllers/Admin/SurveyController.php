<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\SurveyForm;
use App\Models\Survey;
use Carbon\Carbon;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surveys = Survey::all();

        return view('admin.surveys.index')
            ->with('surveys', $surveys);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.surveys.create')
            ->with('survey', new Survey);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SurveyForm $request)
    {
        $request->user()->surveys()->create([
            'slug' => $request->slug,
            'title' => $request->title,
            'description' => $request->description,
            'welcome_text' => $request->welcome_text,
            'end_text' => $request->end_text,
            'end_url' => $request->end_url,
            'admin_name' => $request->admin_name,
            'admin_email' => $request->admin_email,
            'allow_registration' => $request->has('allow_registration'),
            'anonymized' => $request->has('anonymized'),
            'starts_at' => Carbon::createFromFormat('d-m-Y', $request->starts_at),
            'expires_at' => Carbon::createFromFormat('d-m-Y', $request->expires_at),
        ]);

        return redirect()->route('admin.surveys.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Survey $survey)
    {
        return view('admin.surveys.show')
            ->with('groups', $survey->groups)
            ->with('survey', $survey);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Survey $survey)
    {
        return view('admin.surveys.edit')
            ->with('survey', $survey);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SurveyForm $request, Survey $survey)
    {
        $survey->update([
            'slug' => $request->slug,
            'title' => $request->title,
            'description' => $request->description,
            'welcome_text' => $request->welcome_text,
            'end_text' => $request->end_text,
            'end_url' => $request->end_url,
            'admin_name' => $request->admin_name,
            'admin_email' => $request->admin_email,
            'allow_registration' => $request->has('allow_registration'),
            'anonymized' => $request->has('anonymized'),
            'starts_at' => Carbon::createFromFormat('d-m-Y', $request->starts_at),
            'expires_at' => Carbon::createFromFormat('d-m-Y', $request->expires_at),
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $survey)
    {
        $survey->delete();

        return redirect()->route('admin.surveys.index');
    }
}

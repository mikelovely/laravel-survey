<?php

namespace App\Http\Controllers\Admins;

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
    public function index(Request $request)
    {
        $surveys = $request->user()->surveys()->get();

        return view('admins.surveys.index')
            ->with('surveys', $surveys);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Survey::class);

        return view('admins.surveys.create')
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
        $this->authorize('create', Survey::class);

        Survey::create([
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

        return redirect()->route('surveys.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Survey $survey)
    {
        $this->authorize('show', $survey);

        return view('admins.surveys.show')
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
        $this->authorize('edit', $survey);

        return view('admins.surveys.edit')
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
        $this->authorize('edit', $survey);

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

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $survey)
    {
        $this->authorize('delete', $survey);

        $survey->delete();

        return redirect()->route('surveys.index');
    }
}

<?php

namespace App\Http\Controllers\Admins\Survey;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupForm;
use App\Models\Group;
use App\Models\Survey;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Survey $survey)
    {
        $groups = $survey->groups;

        return view('admins.surveys.groups.index')
            ->with('survey', $survey)
            ->with('groups', $groups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Survey $survey)
    {
        return view('admins.surveys.groups.create')
            ->with('survey', $survey)
            ->with('group', new Group);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Survey $survey, GroupForm $request)
    {
        $request->persist($survey);

        return redirect()->route('surveys.groups.index', [$survey->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Survey $survey, Group $group)
    {
        $group = $survey->groups()->where('groups.id', $group->id)->first();
        
        return view('admins.surveys.groups.show')
            ->with('survey', $survey)
            ->with('group', $group);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Survey $survey, Group $group)
    {
        return view('admins.surveys.groups.edit')
            ->with('survey', $survey)
            ->with('group', $group);
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

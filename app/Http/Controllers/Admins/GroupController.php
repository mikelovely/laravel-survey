<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupForm;
use App\Models\Group;
use App\Models\Survey;

class GroupController extends Controller
{
    public function __construct()
    {
        // dd("est");
        // to middleware or not to middleware?
        // $this->middleware('group');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Survey $survey)
    {
        $this->authorize('index', Group::class);

        $groups = Group::with(['survey'])->fromSurvey($survey)->latestFirst()->get();

        return view('admins.groups.index')
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
        $this->authorize('create', Group::class);

        return view('admins.groups.create')
            ->with('survey', $survey)
            ->with('group', new Group);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GroupForm $request, Survey $survey)
    {
        $this->authorize('create', Group::class);

        $survey->groups()->create([
            'slug' => $request->slug,
            'title' => $request->title,
            'description' => $request->description,
            'order' => $request->order,
        ]);

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
        $this->authorize('show', $group);

        $group = $survey->groups()->where('groups.id', $group->id)->firstOrFail();
        
        return view('admins.groups.show')
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
        $this->authorize('edit', $group);

        return view('admins.groups.edit')
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
    public function update(GroupForm $request, Survey $survey, Group $group)
    {
        $this->authorize('edit', $group);

        $group->update([
            'slug' => $request->slug,
            'title' => $request->title,
            'description' => $request->description,
            'order' => $request->order,
        ]);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Survey $survey, Group $group)
    {
        $this->authorize('delete', $group);

        $group->delete();

        return redirect()->route('surveys.groups.index', [$survey->id]);
    }
}

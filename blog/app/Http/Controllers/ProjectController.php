<?php

namespace App\Http\Controllers;

use App\Project;
use App\Mail\ProjectCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
        //$this->middleware('auth')->only,except('store', 'update');
    }
    public function index()
    {
        $projects = auth()->user()->projects;
        // $projects = Project::where('owner_id', auth()->id())->get();

        // cache()->rememberForever('stats', function  (){

        //     return ['lessons' => 1300, 'hours' => 50000, 'series' => 100];
        // });

        return view('projects/index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Project $project, Request $request)
    {
        $this->ValidateForm();
        $project->title         = $request->title;
        $project->description   = $request->description;
        $project->owner_id      = auth()->id();
        $project->save();
        //sending email go to project model

        return redirect('projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //$this->authorize('view', $project);
        // if($project->owner_id !== auth()->id()){
        //     abort(403);
        // }
        if (\Gate::denies('view', $project)){
            abort(403);
        }
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->ValidateForm();
        $project->title         = $request->title;
        $project->description   = $request->description;

        $project->save();
        return redirect('/projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect('/projects');
    }
    public function ValidateForm(){
        request()->validate([
            'title'         => ['required', 'min:3'],
            'description'   => ['required', 'min:10']
        ]);
    }
}

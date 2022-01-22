<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project =  Project::paginate(5);
        return view('home', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'client' => 'required',
            'leader' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'email' => 'required',
            'progress' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png'
        ]);
        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('project-image');
        }
        Project::create($validated);

        return redirect('/')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        return view('edit', compact(['project']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project = Project::find($id);

        $validated = $request->validate([
            'name' => 'required',
            'client' => 'required',
            'leader' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'email' => 'required',
            'progress' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png'
        ]);
        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('project-image');
        }
        $project->update($validated);
        return redirect('/')->with('success', 'Data berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect('/')->withSuccess('Data berhasil dihapus.');;
    }

    public function search(Request $request)
    {

        if ($request->has('search')) {
            $project = Project::where('name', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $project = Project::paginate(5);
        }

        return view('search', compact('project'));
    }
}
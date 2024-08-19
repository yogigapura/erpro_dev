<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $projects = Project::latest()->paginate(10);
        $projects = Project::with('customer')->get();
        //$customers = Customer::all();
        //return view('projects.index',compact('projects','customers'));
        return view('projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $customers = Customer::all();
        return view('projects.create',compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        Project::create(
            $request->all()
        );

        return redirect()
            ->route('projects.index')
            ->with('success','Project Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Cost;
use Illuminate\Http\Request;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $costs = Cost::all();
        // $budgets = Budget::findOrFail($id);
        // return view('costs.create',compact('costs','budgets'));
        $id = session('proj_id');
        $costs = Cost::all();
        $budgets = Budget::where('id_proj',$id)->get();
        return view('costs.create',compact('costs','budgets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $request->validate([
        //     'cost_document' => 'required|mimes:pdf,doc,docx|max:2048',
        // ]);

        // if ($request->file('cost_document')) {
        //     $file = $request->file('cost_document');
        //     $filename = time() . '_' . $file->getClientOriginalName();
        //     $filePath = $file->storeAs('uploads', $filename, 'public');
        //     // Cost::create(['path' => $filePath]);

        //     // You can save the file path in the database if needed
        //     // e.g., Document::create(['path' => $filePath]);

        //     return back()->with('success', 'Document uploaded successfully.')->with('file', $filename);
        // }

        // Cost::create(
        //     $request->all()
        // );

        // Method 1: Using create method (mass assignment)
        // User::create([
        //     'name' => 'John Doe',
        //     'email' => 'johndoe@example.com',
        //     'password' => bcrypt('password'),
        // ]);

        Cost::create([
            'id_proj' => $request->id_proj,
            'id_budget' => $request->id_budget,
            'cost_name' => $request->cost_name,
            'cost_value' => $request->cost_value,
            'cost_description' => $request->cost_description,
            'cost_document' => 'description'
        ]);
        
        $id = session('proj_id');

        return redirect()
            ->route('projects.show', $id)
            ->with('success','Cost Created Successfully');
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

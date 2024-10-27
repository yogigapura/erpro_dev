<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Project;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class BudgetController extends Controller
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
        // cara make session
        //$id_proj = session('id_proj');

        $budgets = Budget::all();
        return view('budgets.create',compact('budgets'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $id_proj = session('id_proj');
        $id_group = session('id_group');

        Budget::create(
            //$request->all()

            [
                'id_proj' => $id_proj,
                'id_group' => $id_group,
                'budget_name' => $request->budget_name,
                'budget_value' => $request->budget_value,
                'budget_description' => $request->budget_description
                ]
        );

        return redirect()
            ->route('projects.show', $id_proj)
            ->with('success','Budget Created Successfully');
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

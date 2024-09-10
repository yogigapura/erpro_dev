<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Customer;
use App\Models\Project;
use App\Models\Cost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        // $projects = DB::table('projects')
        //     ->join('budgets', 'projects.id_proj', '=', 'budgets.id_proj')
        //     ->join('customers', 'projects.id_cust', '=', 'customers.id_cust')
        //     ->select(
        //         'projects.id_proj', 
        //         'projects.proj_name', 
        //         'customers.cust_name as cust_name',
        //          'projects.proj_contract',
        //          'projects.proj_value',
        //          DB::raw('SUM(budgets.budget_value) as total_budget'))
        //     ->groupBy('projects.id_proj')
        //     ->get();

            // $budgets = DB::table('projects')
            // ->select(
            //     'projects.id_proj', 
            //     'projects.proj_name', 
            //     'projects.proj_contract', 
            //     'projects.proj_value', 
            //     'projects.proj_due_date', 
            //     'customers.cust_name', 
            //     DB::raw('SUM(budgets.budget_value) as total_budget'),
            //     DB::raw('SUM(costs.cost_value) as total_cost')  
            //     )
            // ->join('customers', 'projects.id_cust', '=', 'customers.id_cust')
            // ->join('budgets', 'projects.id_proj', '=', 'budgets.id_proj')
            // ->join('costs', 'projects.id_proj', '=', 'costs.id_proj')
            // ->groupBy('projects.id_proj', 'projects.proj_name', 'customers.cust_name','projects.proj_contract','projects.proj_value',
            // 'projects.proj_due_date')
            // ->get();

        //$customers = Customer::all();
        //return view('projects.index',compact('projects','customers'));

//         $budgets = DB::select(
//             'select `projects`.`id_proj`, `projects`.`proj_name`, `projects`.`proj_contract`, `projects`.`proj_value`, `projects`.`proj_due_date`, `customers`.`cust_name`, 
// SUM(budgets.budget_value) as total_budget, SUM(costs.cost_value) as total_cost 
// from `projects` 
// inner join `customers` on `projects`.`id_cust` = `customers`.`id_cust` 
// inner join `budgets` on `projects`.`id_proj` = `budgets`.`id_proj` 
// inner join `costs` on `projects`.`id_proj` = `costs`.`id_proj`',[1]
//         );

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
        $project = Project::with('customer')->findOrFail($id);
        $budgets = Budget::where('id_proj',$id)->get();
        $costs = Cost::where('id_proj',$id)->get();

        session(['proj_id' => $project->id_proj]);

        return view('projects.detail', compact('project','budgets','costs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(Project $project)
    // {
    //     //
    //     return view('projects.edit',compact('project'));
    // }

    public function edit($id)
    {
        //
        // $projects = Project::with('customer')->findOrFail($id);
        $project = Project::findOrFail($id);
        $customers = Customer::all();
        return view('projects.edit',compact('project','customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
        $project->update($request->all());
  
        return redirect()
            ->route('projects.index')
            ->with('success','Project updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Customer;
use App\Models\Project;
use App\Models\Cost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $user = Auth::user()->id;

        $groups = DB::table('group_members')
            ->join('groups', 'group_members.id_group', '=', 'groups.id_group')
            ->where('id_user','=',$user)
            ->get();

        $customers = Customer::all();
        return view('projects.create',compact('customers','groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = Auth::user()->id;
        Project::create(
            //$request->all()
[
                'id_cust' => $user,
                'id_group' => $request->id_group,
                'proj_name' => $request->proj_name,
                'proj_contract' => $request->proj_contract,
                'proj_value' => $request->proj_value,
                'proj_due_date' => $request->proj_due_date,
                'proj_detail' => $request->proj_detail
                ]
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

        // cara nyimpen session
        session(['id_proj' => $project->id_proj]);
        session(['proj_name' => $project->proj_name]);
        session(['id_group' => $project->id_group]);

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

        $user = Auth::user()->id;

        $groups = DB::table('group_members')
            ->join('groups', 'group_members.id_group', '=', 'groups.id_group')
            ->where('id_user','=',$user)
            ->get();

        $project = Project::findOrFail($id);
        $customers = Customer::all();
        return view('projects.edit',compact('project','customers','groups'));
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

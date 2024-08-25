@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{ route('projects.index') }}" class="btn btn-info mb-3">Back</a>
</div>

<?php
    $total_budget = 0;
    $total_cost = 0;
?>

<div class="container">
    <h2>Informasi Project</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <tbody>
                
                <tr>
                    <th scope="row" class="k">Customer</th>
                    <td>{{ $project->customer->cust_name }}</td>
                </tr>
                <tr>
                    <th scope="row" class="k">Project Contract</th>
                    <td>{{ $project->proj_contract }}</td>
                </tr>
                <tr>
                    <th scope="row" class="">Project Name</th>
                    <td>{{ $project->proj_name }}</td>
                </tr>
                <tr>
                    <th scope="row" class="">Project Dateline</th>
                    <td>{{ $project->proj_due_date }}</td>
                </tr>
                <tr>
                    <th scope="row" class="">Project Value</th>
                    <td>IDR {{ number_format($project->proj_value, 0) }}</td>
                </tr>
                <tr>
                    <th scope="row" class="">Project Budget</th>
                    @foreach ($budgets as $budget)
                        <?php
                            $total_budget = $total_budget + $budget->budget_value ;
                        ?>
                    @endforeach
                    <td>IDR {{ number_format($total_budget,0) }}</td>
                </tr>
                <tr>
                    <th scope="row" class="">Project Cost</th>
                    @foreach ($costs as $cost)
                        <?php
                            $total_cost = $total_cost + $cost->cost_value ;
                        ?>
                    @endforeach
                    <td>IDR {{ number_format($total_cost, 0) }}</td>
                </tr>
            
            </tbody>
        </table>
    </div>
</div>

<div class="container">
    <h2>Informasi Budget</h2>
    <table class="table table-bordered">
        <tr>
            <th>Budget ID</th>
            <th>Budget Name</th>
            <th>Budget Value</th>
            <th>Budget Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($budgets as $budget)
        <tr>
            <td>{{ $budget->id_budget }}</td>
            <td>{{ $budget->budget_name }}</td>
            <td>IDR {{ number_format($budget->budget_value,0) }}</td>
            <td>{{ $budget->budget_decription }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('projects.show',$project->id_proj) }}">Detail</a>
                <a class="btn btn-primary" href="{{ route('projects.edit',$project->id_proj) }}">Edit</a>
            </td>
        </tr>
        
        @endforeach
    </table>
</div>

<div class="container">
    <h2>Informasi Cost</h2>
    <table class="table table-bordered">
        <tr>
            <th>Cost ID</th>
            <th>Cost Name</th>
            <th>Cost Value</th>
            <th>Cost Description</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($costs as $cost)
        <tr>
            <td>{{ $cost->id_cost }}</td>
            <td>{{ $cost->cost_name }}</td>
            <td>IDR {{ number_format($cost->cost_value,0) }}</td>
            <td>{{ $cost->cost_decription }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('projects.show',$project->id_proj) }}">Detail</a>
                <a class="btn btn-primary" href="{{ route('projects.edit',$project->id_proj) }}">Edit</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>


@endsection
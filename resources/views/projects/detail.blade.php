@extends('layouts.app')

@section('content')

<div class="container">
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
                <th scope="row" class="">Project Value</th>
                <td>IDR {{ number_format($project->proj_value, 0) }}</td>
            </tr>
           
        </tbody>
    </table>
</div>
</div>

@endsection
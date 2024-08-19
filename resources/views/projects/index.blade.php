@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>

        
    </div> --}}

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Projects</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('projects.create') }}">Create New Project</a>
            </div>
        </div>
    </div>


    <table class="table table-bordered">
        <tr>
            <th>Project ID</th>
            <th>Customer Name</th>
            <th>Project Name</th>
            <th>Contract Number</th>
            <th>Project Value</th>
            <th>Project Budget</th>
            <th>Project Cost</th>
            <th>Project Due Date</th>
            <th>Project Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($projects as $project)
        <tr>
            <td>{{ $project->id_proj }}</td>
            {{-- <td>TBA</td> --}}
            <td>{{ $project->customer->cust_name }}</td>
            <td>{{ $project->proj_name }}</td>
            <td>{{ $project->proj_contract }}</td>
            <td>IDR {{ number_format($project->proj_value, 0) }}</td>
            <td>IDR </td>
            <td>IDR </td>
            <td>IDR </td>
            <td>STATUS </td>
            <td>
                <a class="btn btn-info" href="{{ route('projects.show',$project->id_proj) }}">Detail</a>
                <a class="btn btn-primary" href="{{ route('projects.edit',$project->id_proj) }}">Edit</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
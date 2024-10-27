@extends('layouts.app')
  
@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Budgets</h2>
        </div>

    </div>
    <div class="pull-right">
        <?php
                    $id_proj = session('proj_id');
                ?>
        <a class="btn btn-secondary" href="{{ route('projects.show',$id_proj) }}">Back</a>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Error!</strong> <br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('budgets.store') }}" method="POST">
    @csrf
  
     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project Name :</strong>
                <input type="text" name="proj_name" class="form-control" placeholder="Project Name" value="{{ session('proj_name') }}" readonly>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Budget Name :</strong>
                <input type="text" name="budget_name" class="form-control" placeholder="Budget Name">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Budget Value :</strong>
                <input type="text" name="budget_value" class="form-control" placeholder="Budget Value">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Budget Description :</strong>
                <input class="form-control" style="height:150px" name="budget_description" placeholder="Detail about the budget"></input>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>

</div>
@endsection
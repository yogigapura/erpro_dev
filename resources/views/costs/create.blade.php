@extends('layouts.app')
  
@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Costs</h2>
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
   
<form action="{{ route('costs.store') }}" method="POST">
    @csrf
  
     <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project ID :</strong>
                <input type="text" name="id_proj" class="form-control" placeholder="Project ID" value="{{ $id_proj }}" readonly >
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Select a budget : </strong>
        <select class="form-select" name="id_budget" id="id_budget" required>
            <option value="" disabled selected>...</option>
                @foreach ($budgets as $budget)
                    <option value="{{ $budget->id_budget }}">{{ $budget->budget_name }}</option>
                @endforeach
        </select>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cost Name :</strong>
                <input type="text" name="cost_name" class="form-control" placeholder="Cost Name">
            </div>
        </div>

        

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cost Value :</strong>
                <input type="text" name="cost_value" class="form-control" placeholder="Cost Value">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cost Description :</strong>
                <input class="form-control" style="height:150px" name="cost_description" placeholder="Detail about the cost"></input>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            {{-- <div class="form-group">
                <strong>File :</strong>
                <label for="document">Choose a document:</label>
                <input type="file" name="cost_document" id="cost_document" required>
            </div> --}}
            <strong>File :</strong>
            <div class="input-group mb-3">
                <input type="file" class="form-control" id="cost_document">
                <label class="input-group-text" for="cost_document">Upload</label>
              </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>

</div>
@endsection
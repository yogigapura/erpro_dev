@extends('layouts.app')
  
@section('content')
<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Project</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('projects.index') }}">Back</a>
        </div>
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
   
<form action="{{ route('projects.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project Name :</strong>
                <input type="text" name="proj_name" class="form-control" placeholder="Name">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <strong>Select a customer : </strong>
        <select class="form-select" name="id_cust" id="id_cust" required>
            <option value="" disabled selected>...</option>
                @foreach ($customers as $customer)
                    <option value="{{ $customer->id_cust }}">{{ $customer->cust_name }}</option>
                @endforeach
        </select>
        </div>



        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contract Number  :</strong>
                <input class="form-control" name="proj_contract" placeholder="No SPK / SPR / Contract"></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project Value :</strong>
                <input type="text" name="proj_value" class="form-control" placeholder="Contract Value">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project Due Date :</strong>
                <input type="date" name="proj_due_date" class="form-control" placeholder="Due Date">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project Detail :</strong>
                <input class="form-control" style="height:150px" name="proj_detail" placeholder="Detail about the project"></input>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>

</div>
@endsection
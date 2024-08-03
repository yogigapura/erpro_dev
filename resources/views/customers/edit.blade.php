@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Customers</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('customers.index') }}"> Back</a>
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
  
    <form action="{{ route('customers.update',$customer->id_cust) }}" method="POST">
        <!-- <form action="{{ route('customers.store') }}" method="POST"> -->
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Customer Name :</strong>
                    <input type="text" name="cust_name" value="{{ $customer->cust_name }}" class="form-control" placeholder="Customer Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Customer Address :</strong>
                    <textarea class="form-control" style="height:150px" name="cust_address" placeholder="Customer Address">{{ $customer->cust_address }}</textarea>
                </div>
            </div>
           
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Group ID :</strong>
                    <input type="text" readonly  name="group_id" class="form-control" value="1">
                </div>
            </div>
            <div class="form-group">
                <strong>Customer PIC:</strong>
                <input type="text" name="cust_PIC" value="{{ $customer->cust_PIC }}" class="form-control" placeholder="Customer PIC">
            </div>
            
                <div class="form-group">
                    <strong>User ID :</strong>
                    <input type="text" readonly name="user_id" class="form-control" value="{{ $customer->id }}">
                </div>
           
            <div class="form-group">
                <strong>Customer No COntact:</strong>
                <input type="text" name="cust_NPWP" value="{{ $customer->cust_no_contact }}" class="form-control" placeholder="Customer No Contact">
            </div>
            <div class="form-group">
                <strong>Customer Email:</strong>
                <input type="text"  name="cust_email" value="{{ $customer->cust_email }}" class="form-control" placeholder="Customer Email">
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
   
    </form>
</div>
@endsection

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
                <h2>Customers</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('customers.create') }}"> Create New Customers</a>
            </div>
        </div>
    </div>


    <table class="table table-bordered">
        <tr>
            <th>Customer ID</th>
            <th>Customer Name</th>
            <th>Customer Address</th>
            <th>Customer Email</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($customers as $customer)
        <tr>
            <td>{{ $customer->id_cust }}</td>
            <td>{{ $customer->cust_name }}</td>
            <td>{{ $customer->cust_address }}</td>
            <td>{{ $customer->cust_email }}</td>
            <td>
                <form action="{{ route('customers.destroy',$customer->id_cust) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('customers.show',$customer->id_cust) }}">Detail</a>
    
                    <a class="btn btn-primary" href="{{ route('customers.edit',$customer->id_cust) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
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
        $customers = Customer::latest()->paginate(10);
        return view('customers.index',compact('customers'));
            //->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $user = Auth::user()->id;
        Customer::create(
            // $request->all()
            [
                'id_user' => $user,
                'id_group' => $request->id_group,
                'cust_name' => $request->cust_name,
                'cust_address' => $request->cust_address,
                'cust_pic' => $request->cust_pic,
                'cust_no_contact' => $request->cust_no_contact,
                'cust_email' => $request->cust_email
            ]
        );

        return redirect()
            ->route('customers.index')
            ->with('success','Customer Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return view('customers.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
        return view('customers.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        //
        $customer->update($request->all());
  
        return redirect()
            ->route('customers.index')
            ->with('success','Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
        $customer->delete();
  
        return redirect()
            ->route('customers.index')
            ->with('Success','Product deleted successfully');
    }
}

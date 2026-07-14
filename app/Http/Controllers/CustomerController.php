<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $customers = Customer::latest()->get();

    return view('customers.index', compact('customers'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    Customer::create([
        'name' => $request->name,
        'phone' => $request->phone,
        'email' => $request->email,
        'address' => $request->address,
    ]);

    return redirect()->route('customers.index')
                     ->with('success','Customer Added Successfully');
} 

    /**
     * Display the specified resource.
     */
public function show(string $id)
{
    $customer = Customer::with('sales')->findOrFail($id);

    return view('customers.show', compact('customer'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
{
    $customer = Customer::findOrFail($id);

    return view('customers.edit', compact('customer'));
}

public function update(Request $request, string $id)
{
    $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'email' => 'nullable|email',
        'address' => 'nullable'
    ]);

    $customer = Customer::findOrFail($id);

    $customer->update([
        'name' => $request->name,
        'phone' => $request->phone,
        'email' => $request->email,
        'address' => $request->address,
    ]);

    return redirect()->route('customers.index')
                     ->with('success', 'Customer updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $customer = Customer::findOrFail($id);

    $customer->delete();

    return redirect()->route('customers.index')
                     ->with('success', 'Customer deleted successfully.');
}
}

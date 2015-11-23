<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\HandleCustomerRequest;
use App\Http\Controllers\Controller;

use App\Models\Customer;
use App\Models\Role;
use Session;

class CustomerController extends Controller
{

    private $customer;
    private $role;

    public function __construct(Customer $customer, Role $role)
    {
        $this->customer = $customer;
        $this->role = $role;

        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->customer->with('user')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HandleCustomerRequest $request)
    {
        $this->customer->create($request->all());

        Session::flash('success', 'Customer created');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->customer->with('user')->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HandleCustomerRequest $request, $id)
    {
        $customer = $this->customer->findOrFail($id);
        $customer->update($request->all());

        $role = $this->role->getRole('admin');

        if ($customer->user) {
            if ($request->admin) {
                $customer->user->assignRole($role);
            } else {
                $customer->user->removeRole($role);
            }
        }

        Session::flash('success', 'Customer details updated');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = $this->customer->with('user')->findOrFail($id);
        $customer->user()->delete();
        $customer->delete();

        Session::flash('success', 'Customer deleted');

        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\HandleCustomerRequest;
use App\Http\Controllers\Controller;

use App\Models\Customer;

class CustomerController extends Controller
{

    private $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;

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
        return $this->customer->insert($request);
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

        return $customer->save($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = $this->customer->findOrFail($id);

        return $customer->delete();
    }
}

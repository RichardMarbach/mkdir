<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\DVDInfo;
use Session;
use App\Models\Rental;

class RentalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, DVDInfo $dvds)
    {
        $customer = Customer::firstOrCreate([
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number
        ]);

        $dvd = $dvds->find($request->dvd_id)->getUnrented()->first();

        if (!$dvd) {
            return redirect()->back()->withErrors(['stock' => 'The dvd seems to be out of stock']);
        }

        $input = $request->all();
        $input['customer_id'] = $customer->id;

        $rental = new Rental($input);
        $dvd->rentals()->save($rental);

        Session::flash('success', $dvd->dvd_info->title . ' rented');

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

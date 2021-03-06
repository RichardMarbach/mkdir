<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\DVDInfo;
use Session;
use App\Models\Rental;
use Validator;

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
        $messages = [
            'dvd_id.required' => 'Please choose a real dvd',
            'due_date.after' => 'The dvd should be due after the rental period starts'
        ];

        $validator =  Validator::make($request->all(), [
            'name' => 'required|min:2',
            'address' => 'required|min:2',
            'phone_number' => 'required',
            'dvd_id' => 'required',
            'start_date' =>  'required|date',
            'due_date' =>  'required|date|after:' . $request->start_date
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $customer = Customer::firstOrCreate([
            'name' => $request->name,
            'address' => $request->address,
            'phone_number' => $request->phone_number
        ]);

        $dvd = $dvds->find($request->dvd_id)->getUnrented()->first();

        if (!$dvd) {
            return redirect()->back()->withInput()->withErrors(['stock' => 'The dvd seems to be out of stock']);
        }

        $input = $request->all();
        $input['customer_id'] = $customer->id;

        $rental = new Rental($input);
        $dvd->rentals()->save($rental);

        Session::flash('success', $dvd->dvd_info->title . ' rented');

        return redirect()->back();
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
        $messages = [
            'due_date.after' => 'The dvd should be due after the rental period starts'
        ];

        $validator = Validator::make($request->all(), [
            'start_date' => 'required|date',
            'due_date' => 'required|date|after:' . $request->start_date
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $rental = Rental::findOrFail($id);

        Session::flash('success', 'Rental dates updated');

        if ($request->returned) {
            $rental->return_date = \Carbon\Carbon::now();
            Session::flash('success', 'Dvd returned');
        }
        
        $rental->save($request->all());

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
        $rental = Rental::findOrFail($id);
        $rental->delete();

        Session::flash('success', 'Rental deleted');
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\DVD;
use App\Http\Controllers\Controller;

use Session;
use Auth;
use App\Models\Rental;
use App\Repositories\DVDRepository;
use App\Services\Contracts\ImageStorageContract as ImageStorage;
use App\Http\Requests\HandleDvdRequest;
use App\Models\DVDInfo;

class DVDController extends Controller
{

    private $dvds;
    private $dvd;

    public function __construct(DVDRepository $dvds, DVDInfo $dvd)
    {
        $this->dvds = $dvds;
        $this->dvd = $dvd;
        $this->middleware('auth', ['except' => ['index', 'show', 'search', 'genre']]);
        $this->middleware('role:admin', ['except' => ['index', 'show', 'search', 'genre', 'rent']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DVDRepository $dvds)
    {
        return view('DVD.listing')->with('dvds', $dvds->paginateDvds());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(HandleDvdRequest $request, ImageStorage $storage)
    {
        $input = $request->all();
        
        $input['cover_image'] = $request->cover_image ? $storage->store($request->cover_image) : '';

        $this->dvds->create($input);

        Session::flash('success', 'Added dvd');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(DVDRepository $dvds, $id)
    {
        return view('DVD.showDVD')->with('dvd', $dvds->eagerLoadAll($id));
    }

    /**
     * Retrieve the specified resource in storage
     *
     * @param \Illuminate\Http\Request $request
     * @param App\Repositories\DVDRepository $dvds
     * @return \Illuminate\Http\Response
     */

    public function search(Request $request)
    {
        $title = $request->input('title');
        
        return view('DVD.listing')->with('dvds', $this->dvds->retrieveDvds($title));
    }

    /**
     * Retrieve dvds by genre
     * @param  string $genre
     * @return \Illuminate\Http\Response
     */
    public function genre($genre)
    {
        return view('DVD.listing')->with('dvds', $this->dvds->retrieveByGenre($genre));
    }

    /**
     * Rent a dvd id
     * @param  integer $id
     * @return Illuminate\Http\Response
     */
    public function rent(Request $request, $id)
    {
        $this->validate($request, [
            'start_date' => 'required|date|after:' . \Carbon\Carbon::now()->subDay(1),
            'due_date' => 'required|date|after:' . $request->start_date
        ]);

        $dvds = $this->dvd->findOrFail($id)->getUnrented();

        if ($dvds->isEmpty()) {
            return redirect()->back()->withInput()->withErrors(['stock' => "This dvd is out of stock"]);
        }

        $customer = Auth::user()->customer;

        $dvd = $dvds->first();

        $rental = new Rental([
            'start_date' => $request->start_date,
            'due_date' => $request->due_date,
            'customer_id' => $customer->id
        ]);

        $dvd->rentals()->save($rental);

        Session::flash('success', "Your dvd has been reserved!");

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(HandleDvdRequest $request, ImageStorage $storage, $id)
    {
        $dvd = DVDInfo::findOrFail($id);

        $input = $request->all();

        $input['cover_image'] = $request->cover_image ? $storage->store($request->cover_image) : '';

        $this->dvds->update($dvd, $input);

        Session::flash('success', 'Updated ' . $request->title);

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy(ImageStorage $storage, $id)
    {
        $dvd = DVDInfo::findOrFail($id);

        $storage->delete($dvd->cover_image);

        $dvd->delete();

        Session::flash('success', 'Dvd deleted');

        return redirect()->back();
    }
}

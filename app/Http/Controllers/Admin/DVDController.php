<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\DVD;
use App\Http\Controllers\Controller;

use Session;
use App\Repositories\DVDRepository;
use App\Services\Contracts\ImageStorageContract as ImageStorage;
use App\Http\Requests\HandleDvdRequest;
use App\Models\DVDInfo;

class DVDController extends Controller
{
    private $dvds;

    public function __construct(DVDInfo $dvds)
    {
        $this->dvds = $dvds;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('DVD/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HandleDvdRequest $request, DVDRepository $dvds, ImageStorage $storage)
    {
        $input = $request->all();
        
        $input['cover_image'] = $request->cover_image ? $storage->store($request->cover_image) : '';

        $dvds->create($input);

        Session::flash('success', 'Added dvd');

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function destroy($id, ImageStorage $storage)
    {
        $dvd = $this->dvds->findOrFail($id);

        $storage->delete($dvd->cover_image);

        $dvd->delete();

        Session::flash('success', 'Dvd deleted');

        return redirect()->back();
    }
}

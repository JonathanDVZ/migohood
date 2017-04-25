<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CreateParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
        public function First()
    {
        return view("CreateParking.placeType");
    }

        public function Second()
    {
        return view("CreateParking.bedrooms");
    }

        public function Third()
    {
        return view("CreateParking.baths");
    }

        public function Fourth()
    {
        return view("CreateParking.locations");
    }

    public function Fifth()
    {
        return view("CreateParking.amenities");
    }

        public function Sixth()
    {
        return view("CreateParking.hosting");
    }

        public function Seventh()
    {
        return view("CreateParking.basics");
    }

        public function Eigth()
    {
        return view("CreateParking.listing");
    }

        public function Ninth()
    {
        return view("CreateParking.photos");
    }

        public function Tenth()
    {
        return view("CreateParking.services");
    }            

            public function Eleven()
    {
        return view("CreateParking.notes");
    }            

            public function Twelve()
    {
        return view("CreateParking.co-host");
    }  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}

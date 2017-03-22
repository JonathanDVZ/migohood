<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CreateSpaceController extends Controller
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
        return view("CreateSpace.placeType");
    }
     
        public function Second1()
    {
        return view("CreateSpace.bedrooms");
    }
     
        public function Second2()
    {
        return view("CreateSpace.bedrooms-all");
    }
     
        public function Second3()
    {
        return view("CreateSpace.bedrooms-addbed");
    }

        public function Third()
    {
        return view("CreateSpace.baths");
    }

        public function Fourth()
    {
        return view("CreateSpace.locations");
    }

    public function Fifth()
    {
        return view("CreateSpace.amenities");
    }

        public function Sixth()
    {
        return view("CreateSpace.hosting");
    }

        public function Seventh()
    {
        return view("CreateSpace.basics");
    }

        public function Eigth()
    {
        return view("CreateSpace.listing");
    }

        public function Ninth()
    {
        return view("CreateSpace.photos");
    }

        public function Tenth()
    {
        return view("CreateSpace.services");
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

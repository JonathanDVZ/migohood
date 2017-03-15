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
        return view("CreateSpace.bedrooms1");
    }
     
        public function Second2()
    {
        return view("CreateSpace.bedrooms2");
    }
     
        public function Second3()
    {
        return view("CreateSpace.bedrooms3");
    }
     
        public function Second4()
    {
        return view("CreateSpace.bedrooms4");
    }
     
        public function Second5()
    {
        return view("CreateSpace.bedrooms5");
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

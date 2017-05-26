<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CreateWorkspaceController extends Controller
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
        return view("CreateWorkspace.placeType");
    }

        public function Second(Request $request)
    {
        return view("CreateWorkspace.bedrooms")->with("id", !empty(session('quantity'))?session("quantity"):0);
    }

        public function Third()
    {
        return view("CreateWorkspace.baths");
    }

        public function Fourth()
    {
        return view("CreateWorkspace.locations");
    }

    public function Fifth()
    {
        return view("CreateWorkspace.amenities");
    }

        public function Sixth()
    {
        return view("CreateWorkspace.hosting");
    }

        public function Seventh()
    {
        return view("CreateWorkspace.basics");
    }

        public function Eigth()
    {
        return view("CreateWorkspace.listing");
    }

        public function Ninth()
    {
        return view("CreateWorkspace.photos");
    }

        public function Tenth()
    {
        return view("CreateWorkspace.services");
    }            

            public function Eleven()
    {
        return view("CreateWorkspace.notes");
    }            

            public function Twelve()
    {
        return view("CreateWorkspace.co-host");
    }

    public function Preview1()
    {
        return view("CreateWorkspace.PreviewWorkspace.preview1");
    }

        public function Preview2()
    {
        return view("CreateWorkspace.PreviewWorkspace.preview2");
    }

        public function Preview3()
    {
        return view("CreateWorkspace.PreviewWorkspace.preview3");
    }

        public function Preview4()
    {
        return view("CreateWorkspace.PreviewWorkspace.preview4");
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

@extends('layouts.master') @section('title', 'Amenities') @section('content')
<div class="container amenities">
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <h2 class="text-left">AMENITIES</h2>
            <div class="form-group">
                <input type="email" class="form-control" id="email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="pwd">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10"></div>

    </div>

</div>
@endsection @section("footer") @endsection
@extends('layouts.master') @section('title', 'Amenities') @section('content')
<div class="container amenities">
    <div class="row">
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            <h2 class="text-left">AMENITIES</h2>
            <div class="form-group">
                <input type="text" placeholder="Amenities 1" class="form-control" id="">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Amenities 2" id="">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Amenities 3" id="">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-10"></div>

    </div>

</div>
@endsection @section("footer") @endsection
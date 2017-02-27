@extends('layouts.master') @section('title', 'Amenities') @section('content')
<div class="container amenities">
    <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 insideAm">
            <h2 class="text-left">AMENITIES</h2>
            <div class="form-group">
                <input type="text" placeholder="Amenities 1" class="form-control formis" id="">
            </div>
            <div class="form-group">
                <input type="text" class="form-control formis" placeholder="Amenities 2" id="">
            </div>
            <div class="form-group">
                <input type="text" class="form-control formis" placeholder="Amenities 3" id="">
            </div>
            <button type="submit" class="btn btn-default continue">CONTINUE</button>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12"></div>
</div>

</div>
@endsection @section("footer") @endsection
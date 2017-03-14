@extends('layouts.master') @section('title', 'Second Step Space') @section('content')
<div class="ss-area1">	
	<div class="ss-subarea1-1">					
		<div class="ss-block1">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h3><span class="textwhite">How many room do it have?</span></h3>
				</div>
			</div>
			<div class="dist-col row">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
					<div class="input-group-btn">
                        <button type="button" class="fullwhith btn btn-default dropdown-toggle action" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">1 Beedroom <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                           <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </div>	
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
					<div class="input-group-btn">
                       	<button type="button" class="fullwhith btn btn-default dropdown-toggle action" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">1 Bathroom <span class="caret"></span></button>
                       	<ul class="dropdown-menu">
                          	<li><a href="#">Action</a></li>
                           	<li><a href="#">Another action</a></li>
                           	<li><a href="#">Something else here</a></li>
                           	<li role="separator" class="divider"></li>
                           	<li><a href="#">Separated link</a></li>
                       	</ul>
                    </div>	
				</div>				
			</div>
			<div class="dist-col row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h3><span class="textwhite">Location</span></h3>
				</div>
			</div>
			<div class="dist-col row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<input type="text" class="mi-input box-in-blue  fullwhith text-box-left form-control action" aria-label="..." placeholder="Address">
				</div>
			</div>
		</div>
		</div>		
	</div>	
</div>
<div class="ss-area2">
	<div class="ss-subarea2-1">
		<div class="ss-block1">
			<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-4">
					<input type="text" class="mi-input box-in-blue  fullwhith text-box-left form-control action" aria-label="..." placeholder="City">		
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-4">
					<input type="text" class="mi-input box-in-blue  fullwhith text-box-left form-control action" aria-label="..." placeholder="State">	
				</div>
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-4">
					<input type="text" class="dist-custom mi-input box-in-blue  fullwhith text-box-left form-control action" aria-label="..." placeholder="Zip Code">	
				</div>					
			</div>
			<div class="dist-col row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<p class="textblue">Description</p>
				</div>
			</div>
			<div class="dist-col row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<textarea class="texareacustom action form-control" rows="6"></textarea>
				</div>
			</div>
			<div class="dist-col row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<button class="btn continue textwhite"><b>CONTNUE</b></button>
				</div>
			</div>
		</div>
		<div class="ss-block2">
			<div id="googlemap"></div>
		</div>

	</div>
</div>
@endsection @section("footer") @endsection



                        
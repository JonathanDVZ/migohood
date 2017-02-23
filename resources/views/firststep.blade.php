@extends('layouts.master') @section('title', 'First Step') @section('content')
<div class="container-fluid fs-area1">	            
    <div class="row fs-dist1">
    	<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    	<div class="col-lg-5 col-md-6 col-sm-5 col-xs-10 yyy ">
			<h3><span class="textwhite"><b>WHAT ACOMODATION</b></span><span class="textblue"> <b>TYPE DO YOU HAVE?</b></span></h3>
    	</div>           	
    </div> 

    <div class="fs-area1-sub1 row">
		<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    	<div class="col-lg-5 col-md-6 col-sm-7 col-xs-10 yyy">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                	<div class="input-group">
                        <div class="input-group-btn">
                            <button type="button" class="fullwhith btn btn-default dropdown-toggle action" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>CATEGORY</b><span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </div>
                        <input type="text" class="fullwhith text-box-right form-control action" aria-label="..." placeholder="SPACE">
                  	</div> 
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<div class="row">			
						<div class="col-lg-1 col-md-1 col-sm-1 col-xs-0 "> </div>
						<div class="col-lg-5 col-md-5 col-sm-5 col-xs-6"> 
							<div class="input-group-btn">
                                <button type="button" class="fullwhith btn btn-default dropdown-toggle action" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Private <span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                   <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </div>
						</div>
						<div class="yyy col-lg-1 col-md-1 col-sm-1 col-xs-0"> </div>
						<div class="yyy col-lg-5 col-md-5 col-sm-5 col-xs-6"> 
							<div class="input-group-btn">
                                <button type="button" class="fullwhith btn btn-default dropdown-toggle action" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">1 Guest <span class="caret"></span></button>
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
				</div>
			</div>
		</div>
	</div>  	
     
	<div class="row">
		<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    	<div class="col-lg-5 col-md-6 col-sm-7 col-xs-10 yyy ">
			<div class=" input-group-btn ">
	            <button type="button" class="fullwhith textleft btn btn-default dropdown-toggle action" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>Type of property o service</b><span class="caret"></span></button>
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
     <div class="row"> 
    	<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
    	<div class="col-lg-5 col-md-6 col-sm-3 col-xs-10 yyy ">			
                <button class="btn continue textwhite"><b>SIGN UP</b></button>            
    	</div>           	
    </div> 
</div>
@endsection @section("footer") @endsection



                        
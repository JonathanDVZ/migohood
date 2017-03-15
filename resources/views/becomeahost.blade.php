@extends('layouts.master') @section('title', 'Become a host') @section('content')
<div class="container-fluid area1">	            
    <div class="row dist1" >            	
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
        <div class="col-lg-5 col-md-6 col-sm-6 col-xs-5 ">
			<div class="cajadetexto row">
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
				<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10 "><h1 class="textinitial texttop text-center textwhite">BECOME A HOST OF MIGOHOOD </br> <span class="textblue text-center">AND GENERATE INCOME</span></h1></div>
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1"></div>
			</div>
		</div>
	</div>  
	<div class="row text-center">
		<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
			<a href="{{url('/space-create/place-type')}}" class="btn beginsbecome" role="button"><strong>BEGINS</strong></a>
		</div>
	</div>        
</div>
<div class="container-fluid area2">
	<div class="clearfix textblue tex-area2"><h4> 3 ways to generate?</h4></div>
	<div id="col-bah-1" class="col-bah-area2"></div>
	<div id="col-bah-2" class="col-bah-area2"></div>
	<div id="col-bah-3" class="col-bah-area2"></div>
</div>
<div class="container-fluid area3">
 	<div class="area3-sub1">
		<hr class="hr-bah"/>
		<div class="menu-term">
  			<ul>
    			<!--<li style="float:left;">logo</li>-->
    			<li><a href="">Terms and security</a></li>
    			<li><a href="">Site map  &nbsp; &nbsp;<img src="{{url('/assets/img/sitemap.png')}}" width="25%" height="25%" alt=""></a></li>   				 
  			</ul>
   		</div>
	</div>
</div>
@endsection @section("footer") @endsection

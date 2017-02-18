@extends('layouts.master')
@section('title', 'User Registration') 
@section('class', 'darkbluecolor') 
@section('content')
<div id="Div1" class="text-center center-block">
    <div class="intro-header-page1">   
       <div class="row">
            <div class="col-lg-12">
                <div class="intro-message1">                     
                    <p>                            
                    <div style="display: inline;"><button type="button" class="btngmail" ><img src="{{url('/assets/img/facebook.png')}}" alt="" height="15px" width="15px" align="middle" class="miimagen" ><b>&nbsp;&nbsp;&nbsp;&nbsp; REGISTER WITH GMAIL</b></button></div>
                    </br></br>
                    <div style="display: inline;"><button type="button" class="btngmail"><img src="{{url('/assets/img/gmail.png')}}" alt="" height="15px" width="15px">    <b>&nbsp;&nbsp;&nbsp;&nbsp;REGISTER WITH FACEBOOK</b></button></div>
                    </br></br>
                    </p>
                    <form class="form-horizontal">
                        <div class="form-group separation-element-form">
                            <label for="name" class="col-sm-offset-3 col-sm-3 col-md-offset-3  col-md-2   control-labell" style="text-align:left; color:#023859">Name</label>
                            <div class="col-sm-4 col-sm-pull-1 col-md-pull-0 col-md-4">
                                  <input type="text" class="custom-control form-control" id="name" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group separation-element-form">
                            <label for="email" class="col-sm-offset-3 col-sm-3 col-md-offset-3  col-md-2   control-labell" style="text-align:left; color:#023859">Email</label>
                            <div class="col-sm-4 col-sm-pull-1 col-md-pull-0 col-md-4">
                                  <input type="email" class="custom-control form-control" id="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group separation-element-form">
                            <label for="password" class="col-sm-offset-3 col-sm-3 col-md-offset-3  col-md-2   control-label" style="text-align:left; color:#023859">Password</label>
                            <div class="col-sm-4 col-sm-pull-1 col-md-pull-0 col-md-4">
                                  <input type="password" class="custom-control form-control" id="password" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group separation-element-form">
                            <label for="confirmpassword" class="col-sm-offset-3 col-sm-2 control-label" style="text-align:left; color:#023859">Confirm Password</label>
                            <div class="col-sm-4">
                                  <input type="password" class="custom-control form-control" id="confirmpassword" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-4 separation">
                                <div class="checkbox">                
                                      <input type="checkbox" id="checkbox2" name="checkbox[]"><label for="checkbox2"></label>
                                      <span class="colortext">I agree with terms and conditions, privacy politics, guest refund politics and payments terms o service</span>
                                </div> 
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-10">
                                <button type="submit" class="btn singup"><b>SIGN UP</b></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>   
    </div>
</div>
@endsection

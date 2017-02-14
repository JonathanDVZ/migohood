@extends('layouts.master')
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
                    </br></br></br></br>
                    </p>
                    <form class="form-horizontal">                        
                          <div class="form-group separation-element-form">
                            <label for="email" class="col-sm-offset-4 col-sm-2  control-label" style="text-align:left; color:#023859">Email</label>
                            <div class="col-sm-3">
                              <input type="email" class="form-control" id="email" placeholder="Email">
                            </div>
                          </div>
                          <div class="form-group separation-element-form">
                            <label for="password" class="col-sm-offset-4 col-sm-2 control-label" style="text-align:left; color:#023859">Password</label>
                            <div class="col-sm-3">
                              <input type="password" class="form-control" id="password" placeholder="Password">
                            </div>
                          </div>                      
                          </br>
                          <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-4 separation">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox"> <span class="colortext t1">Remember me</span>
                                </label>
                              </div>
                            </div>
                          </div>
                          </br>
                          <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-10">
                              <button type="submit" class="btn singup"><b>SUBMIT</b></button>
                            </div>
                          </div>
                    </form>
                </div>
            </div>
        </div>   
    </div>
</div>
@endsection

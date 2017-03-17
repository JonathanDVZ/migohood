@extends('layouts.master')
@section('title', 'User Access') 
@section('class', 'darkbluecolor') 
@section('content')
<div id="Div1" class="text-center center-block">
    <div class="intro-header-page1">   
       <div class="row">
            <div class="col-lg-12">
                <div class="intro-message1">                     
                    <p>                            
                    <div style="display: inline;"><button type="button" class="btngmail" ><img src="{{url('/assets/img/gmail.png')}}" alt="" height="15px" width="15px"><b>&nbsp;&nbsp;&nbsp;&nbsp; REGISTER WITH GMAIL</b></button></div>
                    </br></br>
                    <div style="display: inline;"><button type="button" class="btngmail"><img src="{{url('/assets/img/facebook.png')}}" alt="" height="15px" width="15px" align="middle" class="miimagen" ><b>&nbsp;&nbsp;&nbsp;&nbsp;REGISTER WITH FACEBOOK</b></button></div>
                    </br></br></br></br>
                    </p>
                    <form class="form-horizontal" method="POST" action="{{ url('postlogin') }}">                        
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="form-group separation-element-form">
                            <label for="email" class="col-sm-offset-3 col-sm-1 col-md-offset-4 col-md-1 control-label" style="text-align:left; color:#023859">Email</label>
                            <div class="col-sm-4 col-sm-offset-1 col-md-pull-1 col-md-3">
                              <input type="email" class="custom-control form-control" id="email" name="email" placeholder="Email">
                            </div>
                          </div>
                          <div class="form-group separation-element-form">
                            <label for="password" class="col-sm-offset-3 col-sm-1 col-md-offset-4  col-md-1 control-label" style="text-align:left; color:#023859">Clave</label>
                            <div class="col-sm-4 col-sm-offset-1 col-md-pull-1 col-md-3">
                              <input type="password" class="custom-control form-control" id="password" name="password" placeholder="Clave">
                            </div>
                          </div>                      
                          </br>
                          <div class="form-group">
                            <div class="col-sm-offset-4 col-sm-4 separation">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox" id="checkbox3" name="checkbox3"><label for="checkbox3"></label><span class="colortext t1">&nbsp;&nbsp;Recuérdame</span>
                                </label>
                              </div>
                            </div>
                          </div>
                          </br>
                          <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-10">
                              <button type="submit" class="btn singup"><b>ENVIAR</b></button>
                            </div>
                          </div>
                    </form>
                </div>
            </div>
        </div>   
    </div>
</div>
@endsection

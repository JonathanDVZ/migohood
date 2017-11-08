@extends('layouts.master') @section('title', 'Preview Created Space') @section('class', 'contenedor') @section( 'content')
<div class="container-fluid lilmargin firstPart">

    @include('partials.slider')
    
    @include('CreateParking.PreviewParking.navbar.preview-navbar',['activo2' => 'preview2'])
    <div class="container-fluid WhiteBack preBody">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 light-border">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4 text-center hidden-xs">
                <img class="imgHom22" src="{{url('/assets/img/user-logo.svg')}}" alt="">
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                <div>
                    <div class="RetNex2 col-lg-10 col-md-8 col-sm-8 col-xs-8">
                        <span><strong>Juan Perez</strong></span>
                    </div>
                    <div class="RetNex2">
                        <span>12/12/12</span>
                    </div>
                    <br>
                    <fieldset class="rating">
                        <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
                        <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                        <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                        <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                        <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
                        <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                        <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                        <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                        <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                    </fieldset>
                    <br>
                    <br>
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione et ipsa vel distinctio nisi architecto quibusdam ipsam! Blanditiis iure architecto pariatur cumque, dignissimos magnam doloremque rerum, doloribus inventore, at ullam!
                    </p> 
                    <br>    
                </div>
            </div>
            <hr class="black">
            <div class="col-lg-3 col-md-4 col-sm-4 col-xs-4 text-center hidden-xs">
                <img class="imgHom22" src="{{url('/assets/img/user-logo.svg')}}" alt="">
            </div>
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="col-lg-10 col-md-8 col-sm-8 col-xs-8 RetNex2">
                        <span><strong>Juan Perez</strong></span>
                    </div>
                    <div class=" RetNex2">
                        <span>12/12/12</span>
                    </div>
                    <br>
                    <div>
                        <fieldset class="rating">
                            <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
                            <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>
                            <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
                            <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half" for="star3half" title="Meh - 3.5 stars"></label>
                            <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
                            <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>
                            <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
                            <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half" for="star1half" title="Meh - 1.5 stars"></label>
                            <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
                            <input type="radio" id="starhalf" name="rating" value="half" /><label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
                        </fieldset>
                    </div>
                    <br>
                    <br>
                    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione et ipsa vel distinctio nisi architecto quibusdam ipsam! Blanditiis iure architecto pariatur cumque, dignissimos magnam doloremque rerum, doloribus inventore, at ullam!
                    </p>
                    <br>
                </div>
            <hr class="black">
        </div>
    </div>
</div>

</div>
</div>
@endsection
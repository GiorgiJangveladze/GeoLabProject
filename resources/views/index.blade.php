@extends('layouts.app')
@section('title','index')
@section('content')

   <div class="button-content display-container"> </div>
     <div style="z-index: 2" id="burgerIcon" onclick="openNav()" > 
           <img class="burger-img" src="images/burger-white.svg" alt="burger">
           <img style="display: none;" class="burger-img2" src="images/burger-red.svg" alt="burger">
   </div>


  <div id="home" style="position: relative;">

          <img style="z-index: 1" class="logo-img" id="logoWhite" src="images/logo-white.svg" alt="logo-white"> 
          <img class="logo-img" id="logoRed" src="images/logo-red.svg" alt="logo-red" style="display: none; z-index: 3">

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" role="listbox">
    @foreach($slides as $slide)
      <div class="carousel-item @if ($slides[0] == $slide) active @endif">
          <img class="d-block img-fluid" src="{{$slide->img}}" alt="Second slide">
          <div class="date">
              <div class="txt-date">{{ str_replace('-','.',$slide->date)}}</div>
              <div class="txt-date-2">{{$slide->title}}</div>
          </div>
      </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
    <div class="button-left display-left"><img class="arrow-left" src="images/arrow.svg" alt="arrow"></div>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
   <!--  <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
   <div class="button-right display-right"><img class="arrow-right" src="images/arrow.svg" alt="arrow"> </div>
    <span class="sr-only">Next</span>
  </a>
</div>
    
    <!--<div class="date">
        <h2></h2> class="txt-date">27.11.</h2></h2>>
        <h2></h2> class="txt-date">Vintage Auto Exhibition</h2></h2>>
    </div> -->
</div>



  
  <div id="services">
       <div class="container">
           <div class="services-header col-12"> 
              the corner garage for collector cars
           </div>
  
          <div class="row">
            @foreach($services as $service)
              <div class="col-md-4 col-sm-12">
                  <div class="services-background">
                  <a href="#"><img class="services-img" src="{{$service->img}}" alt="modify"> </a>
                  <div class="box-header">{{$service->title}}</div>
                  </div>
              </div>
          @endforeach
          </div>
          
       </div>
  
          <div class="container-fluid bus-background ">
              <div class="bus"> <img style="width: 270px; float:right;" src="images/bus.png" alt="bus"></div>
           </div>
  </div>
  
  
  <div id="contact" style="position: relative;"> 
  
      <div id="googlemaps"> </div>
  
       <div class="container contact-form">
          <div class="row">
             <div style="background: #EBE8DE" class="col-lg-4 col-md-12 p-5 adress-left "> 
                  <div class="contact-info"> contact information </div>
                  <div class="contact-info2"> click to <br/> view </div>
      
                  <div class="social-img">
                  @foreach($sociallinks as $sociallink)
                   <a href="{!! $sociallink->link !!}" target="_blank">
                    <i @switch($sociallink->id)
                        @case(1)
                            class="fa fa-google-plus social-icon google-plus"
                            @break
                        @case(2)
                            class="fa fa-facebook social-icon facebook"
                            @break
                        @case(3)
                          class="fa fa-twitter social-icon twitter"
                        @break
                    @endswitch 
                    aria-hidden="true"></i>
                    <!--<img class="social-img" src="{{$sociallink->icon}}" alt="icon"> --></a>
                  @endforeach
                 </div>
             </div>
      
      
             <div class="col-lg-8 col-md-8 col-md-12 col-sm-12 p-5 adress-right">
              <form method="post">
              {!! csrf_field() !!}
              <div class="row">
                <div class=" contact-header text-left mb-4 ">GET IN TOUCH</div>   
            <div class="col-md-6">

                <input type="text" id="name-txt" name="name" value="{{ old('name') }}"  placeholder="name" required>
                @if ($errors->has('name'))
                    <div class="validation-msg"> please write your name </div> <!--{{ $errors->first('name') }} -->
                @endif

                <input type="email" id="email-txt" name="email" value="{{ old('email') }}" placeholder="email" required>
                 @if ($errors->has('email'))
                  <div class="validation-msg"> please write your email </div> <!--{{ $errors->first('email') }} -->
                @endif

               
                <input type="text" id="subject-txt" name="subject" value="{{ old('subject') }}" placeholder="subject" required>
                @if ($errors->has('subject'))
                 <div class="validation-msg"> please write your subject </div> <!--{{ $errors->first('subject') }}-->
                @endif
                
                <textarea id="message-txt" name="description" placeholder="text" rows="3" required>{{ old('description') }}</textarea>
                 @if ($errors->has('description'))
                 <div class="validation-msg"> please write text </div><!--{{ $errors->first('description') }} -->
                @endif
                   
            </div>
      
      
               <div style="white-space: nowrap;" class="col-5 ml-2">
                    <input type="radio" name="gender" value="male"> <span class="radio-txt"  @if(old('gender')== 'male')
                    checked
                    @endif> Male </span>
                    <input type="radio" name="gender" value="female"> <span class="radio-txt" @if(old('gender')=='female')
                    checked
                    @endif> Female </span>
                    @if ($errors->has('gender'))
                      <div class="validation-msg-gender"> please choose your gender </div><!--{{ $errors->first('gender') }} -->
                    @endif
                    

                    <div class="checkbox-header"> sign up for newsletter: </div>
                    <input type="checkbox" name="newsletters[]"  value="images"  @if(is_array(old('newsletters')) && in_array('images', old('newsletters'))) checked @endif> 
                    <span class="chackbox-txt"> recive images <br> </span>

                    <input type="checkbox" name="newsletters[]" value="promotions"  @if(is_array(old('newsletters')) && in_array('promotions', old('newsletters'))) checked @endif> 
                    <span class="chackbox-txt"> recive promotions <br> </span>

                    <input type="checkbox" name="newsletters[]" value="updates" @if(is_array(old('newsletters')) && in_array('updates', old('newsletters'))) checked @endif>
                     <span class="chackbox-txt"> recive updates <br> </span>

                    <input type="checkbox" name="newsletters[]" value="joboffers" @if(is_array(old('newsletters')) && in_array('joboffers', old('newsletters'))) checked @endif> 
                    <span class="chackbox-txt"> recive job offers <br> </span>

                    <input  style="float: right" type="submit"  id="submitBtn" value="send">
             </div>
            </div>  
                   @if (\Session::has('success'))                 
                      <div  class="validation-msg-radio"> Thank you for your intereset for us, your message has been sent! </div>   
                   @elseif(\Session::has('error'))
                   <span class="help-block">
                       <strong>{!! \Session::get('error') !!}</strong>
                   </span>
                   @endif
                </form>  
             </div>                
          </div>   
     </div>
   </div>

    <div style="display: none;" class="container social-icon-txt"> 
      <div class="row">
                 <div class="col-md-9 col-sm-7 col-7"> 
                       <div class="contact-info3"> click to view </div>
                 </div>
                      <div class=" col-md-3 col-sm-5 col-5 social-img2 pl-40">
                        @foreach($sociallinks as $sociallink)
                         <a href="{!! $sociallink->link !!}" target="_blank" style="text-decoration: none;">
                          <i @switch($sociallink->id)
                              @case(1)
                                  class="fa fa-google-plus social-icon google-plus"
                                  @break
                              @case(2)
                                  class="fa fa-facebook social-icon facebook"
                                  @break
                              @case(3)
                                class="fa fa-twitter social-icon twitter"
                              @break
                          @endswitch 
                          aria-hidden="true"></i>
                         <!-- <img class="social-img" src="{{$sociallink->icon}}" alt="icon"> --> </a>
                        @endforeach
                     </div>      
        </div>
    </div>

  <hr style="display: none;" class="line-horizontal"> 

@stop
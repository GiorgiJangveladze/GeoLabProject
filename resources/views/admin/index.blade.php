@extends('layouts.admin')
@section('title','index')
@section('content')

<main role="main" class="col-sm-9 ml-sm-auto col-md-10 pt-3">
          <h1>Dashboard</h1>

          <section class="row text-center placeholders">
            <div class="col-6 col-sm-3 placeholder">
              <h3>{{ $recive['images'] }}</h3>
              <h4>Recive images</h4>
            </div>
            <div class="col-6 col-sm-3 placeholder">
              <h3>{{ $recive['promotions'] }}</h3>
              <h4>Revice promotions</h4>
            </div>
            <div class="col-6 col-sm-3 placeholder">
              <h3>{{ $recive['updates'] }}</h3>
              <h4>Recive updates</h4>
            </div>
            <div class="col-6 col-sm-3 placeholder">
              <h3>{{ $recive['joboffers'] }}</h3>
              <h4>Recive job offers</h4>
            </div>
          </section>
          <div class="container">
          <div class="row">
            <div class="col-lg-2 col-sm-6">
              <div class="circle-tile ">
                <a href="#"><div class="circle-tile-heading dark-blue"><img class="icon" src="/gallery/icons/users-icon.png"></div></a>
                <div class="circle-tile-content dark-blue">
                  <div class="circle-tile-description text-faded">Subscribers</div>
                  <div class="circle-tile-number text-faded ">{{ $countSub }}</div>
                  <a class="circle-tile-footer" href="{!! route('subscribers') !!}">More info<i class="fa fa-chevron-circle-right"></i></a>
                </div>
              </div>
            </div>
             
            <div class="col-lg-2 col-sm-6">
              <div class="circle-tile ">
                <a href="#"><div class="circle-tile-heading red"><img class="icon" src="/gallery/icons/serviceicon.png"></div></a>
                <div class="circle-tile-content red">
                  <div class="circle-tile-description text-faded"> Services </div>
                  <div class="circle-tile-number text-faded ">{{ $services }}</div>
                  <a class="circle-tile-footer" href="{!! route('services') !!}">More Info <i class="fa fa-chevron-circle-right"></i></a>
                </div> 
              </div>
            </div> 
          </div> 
        </div>  
@stop
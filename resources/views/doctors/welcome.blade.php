@extends('doctors.layout.app')

@section('title', "Welcome||Doctor's Panel")

@section('content')

  <main role="main" class="main-content">
    <div class="container">
      <div class="row justify-content-center">
        <video autoplay loop muted>
          <source src="{{ asset('doctors-assets/vdo/welcome.mp4') }}" type="video/mp4">
        </video>
        <div class="text-box">
          <h1 style="font-size: 80px; width:60%">WELCOME TO EASY DOC DOCTOR'S PANEL</h1>
        </div>
      </div>
    </div>
  </main>

@endsection
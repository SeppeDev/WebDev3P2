@extends('layouts.app')

@section('content')
        
    <a class="logo" href="{{ url( App::getLocale() . '/' ) }}"><img src="{{ url('img/Logo.png') }}"></a>

    <div class="carousel carousel-slider" data-indicators="true">
        
        <a class="carousel-item" href="#"><img src="img/Cat.jpg"></a>
        <a class="carousel-item" href="#"><img src="img/Parrot.jpg"></a>
        <a class="carousel-item" href="#"><img src="img/Luka.jpg"></a>
    </div>

    <div class="container">
        <div class="row mar-top-xl">
            <div class="col l4">
            </div>
            <div class="col l2">
                <a class="btn" href="{{ url( 'en/' ) }}">English</a>
            </div>
            <div class="col l2">
                <a class="btn" href="{{ url( 'nl/' ) }}">Nederlands</a>
            </div>
        </div>
    </div>
        
@endsection

@extends('layouts.app')

@section('content')
<div class="side-nav-bar">
    <!-- Material sidebar -->
    <div id="sidebar" class="sidebar sidebar-default open" role="navigation">
        <!-- Sidebar navigation -->
        <ul class="nav sidebar-nav">
            
            <li id="menu">
                <a href="{{ url( App::getLocale() )}}">
                    <i class="fa fa-bars center-align" aria-hidden="true"></i>
                </a>
            </li>
            <li class="menu">
                <a href="{{ url( App::getLocale() . '/search' )}}">
                    <i class="fa fa-search center-align" aria-hidden="true"></i>
                </a>
            </li>
            <li class="menu">
                <a href="{{ url( App::getLocale() . '/faq' )}}">
                    <i class="fa fa-question center-align" aria-hidden="true"></i>
                </a>
            </li>
            <li class="menu">
                <a href="{{ url( App::getLocale() . '/about' )}}">
                    <i class="fa fa-envelope-o center-align" aria-hidden="true"></i>
                </a>
            </li>
            
            <li class="divider"></li>
            
            <li class="category white-animals">
                <a href="{{ url( App::getLocale() . '/category/1' )}}">
                    <img class="dogs" src="{{ url('img/transparent.png') }}" alt="Dogs">
                </a>
            </li>
            <li class="category white-animals">
                <a href="{{ url( App::getLocale() . '/category/2' )}}">
                    <img class="cats" src="{{ url('img/transparent.png') }}" alt="Cats">
                </a>
            </li>
            <li class="category white-animals">
                <a href="{{ url( App::getLocale() . '/category/3' )}}">
                    <img class="fish" src="{{ url('img/transparent.png') }}" alt="Fish">
                </a>
            </li>
            <li class="category white-animals">
                <a href="{{ url( App::getLocale() . '/category/4' )}}">
                    <img class="birds" src="{{ url('img/transparent.png') }}" alt="Birds">
                </a>
            </li>
            <li class="category white-animals">
                <a href="{{ url( App::getLocale() . '/category/5' )}}">
                    <img class="small-animals" src="{{ url('img/transparent.png') }}" alt="Small animals">
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="row content">
    <div class="carousel carousel-slider" data-indicators="true">
        
        <a class="carousel-item" href="#"><img src="img/Cat.jpg"></a>
        <a class="carousel-item" href="#"><img src="img/Parrot.jpg"></a>
        <a class="carousel-item" href="#"><img src="img/Luka.jpg"></a>
    </div>

    <div class="container">
        <div class="row">
            <div class="col l12">

                <!-- Display Validation Errors -->
                @include('common.errors')
                @include('common.success')

                <div class="row">
                    @if (Auth::guest())

                        <div class="row">
                            <div class="row mar-top-xl">
                                <div class="col l8 offset-l2 center">Welcome mister or miss Admin of Kowloon! You've found the secret url path here, I'm proud</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col l3 push-l6">
                                <a href="{{ url('/login') }}">Login</a>
                            </div>
                        </div>

                    @else

                        <div class="row">
                            <div class="row mar-top-xl">
                                <div class="col l8 offset-l2 center">Welcome {{ Auth::user()->name }}</div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col l3 push-l3 center">
                                <a href="{{ url('/admin/dashboard') }}">
                                    Dashboard
                                </a>
                            </div>

                            <div class="col l3 push-l3 center">
                                <a href="{{ url('/logout') }}"
                                    onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        </div>
                    @endif
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

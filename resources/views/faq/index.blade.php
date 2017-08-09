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
    <div id="faq">
        <div class="container">
            <div class="row">
                <div class="col l12">

                    <!-- Display Validation Errors -->
                    @include('common.errors')
                    @include('common.success')
                    
                    <div class="row">
                        <div class="right">
                            <a class="exit" href="{{ url( App::getLocale() . '/' ) }}">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>

                    <div class="row mar-top-xl">
                        <h1>Fraquently asked questions</h1>
                    </div>

                    <div class="row mar-top-xl">
                        <form action="{{ url( App::getLocale() . '/faq/search' ) }}" method="POST" class="col s12">
                            <div class="row">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="input-field col s12">
                                    <input name ="search" id="search" type="text" value="{{$search}}">
                                    <label for="search"><i class="fa fa-search" aria-hidden="true"></i> Search on keyword <i class="fa fa-arrow-left" aria-hidden="true"></i></label>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="row">
                        <p>
                            Don't find what you're looking for?
                                </br>
                            You can always contact our <a href="{{ url( App::getLocale() . '/about' ) }}">customer service</a>. We're happy to help you!
                        </p>
                    </div>

                    <div class="row">
                        <ul class="collapsible" data-collapsible="expandable">
                            @foreach ($faqs as $faq)
                                <li class=" active hoverable">
                                    <h3 class="collapsible-header">{{$faq->question}}</h3>
                                    <p class="collapsible-body">{{$faq->awnser}}</p>
                                </li>
                            @endforeach
                        </ul>
                        {{$faqs->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

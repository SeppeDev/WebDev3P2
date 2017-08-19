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
    <a class="logo" href="{{ url( App::getLocale() . '/' ) }}"><img src="{{ url('img/Logo.png') }}"></a>

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
                
                <div class="row mar-top-xl">
                    <div class="col l8 offset-l2 center">@lang("home.lorem ipsum")</div>
                </div>

                <div class="row">
                    @foreach ($categories as $category)
                        <div class="col l2 category-button hoverable">
                            <a href="{{ App::getLocale()}}/category/{{$category->id}}">
                                <div class="image-container valign-wrapper">
                                    <img class="_{{$category->id}} valign" src="img/transparent.png" alt="{{$category->name}}">
                                </div>
                                <h3 class="center title_2">@lang("home.$category->name")</h3>
                            </a>
                        </div>
                    @endforeach

                    <div class="col l2 hoverable">
                        <div class="image-container">
                                <i class="fa fa-plus center-align" aria-hidden="true"></i>
                            </div>
                        <h3 class="center title_2">@lang("home.other")</h3>
                    </div>
                </div>

                <div class="row">
                    <h1 class="title_1">@lang("home.hot items")</h1>
                    
                    <div class="row">
                        @foreach ($hotItems as $hotItem)
                            <div class="col l3">
                                <div class="card hoverable">
                                    <a href="{{ url( App::getLocale() . '/product/' . $hotItem->product->id ) }}">
                                        <div class="card-image">
                                            <img src="{{$hotItem->product->pictures[0]->url}}">
                                            <div class="colors">
                                                @foreach ($hotItem->product->colors as $color)
                                                <div class="color" style="background-color:#{{$color->hex_color}};">
                                                    
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="after bg_{{$hotItem->product->category_id}}"><i class="fa fa-indent" aria-hidden="true"></i></div>
                                        </div>
                                        <div class="card-content row">
                                            <div class="col l8">{{$hotItem->product->name}}</div>
                                            <div class="col l4">€{{$hotItem->product->price}}</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="row newsletter">
                    <div class="col l7">
                        <img src="{{ url( 'img/Patern.jpg' ) }}">
                        <div class="image-content">
                            <h2 class="center">@lang("home.discover")</h2>
                            <h4 class="center">@lang("home.only newsletter")</h4>
                        </div>
                    </div>
                    <div class="col l5 email-content">
                        <div class="row">
                            <h3>@lang("home.subscribe")</h3>
                            <p>Lorem ipsum dolor sit amet...</p>
                        </div>
                        <div class="row">
                            <form action="{{ url( 'subscribe' ) }}" method="POST" class="col s12">
                                <div class="row">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="input-field col s10">
                                        <input name="email" id="email" type="email" class="validate">
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="input-field col s2">
                                        <input type="submit" value="OK">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

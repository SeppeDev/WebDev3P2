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
            
            <li class="category white-animals {{ ($category->id == 1) ? 'active' : '' }}">
                <a href="{{ url( App::getLocale() . '/category/1' )}}">
                    <img class="dogs" src="{{ url('img/transparent.png') }}" alt="Dogs">
                </a>
            </li>
            <li class="category white-animals {{ ($category->id == 2) ? 'active' : '' }}">
                <a href="{{ url( App::getLocale() . '/category/2' )}}">
                    <img class="cats" src="{{ url('img/transparent.png') }}" alt="Cats">
                </a>
            </li>
            <li class="category white-animals {{ ($category->id == 3) ? 'active' : '' }}">
                <a href="{{ url( App::getLocale() . '/category/3' )}}">
                    <img class="fish" src="{{ url('img/transparent.png') }}" alt="Fish">
                </a>
            </li>
            <li class="category white-animals {{ ($category->id == 4) ? 'active' : '' }}">
                <a href="{{ url( App::getLocale() . '/category/4' )}}">
                    <img class="birds" src="{{ url('img/transparent.png') }}" alt="Birds">
                </a>
            </li>
            <li class="category white-animals {{ ($category->id == 5) ? 'active' : '' }}">
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
        
        <a class="carousel-item" href="#"><img src="{{ url('img/Cat.jpg') }}"></a>
        <a class="carousel-item" href="#"><img src="{{ url('img/Parrot.jpg') }}"></a>
        <a class="carousel-item" href="#"><img src="{{ url('img/Luka.jpg') }}"></a>
    </div>

    <div class="container">
        <div class="row">
            <div class="col l12">

                <!-- Display Validation Errors -->
                @include('common.errors')
                @include('common.success')
                
                <div class="row mar-top-xl">
                    <div class="col l12">
                        <a href="{{ url( App::getLocale() . '/' ) }}" class="breadcrumb breadcrumb_K">K</a>
                        <a href="{{ url( App::getLocale() . '/category/' . $category->id ) }}" class="breadcrumb breadcrumb_category"><span class="breadcrumb_color breadcrumb_color-{{$category->id}}"></span>{{$category->name}}</a>
                    </div>
                </div>

                <div class="row mar-top-xl">
                    <h1 class="title_1">{{$category->name}} articles</h1>
                </div>

                <div class="row filter">
                    <ul class="collapsible" data-collapsible="accordion">
                        <li class="hoverable">
                            <h2 class="collapsible-header">Filter</h2>
                            <div class="collapsible-body">
                                <form action="{{ url( App::getLocale() . '/category/'.$category->id.'/filter' ) }}" method="POST">
                                    <div class="row">
                                        <h3>By collection</h3>

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        @foreach ($collections as $collection)
                                            <input name="collections[]" type="checkbox" id="collections{{$collection->id}}" value="{{$collection->id}}" checked/>
                                            <label for="collections{{$collection->id}}">{{$collection->name}}</label>
                                        @endforeach
                                    </div>

                                    <div class="row">
                                        <h3>Price range</h3>

                                        <div class="col l6">
                                            <div id="test-slider"></div>
                                        </div>
                                        <div class="col l6">
                                            <div class="row">
                                                <div class="col l5 push-l1">
                                                    <input name="min-price" id="min-price" type="number" class="validate">
                                                    <label for="min-price">€</label>
                                                </div>
                                                <div class="col l1 push-l1">
                                                    <span>-</span>
                                                </div>
                                                <div class="col l5 push-l1">
                                                    <input name="max-price" id="max-price" type="number" class="validate">
                                                    <label for="max-price">€</label>
                                                </div>
                                            </div>   
                                        </div>
                                    </div>

                                    <div class="input-field row">
                                        <input type="submit" value="Filter">
                                    </div> 
                                </form>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="row">
                    @foreach ($category->products as $product)
                            <div class="col l3">
                                <div class="card hoverable">
                                    <a href="{{ url( App::getLocale() . '/product/' . $product->id )}}">
                                        <div class="card-image">
                                            <img src="{{ url( $product->pictures[0]->url ) }}">
                                            <div class="colors">
                                                @foreach ($product->colors as $color)
                                                <div class="color" style="background-color:#{{$color->hex_color}};">
                                                    
                                                </div>
                                                @endforeach
                                            </div>
                                            <div class="after bg_{{$product->category_id}}"><i class="fa fa-indent" aria-hidden="true"></i></div>
                                        </div>
                                        <div class="card-content row">
                                            <div class="col l8">{{$product->name}}</div>
                                            <div class="col l4">€{{$product->price}}</div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

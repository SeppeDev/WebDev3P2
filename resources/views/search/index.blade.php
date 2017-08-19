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
    <div id="search-page">
        <div class="container">
            <div class="row">
                <div class="col l12">

                    <!-- Display Validation Errors -->
                    @include('common.errors')
                    @include('common.success')

                    <form action="{{ url( App::getLocale() . '/search/search' ) }}" method="POST" class="col s12">                    
                        <div class="row">
                            <div class="col l11">
                                <div class="row advanced-search">
                                    <ul class="collapsible" data-collapsible="accordion">
                                        <li class="hoverable">
                                            <h2 class="collapsible-header">Advanced filter <i class="fa fa-angle-down" aria-hidden="true"></i></h2>
                                            
                                            <div class="collapsible-body">
                                                <div class="row">
                                                    <div class="col l6">
                                                        <h3>Category</h3>

                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        @foreach ($categories as $category)
                                                            <input name="categories[]" type="checkbox" id="categories{{$category->id}}" value="{{$category->id}}" checked/>
                                                            <label for="categories{{$category->id}}">{{$category->name}}</label>
                                                        @endforeach
                                                    </div>

                                                    <div class="col l6">
                                                        <div class="row">
                                                            <h3>Price range</h3>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col l11">
                                                                <div id="test-slider"></div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col l1">
                                                                <label for="min-price">€</label>
                                                            </div>
                                                            <div class="col l4">
                                                                <input name="min-price" id="min-price" type="number" class="validate">
                                                            </div>

                                                            <div class="col l1">
                                                                <span>-</span>
                                                            </div>

                                                            <div class="col l1">
                                                                <label for="max-price">€</label>
                                                            </div>
                                                            <div class="col l4">
                                                                <input name="max-price" id="max-price" type="number" class="validate">
                                                            </div>
                                                        </div>  
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="input-field">
                                                        <input type="submit" value="Filter">
                                                    </div>
                                                </div> 
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="col l1 right">
                                <a class="exit" href="{{ url( App::getLocale() . '/' ) }}">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>

                        <div class="row mar-top-xl">
                                <div class="row">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="input-field col s12">
                                        <input name ="search" id="search" type="text" value="{{$search}}">
                                        <label for="search" class="title_4"><i class="fa fa-search" aria-hidden="true"></i> Just start typing and hit <i class="fa fa-arrow-left" aria-hidden="true"></i> to search </label>
                                    </div>
                                </div>
                        </div>
                    </form>

                    <div class="row">
                        <p>
                            Don't find what you're looking for?
                                </br>
                            You can always contact our <a href="{{ url( App::getLocale() . '/about' ) }}">customer service</a>. We're happy to help you!
                        </p>
                    </div>

                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col l12">
                                <a href="{{ url( App::getLocale() . '/product/' . $product->id ) }}"><div class="card horizontal hoverable">
                                    
                                        <div class="card-image col l3">
                                            <img src="{{ url( $product->pictures[0]->url ) }}">
                                            <div class="colors">
                                                @foreach ($product->colors as $color)
                                                <div class="color" style="background-color:#{{$color->hex_color}};">
                                                    
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="card-content col l9">
                                            <div class="row">
                                                <div class="col l8">
                                                    <h3>{{$product->name}}</h3>
                                                </div>
                                                <div class="col l4">
                                                    <h4>€{{$product->price}}</h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <p>{{$product->description}}</p>
                                            </div>
                                        </div>
                                    
                                </div></a>
                            </div>
                        @endforeach
                    </div>
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

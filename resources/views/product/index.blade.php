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
    <div class="container product">
        <div class="row">
            <div class="col l12">

                <!-- Display Validation Errors -->
                @include('common.errors')
                @include('common.success')
                
                <div class="logo-div">
                    <a class="logo" href="{{ url( App::getLocale() . '/' ) }}"><img src="{{ url('img/Logo.png') }}"></a>
                </div>

                <div class="row mar-top-xl">
                    <div class="row">
                        <div class="col l6 images">
                            <div class="row">
                                <div class="col l12">
                                    <img src="{{ url( $product->pictures[0]->url ) }}">
                                </div>
                            </div>
                            <div class="row">
                                @if (isset($product->pictures[0]))
                                    <div class="col l4">
                                        <img src="{{ url( $product->pictures[0]->url ) }}">
                                    </div>
                                @endif
                                @if (isset($product->pictures[1]))
                                    <div class="col l4">
                                        <img src="{{ url( $product->pictures[1]->url ) }}">
                                    </div>
                                @endif
                                @if (isset($product->pictures[2]))
                                    <div class="col l4">
                                        <img src="{{ url( $product->pictures[2]->url ) }}">
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col l6 info">
                            <div>
                                <a href="{{ url( App::getLocale() . '/' ) }}" class="breadcrumb breadcrumb_K">K</a>
                                <a href="{{ url( App::getLocale() . '/category/' . $product->category->id ) }}" class="breadcrumb breadcrumb_category"><span class="breadcrumb_color breadcrumb_color-{{$product->category->id}}"></span>{{$product->category->name}}</a>
                                @foreach($product->collections as $collection)
                                    <a href="{{ url( App::getLocale() . '/product/' . $product->id ) }}" class="breadcrumb breadcrumb_collection">{{$collection->name}}</a>
                                @endforeach

                                <h1 class="title_1">{{$product->name}}</h1>
                                <h2 class="title_5">€ {{$product->price}}</h2>
                                <h3>Colors</h3>
                                <div class="colors">
                                    @foreach ($product->colors as $color)
                                        <div class="color" style="background-color:#{{$color->hex_color}};">
                                            
                                        </div>
                                    @endforeach
                                </div>
                                <h3>Description</h3>
                                <p>{{$product->description}}</p>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="row specifications mar-btm-l">
                    <div class="col l12">
                        <h3 class="title_5">Specifications</h3>
                        <h4>Dimensions</h4>
                        <p class="mar-left-l">
                            @foreach ($product->sizes as $size)
                                {{$size->name}} - {{$size->length}} x {{$size->width}}
                                @if ($size->height)
                                    x {{$size->height}}
                                @endif
                                cm
                                </br>
                            @endforeach
                        </p>
                        <h4>Technical info</h4>
                        <p class="mar-left-l">
                            {{$product->technical_description}}
                        </p>
                    </div>
                </div>

                <div class="row related-products">
                    <h2 class="title_5">Related products</h2>
                    <div class="row">
                        @foreach ($collections as $collection)
                            @foreach ($collection->products as $theProduct)
                                <div class="col l3">
                                    <div class="card hoverable">
                                        <a href="{{ url( App::getLocale() . '/product/' . $theProduct->id )}}">
                                            <div class="card-image">
                                                <img src="{{ url( $theProduct->pictures[0]->url ) }}">
                                                <div class="colors">
                                                    @foreach ($theProduct->colors as $color)
                                                    <div class="color" style="background-color:#{{$color->hex_color}};">
                                                        
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <div class="after bg_{{$theProduct->category_id}}"><i class="fa fa-indent" aria-hidden="true"></i></div>
                                            </div>
                                            <div class="card-content row">
                                                <div class="col l8">{{$theProduct->name}}</div>
                                                <div class="col l4">€{{$theProduct->price}}</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
                <div class="row faq">
                    <h2 class="title_5">Frequently asked questions</h2>
                        @if(count($product->faqs) > 0)
                            <ul class="collapsible" data-collapsible="accordion">
                                @foreach ($product->faqs as $faq)
                                    <li class="hoverable">
                                        <h3 class="collapsible-header">{{$faq->question}} <i class="fa fa-angle-down" aria-hidden="true"></i></h3>
                                        <p class="collapsible-body">{{$faq->awnser}}</p>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p>There are no frequently asked questions directly related to this product.</p>
                        @endif
                    <div class="right"><a href="{{url( App::getLocale() . '/faq' )}}">more questions?</a></div>
                </div>

                <div class="row newsletter">
                    <div class="col l7">
                        <img src="{{ url( '/img/Patern.jpg' ) }}">
                        <div class="image-content">
                            <h2 class="center">Discover amazing Kowloon deals!</h2>
                            <h4 class="center">Only in our newsletter</h4>
                        </div>
                    </div>
                    <div class="col l5 email-content">
                        <div class="row">
                            <h3>Subscribe to our newsletter</h3>
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

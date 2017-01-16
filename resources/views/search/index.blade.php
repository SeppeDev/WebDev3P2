@extends('layouts.app')

@section('content')
<div id="search-page">
    <div class="container">
        <div class="row">
            <div class="col l12">

                <!-- Display Validation Errors -->
                @include('common.errors')
                @include('common.success')
                
                <div class="row">
                    <div class="col l11">
                        <h2>Advanced Filter</h2>
                    </div>

                    <div class="col l1 right">
                        <a class="exit" href="{{ url( App::getLocale() . '/' ) }}">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

                <div class="row mar-top-xl">
                    <form action="{{ url( App::getLocale() . '/search/search' ) }}" method="POST" class="col s12">
                        <div class="row">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="input-field col s12">
                                <input name ="search" id="search" type="text" value="{{$search}}">
                                <label for="search"><i class="fa fa-search" aria-hidden="true"></i> Just start typing and hit <i class="fa fa-arrow-left" aria-hidden="true"></i> to search </label>
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
@endsection

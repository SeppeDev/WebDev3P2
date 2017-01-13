@extends('layouts.app')

@section('content')
<div class="container product">
    <div class="row">
        <div class="col l12">

            <!-- Display Validation Errors -->
            @include('common.errors')
            @include('common.success')
            
            <div class="row mar-top-xl">
                <div class="col l8 offset-l2 center">
                    <a href="{{url( '/' )}}">
                        <h1>KOWLOON</h1>
                    </a>
                </div>
            </div>

            <div class="row mar-top-xl">
                <div class="row">
                    <div class="col l6 images">
                        <div class="row">
                            <div class="col l12">
                                <img src="{{$product->pictures[0]->url}}">
                            </div>
                        </div>
                        <div class="row">
                            @if (isset($product->pictures[0]))
                                <div class="col l4">
                                    <img src="{{$product->pictures[0]->url}}">
                                </div>
                            @endif
                            @if (isset($product->pictures[1]))
                                <div class="col l4">
                                    <img src="{{$product->pictures[1]->url}}">
                                </div>
                            @endif
                            @if (isset($product->pictures[2]))
                                <div class="col l4">
                                    <img src="{{$product->pictures[2]->url}}">
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col l6 info">
                        <div>
                            <p>K with some more breadcrumbs</p>

                            <h1>{{$product->name}}</h1>
                            <h2>€{{$product->price}}</h2>
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

            <div class="row specifications">
                <div class="col l12">
                    <h3>Specifications</h3>
                    <h4>Dimensions</h4>
                    <p class="mar-left-m">
                        @foreach ($product->sizes as $size)
                            {{$size->name}} - {{$size->length}} x {{$size->width}} x
                            @if ($size->height)
                                {{$size->height}}cm
                            @endif
                            </br>
                        @endforeach
                    </p>
                    <h4>Technical info</h4>
                    <p class="mar-left-m">
                        {{$product->technical_description}}
                    </p>
                </div>
            </div>

            <div class="row related-products">
                <h2>Related products</h2>
                <div class="row">
                    @foreach ($collections as $collection)
                        @foreach ($collection->products as $theProduct)
                            <div class="col l3">
                                <div class="card hoverable">
                                    <a href="{{url('product') . '/' . $theProduct->id}}">
                                        <div class="card-image">
                                            <img src="{{$theProduct->pictures[0]->url}}">
                                            <div class="colors">
                                                @foreach ($theProduct->colors as $color)
                                                <div class="color" style="background-color:#{{$color->hex_color}};">
                                                    
                                                </div>
                                                @endforeach
                                            </div>
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
                <h2>Frequently asked questions</h2>
                <ul class="collapsible" data-collapsible="accordion">
                    @foreach ($product->faqs as $faq)
                        <li class="hoverable">
                            <h3 class="collapsible-header">{{$faq->question}}</h3>
                            <p class="collapsible-body">{{$faq->awnser}}</p>
                        </li>
                    @endforeach
                </ul>
                <div class="right"><a href="{{url( 'faq' )}}">more questions?</a></div>
            </div>

            <div class="row newsletter">
                <div class="col l7">
                    <img src="{{url( 'img/patern.jpg' )}}">
                    <div class="image-content">
                        <h2 class="center">Discover amazing Kowloon deals!</h2>
                        <h3 class="center">Only in our newsletter</h3>
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
                                    <input type="submit" value="Ok">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

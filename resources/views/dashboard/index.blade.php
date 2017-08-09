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
    <nav>
        <div class="nav-wrapper">
            <ul class="left">
                <li><a href="{{ url('/admin/dashboard') }}">Dashboard</a></li>
                <li><a href="{{ url('/admin/dashboard/newproduct') }}">New Product</a></li>
                <li><a href="{{ url('/admin/dashboard/newcollection') }}">Collections</a></li>
                <li><a href="{{ url('/admin/dashboard/newfaq') }}">FAQs</a></li>
            </ul>
            <ul class="right hide-on-med-and-down">
                <li>
                    <a href="{{ url('/logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col l12">

                <!-- Display Validation Errors -->
                @include('common.errors')
                @include('common.success')
                
                <div class="row mar-top-xl">
                    <div class="col l8 offset-l2 center">
                        <h1>DASHBOARD</h1>
                    </div>
                </div>

                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <h1>HOT ITEMS</h1>
                            
                            <div class="row">
                                @foreach ($hotItems as $hotItem)
                                    <div class="col l3">

                                        <div class="card hoverable">
                                            <a href="product/{{$hotItem->product->id}}">
                                                <div class="card-image">
                                                    <img src="{{ url( $hotItem->product->pictures[0]->url ) }}">
                                                    <div class="colors">
                                                        @foreach ($hotItem->product->colors as $color)
                                                        <div class="color" style="background-color:#{{$color->hex_color}};">
                                                            
                                                        </div>
                                                        @endforeach
                                                    </div>
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

                            <div class="row">

                                <form  action="{{ url( '/admin/dashboard/hotitems' ) }}" method="POST">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <div class="input-field col l3">
                                        <select name="Spot1" class="icons">
                                            @foreach ($categories as $category)
                                                <optgroup label="{{$category->name}}">
                                                    @foreach ($category->products as $product)
                                                        <option value="{{$product->id}}" data-icon="{{ url( $product->pictures[0]->url ) }}" class="circle" {{($product->id == $hotItemsIdArray[0]) ? "selected" : ""}}>{{$product->name}}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                        <label>First spot</label>
                                    </div>
                                
                                    <div class="input-field col l3">
                                        <select name="Spot2" class="icons">
                                            @foreach ($categories as $category)
                                                <optgroup label="{{$category->name}}">
                                                    @foreach ($category->products as $product)
                                                        <option value="{{$product->id}}" data-icon="{{ url( $product->pictures[0]->url ) }}" class="circle" {{($product->id == $hotItemsIdArray[1]) ? "selected" : ""}}>{{$product->name}}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                        <label>Second spot</label>
                                    </div>
                                
                                    <div class="input-field col l3">
                                        <select name="Spot3" class="icons">
                                            @foreach ($categories as $category)
                                                <optgroup label="{{$category->name}}">
                                                    @foreach ($category->products as $product)
                                                        <option value="{{$product->id}}" data-icon="{{ url( $product->pictures[0]->url ) }}" class="circle" {{($product->id == $hotItemsIdArray[2]) ? "selected" : ""}}>{{$product->name}}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                        <label>Third spot</label>
                                    </div>

                                    <div class="input-field col l3">
                                        <select name="Spot4" class="icons">
                                            @foreach ($categories as $category)
                                                <optgroup label="{{$category->name}}">
                                                    @foreach ($category->products as $product)
                                                        <option value="{{$product->id}}" data-icon="{{ url( $product->pictures[0]->url ) }}" class="circle" {{($product->id == $hotItemsIdArray[3]) ? "selected" : ""}}>{{$product->name}}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                        <label>Fourth spot</label>
                                    </div>

                                    <div class="input-field col l12">
                                        <input type="submit" value="Change">
                                    </div>

                                </form>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <h1 class="col l6">Producten</h1>

                            <a href="{{ url('/admin/dashboard/newproduct') }}" class="btn col l2 push-l4">
                                Create New Product
                            </a>
                            
                            <div class="row">
                                @foreach ($products as $product)
                                    <div class="col l10">
                                        <a href="{{url('product') . '/' . $product->id}}"><div class="card horizontal hoverable">
                                            
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
                                    
                                    <div class="col l1">
                                        <a class="btn edit" href="{{ url('/admin/dashboard/editproduct/' ) . '/' . $product->id }}">
                                                Edit
                                        </a>
                                    </div>

                                    <div class="col l1">
                                        <a href="{{ url('/admin/dashboard/deleteproduct/' ) . '/' . $product->id }}"
                                                        onclick="event.preventDefault();
                                                                    document.getElementById('delete-form-{{$product->id}}').submit();"
                                                                    class="btn delete">
                                                Delete
                                        </a>
                                        <form id="delete-form-{{$product->id}}" action="{{ url('/admin/dashboard/deleteproduct/' ). '/' . $product->id }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                            {{$products->links()}}

                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection

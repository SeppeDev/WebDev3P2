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
                <li><a href="{{ url('/admin/dashboard/newcollection') }}">New Collection</a></li>
                <li><a href="{{ url('/admin/dashboard/newfaq') }}">New FAQ</a></li>
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
                        <h1>New Product</h1>
                    </div>
                </div>

                    <form action="{{ url( '/admin/dashboard/newproduct' ) }}" method="POST" enctype="multipart/form-data">
                    
                        <div class="card">
                            <div class="card-content">
                                <h3>Product</h3>

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                    <div class="input-field col l4">
                                        <select name="category" class="icons">
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}" >{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        <label>Category</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col l6">
                                        <input name="name" id="name" type="text" class="validate">
                                        <label for="name">Name</label>
                                    </div>

                                    <div class="input-field col l6">
                                        <input name="price" id="price" type="number" step="0.01" class="validate">
                                        <label for="price">Price</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col l12">
                                        <textarea name="description" id="description" class="materialize-textarea validate"></textarea>
                                        <label for="description">Description</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col l12">
                                        <textarea name="technical_description" id="technical_description" class="materialize-textarea validate"></textarea>
                                        <label for="technical_description">Technical description</label>
                                    </div>
                                </div>

                                <div class="file-field input-field">
                                    <p>You'll be able to upload more files afterwards.</p>
                                    <div class="btn">
                                        <span>File</span>
                                        <input type="file" name="image">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-content">
                                <h3>Size</h3>
                                <p>You'll be able to add more sizes afterwards.</p>

                                <div class="row">
                                    <div class="row">
                                        <div class="input-field col l6">
                                            <input placeholder="Medium" name="size_name" id="size_name" type="text" class="validate">
                                            <label for="size_name">Size name</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col l4">
                                            <input name="width" id="width" type="number" class="validate">
                                            <label for="width">Width</label>
                                        </div>

                                        <div class="input-field col l4">
                                            <input name="length" id="length" type="number" class="validate">
                                            <label for="length">Length</label>
                                        </div>

                                        <div class="input-field col l4">
                                            <input name="height" id="height" type="number" class="validate">
                                            <label for="height">Height</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-content">
                                <h3>Color</h3>
                                <p>You'll be able to add more colors afterwards.</p>

                                <div class="row">
                                    <div class="input-field col l6">
                                        <input name="color" id="color" type="text" class="validate">
                                        <label for="color">Color</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-content">
                                <h3>Collections</h3>

                                <div class="row">
                                    @foreach ($collections as $collection)
                                        <div class="input-field col l6">
                                            <input name="collections[{{$collection->id}}]" type="checkbox" id="collections{{$collection->id}}"/>
                                            <label for="collections{{$collection->id}}">{{$collection->name}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-content">
                                <h3>FAQS</h3>

                                <div class="row"> 
                                    @foreach ($faqs as $faq)
                                        <div class="input-field col l6">
                                            <input name="faqs[{{$faq->id}}]" type="checkbox" id="faqs{{$faq->id}}"/>
                                            <label for="faqs{{$faq->id}}">{{$faq->question}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="input-field col l12">
                            <input type="submit" value="Create">
                        </div>

                    </form>
                
            </div>
        </div>
    </div>
</div>
@endsection

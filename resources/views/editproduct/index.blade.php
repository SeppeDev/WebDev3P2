@extends('layouts.app')

@section('content')
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
                    <h1>Edit Product</h1>
                </div>
            </div>
                
                    <div class="card">
                        <div class="card-content">
                            <form action="{{ url( '/admin/dashboard/editproduct' ) . '/' . $product->id }}" method="POST">
                                <h3>Product</h3>

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="row">
                                    <div class="input-field col l4">
                                        <select name="category" class="icons">
                                            @foreach ($categories as $category)
                                                <option value="{{$category->id}}" {{($product->category_id == $category->id) ? "selected" : ""}}>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        <label>Category</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col l6">
                                        <input value="{{$product->name}}" name="name" id="name" type="text" class="validate">
                                        <label for="name">Name</label>
                                    </div>

                                    <div class="input-field col l6">
                                        <input value="{{$product->price}}" name="price" id="price" type="number" step="0.01" class="validate">
                                        <label for="price">Price</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col l12">
                                        <textarea name="description" id="description" class="materialize-textarea validate">{{$product->description}}</textarea>
                                        <label for="description">Description</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col l12">
                                        <textarea name="technical_description" id="technical_description" class="materialize-textarea validate">{{$product->technical_description}}</textarea>
                                        <label for="technical_description">Technical description</label>
                                    </div>
                                </div>

                                <div class="input-field col l12">
                                    <input type="submit" value="Create">
                                </div>

                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-content">
                            <form action="{{ url( '/admin/dashboard/newimage' ) . '/' . $product->id }}" method="POST" enctype="multipart/form-data">
                                <h3>Image</h3>

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="file-field input-field">
                                    <div class="btn">
                                        <span>File</span>
                                        <input type="file" name="image">
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>

                                <div class="input-field col l12">
                                    <input type="submit" value="Create">
                                </div>

                            </form>
                            <div class="row">
                                @foreach ($product->pictures as $key=>$picture)
                                    <div class="col l11">{{$picture->url}}</div>
                                    <div class="col l11 {{(count($product->pictures) == 1) ? '' : 'hidden'}}">You at least need one picture. If you don't like this one, first create a new one.</div>

                                    <div class="col l6">
                                        <a href="{{ url('/admin/dashboard/deleteimage/' ) . '/' . $picture->id }} "
                                                        onclick="event.preventDefault();
                                                                    document.getElementById('delete-form-{{$picture->id}}').submit();"
                                                                    class="btn delete {{(count($product->pictures) == 1) ? 'hidden' : ''}}">
                                            Delete
                                        </a>
                                        <form id="delete-form-{{$picture->id}}" action="{{ url('/admin/dashboard/deleteimage/' ). '/' . $picture->id }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-content">
                            <form action="{{ url( '/admin/dashboard/newsize' ) . '/' . $product->id }}" method="POST">
                                <h3>Size</h3>

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
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

                                <div class="input-field col l12">
                                    <input type="submit" value="Create">
                                </div>

                            </form>
                            <div class="row">
                                @foreach ($product->sizes as $key=>$size)
                                    <div class="col l11">{{$size->name}}: cm {{$size->width}} x {{$size->length}} x {{$size->height}}</div>
                                    <div class="col l11 {{(count($product->sizes) == 1) ? '' : 'hidden'}}">You at least need one Size. If you don't like this one, first create a new one.</div>

                                    <div class="col l1">
                                        <a href="{{ url('/admin/dashboard/deletesize/' ) . '/' . $size->id }} "
                                                        onclick="event.preventDefault();
                                                                    document.getElementById('delete-form-{{$size->id}}').submit();"
                                                                    class="btn delete {{(count($product->sizes) == 1) ? 'hidden' : ''}}">
                                            Delete
                                        </a>
                                        <form id="delete-form-{{$size->id}}" action="{{ url('/admin/dashboard/deletesize/' ). '/' . $size->id }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-content">
                            <form action="{{ url( '/admin/dashboard/newcolor' ) . '/' . $product->id }}" method="POST">
                                <h3>Color</h3>

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="row">
                                    <div class="input-field col l6">
                                        <input name="color" id="color" type="text" class="validate">
                                        <label for="color">Color</label>
                                    </div>
                                </div>

                                <div class="input-field col l12">
                                    <input type="submit" value="Create">
                                </div>

                            </form>
                            <div class="row">
                                @foreach ($product->colors as $key=>$color)
                                    <div class="col l11"><div class="color" style="background-color:#{{$color->hex_color}};">{{$color->hex_color}}</div></div>
                                    <div class="col l11 {{(count($product->colors) == 1) ? '' : 'hidden'}}">You at least need one color. If you don't like this one, first create a new one.</div>

                                    <div class="col l1">
                                        <a href="{{ url('/admin/dashboard/deletecolor/' ) . '/' . $color->id }} "
                                                        onclick="event.preventDefault();
                                                                    document.getElementById('delete-form-{{$color->id}}').submit();"
                                                                    class="btn delete {{(count($product->colors) == 1) ? 'hidden' : ''}}">
                                            Delete
                                        </a>
                                        <form id="delete-form-{{$color->id}}" action="{{ url('/admin/dashboard/deletecolor/' ). '/' . $color->id }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                    </div>
                                @endforeach
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
            
        </div>
    </div>
</div>
@endsection

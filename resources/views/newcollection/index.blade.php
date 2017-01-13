@extends('layouts.app')

@section('content')
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
                    <h1>Collection</h1>
                </div>
            </div>

                <form action="{{ url( '/admin/dashboard/newcollection' ) }}" method="POST" enctype="multipart/form-data">
                
                    <div class="card">
                        <div class="card-content">
                            <h3>New Collection</h3>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="row">
                                <div class="input-field col l6">
                                    <input name="name" id="name" type="text" class="validate">
                                    <label for="name">Name</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col l12">
                                    <input type="submit" value="Create">
                                </div>
                            </div>
                        </div>
                    </div>

                </form>

                <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <h2 class="col l6">Collections</h2>
                            
                            <div class="row">
                                @foreach ($collections as $collection)
                                    <div class="col l10">
                                        <div class="card horizontal hoverable">
                                            
                                            <div class="card-content col l12">
                                                <div class="row">
                                                    <h3>{{$collection->name}}</h3>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="col l1">
                                        <a href="{{ url('/admin/dashboard/editcollection/' ) . '/' . $collection->id }}">
                                                Edit
                                        </a>
                                    </div>

                                    <div class="col l1">
                                        <a href="{{ url('/admin/dashboard/deletecollection/' ) . '/' . $collection->id }}"
                                                        onclick="event.preventDefault();
                                                                    document.getElementById('delete-form-{{$collection->id}}').submit();">
                                            <div class="card horizontal hoverable">
                                            
                                                Delete
                                                
                                            </div>
                                        </a>
                                        <form id="delete-form-{{$collection->id}}" action="{{ url('/admin/dashboard/deletecollection/' ). '/' . $collection->id }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                            {{$collections->links()}}

                        </div>
                    </div>
                </div>
            
        </div>
    </div>
</div>
@endsection

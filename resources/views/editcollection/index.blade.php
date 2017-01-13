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
                    <h1>Edit Collection</h1>
                </div>
            </div>

                <form action="{{ url( '/admin/dashboard/editcollection' ) . '/' . $collection->id }}" method="POST">
                
                    <div class="card">
                        <div class="card-content">
                            <h3>Collection</h3>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="row">
                                <div class="input-field col l6">
                                    <input value="{{$collection->name}}" name="name" id="name" type="text" class="validate">
                                    <label for="name">Name</label>
                                </div>
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
@endsection

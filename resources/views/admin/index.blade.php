@extends('layouts.app')

@section('content')
<div class="carousel carousel-slider" data-indicators="true">
    
    <a class="carousel-item" href="#"><img src="img/Cat.jpg"></a>
    <a class="carousel-item" href="#"><img src="img/Parrot.jpg"></a>
    <a class="carousel-item" href="#"><img src="img/Luka.jpg"></a>
</div>

<div class="container">
    <div class="row">
        <div class="col l12">

            <!-- Display Validation Errors -->
            @include('common.errors')
            @include('common.success')

            <div class="row">
                @if (Auth::guest())

                    <div class="row">
                        <div class="row mar-top-xl">
                            <div class="col l8 offset-l2 center">Welcome mister or miss Admin of Kowloon! You've found the secret url path here, I'm proud</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col l3 push-l6">
                            <a href="{{ url('/login') }}">Login</a>
                        </div>
                    </div>

                @else

                    <div class="row">
                        <div class="row mar-top-xl">
                            <div class="col l8 offset-l2 center">Welcome {{ Auth::user()->name }}</div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col l3 push-l3 center">
                            <a href="{{ url('/admin/dashboard') }}">
                                Dashboard
                            </a>
                        </div>

                        <div class="col l3 push-l3 center">
                            <a href="{{ url('/logout') }}"
                                onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                @endif
            </div>
            
        </div>
    </div>
</div>
@endsection

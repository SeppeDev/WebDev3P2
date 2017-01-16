@extends('layouts.app')

@section('content')
<a class="logo" href="{{ url( App::getLocale() . '/' ) }}"><img src="{{ url( 'img/Logo.png' ) }}"></a>

<div class="image">
    <img src="{{ url( 'img/Girl.jpg' ) }}">
</div>

<div id="about">
    <div class="container">
        <div class="row">
            <div class="col l12">

                <!-- Display Validation Errors -->
                @include('common.errors')
                @include('common.success')
                
                <div class="row mar-top-xl">
                    <div class="col l12">
                        <a href="{{ url( App::getLocale() . '/' ) }}" class="breadcrumb">K</a>
                        <a href="{{ url( App::getLocale() . '/about' ) }}" class="breadcrumb">About</a>
                    </div>
                </div>

                <div class="row">
                    <h1>About us</h1>
                    <div class="col l8">
                        <h2>Kowloon</h2>
                        <p>
                            Pet Concept, active since 1998, is developing, importing and exporting products for pets worldwide.
                        </p>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                        </p>
                    </div>

                    <div class="col l3 push-l1">
                        <h2>Contact</h2>
                        <ul>
                            <li>Deckx Johan</li>
                            <li>Bosdreef 7</li>
                            <li>2200 Herentals</li>
                        </ul>
                    </div>
                </div>

                <div class="row mar-top-xl">
                    <h2>Leave us a message</h2>
                    <form action="{{ url( App::getLocale() . '/message' ) }}" method="POST" class="col s12">
                        <div class="row">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="input-field col s6">
                                <input name="email" id="email" type="email" class="validate">
                                <label for="email">Email</label>
                            </div>
                            <div class="input-field col l9">
                                <textarea name="content" id="content" class="materialize-textarea"></textarea>
                                <label for="content">Textarea</label>
                            </div>
                            <div class="input-field col s4">
                                <input type="submit" value="Send">
                            </div>
                        </div>
                    </form>
                </div>

                <div class="row mar-top-xl">
                    <h2>Frequently asked questions</h2>
                    <ul class="collapsible" data-collapsible="expandable">
                        @foreach ($faqs as $faq)
                            <li class=" active hoverable">
                                <h3 class="collapsible-header">{{$faq->question}}</h3>
                                <p class="collapsible-body">{{$faq->awnser}}</p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

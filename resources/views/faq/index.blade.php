@extends('layouts.app')

@section('content')
<div id="faq">
    <div class="container">
        <div class="row">
            <div class="col l12">

                <!-- Display Validation Errors -->
                @include('common.errors')
                @include('common.success')
                
                <div class="row">
                    <div class="right">
                        <a class="exit" href="{{url( '/' )}}">
                            <i class="fa fa-times" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>

                <div class="row mar-top-xl">
                    <h1>Fraquently asked questions</h1>
                </div>

                <div class="row mar-top-xl">
                    <form action="{{ url( 'faq/search' ) }}" method="POST" class="col s12">
                        <div class="row">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="input-field col s12">
                                <input name ="search" id="search" type="text" value="{{$search}}">
                                <label for="search"><i class="fa fa-search" aria-hidden="true"></i> Search on keyword <i class="fa fa-arrow-left" aria-hidden="true"></i></label>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="row">
                    <p>
                        Don't find what you're looking for?
                            </br>
                        You can always contact our <a href="{{url( '/about' )}}">customer service</a>. We're happy to help you!
                    </p>
                </div>

                <div class="row">
                    <ul class="collapsible" data-collapsible="expandable">
                        @foreach ($faqs as $faq)
                            <li class=" active hoverable">
                                <h3 class="collapsible-header">{{$faq->question}}</h3>
                                <p class="collapsible-body">{{$faq->awnser}}</p>
                            </li>
                        @endforeach
                    </ul>
                    {{$faqs->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

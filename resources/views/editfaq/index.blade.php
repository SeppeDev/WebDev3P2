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
                    <h1>Edit FAQ</h1>
                </div>
            </div>

                <form action="{{ url( '/admin/dashboard/newfaq' ) }}" method="POST" enctype="multipart/form-data">
                
                    <div class="card">
                        <div class="card-content">
                            <h3>FAQ</h3>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="input-field col l4">
                                    <select name="category" class="icons">
                                        <option value="NULL" >None</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}" {{($faq->id == $category->id) ? "selected" : ""}}>{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    <label>Category</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col l6">
                                    <input value="{{$faq->question}}" name="question" id="question" type="text" class="validate">
                                    <label for="question">Question</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col l12">
                                    <textarea name="answer" id="answer" class="materialize-textarea validate">{{$faq->awnser}}</textarea>
                                    <label for="answer">Answer</label>
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

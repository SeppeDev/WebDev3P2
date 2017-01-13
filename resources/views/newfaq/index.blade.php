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
                    <h1>FAQ</h1>
                </div>
            </div>

                <form action="{{ url( '/admin/dashboard/newfaq' ) }}" method="POST" enctype="multipart/form-data">
                
                    <div class="card">
                        <div class="card-content">
                            <h3>New FAQ</h3>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="input-field col l4">
                                    <select name="category" class="icons">
                                        <option value="NULL" >None</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}" >{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                    <label>Category</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col l6">
                                    <input name="question" id="question" type="text" class="validate">
                                    <label for="question">Question</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="input-field col l12">
                                    <textarea name="answer" id="answer" class="materialize-textarea validate"></textarea>
                                    <label for="answer">Answer</label>
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
                            <h2 class="col l6">FAQS</h2>
                            
                            <div class="row">
                                @foreach ($faqs as $faq)
                                    <div class="col l10">
                                        <div class="card horizontal hoverable">
                                            
                                            <div class="card-content col l12">
                                                <div class="row">
                                                    <h3>{{$faq->question}}</h3>
                                                </div>
                                                <div class="row">
                                                    <p>{{$faq->awnser}}</p>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="col l1">
                                        <a href="{{ url('/admin/dashboard/editfaq/' ) . '/' . $faq->id }}">
                                                Edit
                                        </a>
                                    </div>

                                    <div class="col l1">
                                        <a href="{{ url('/admin/dashboard/deletefaq/' ) . '/' . $faq->id }}"
                                                        onclick="event.preventDefault();
                                                                    document.getElementById('delete-form-{{$faq->id}}').submit();">
                                            <div class="card horizontal hoverable">
                                            
                                                Delete
                                                
                                            </div>
                                        </a>
                                        <form id="delete-form-{{$faq->id}}" action="{{ url('/admin/dashboard/deletefaq/' ). '/' . $faq->id }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                            {{$faqs->links()}}

                        </div>
                    </div>
                </div>
            
        </div>
    </div>
</div>
@endsection

@extends('layout')
@section('content')
<div id="wrapper">
    <div id="page" class="container">
        <div id="content" class="setwidth">
            <div class="title">
                <span>
                 <a href="{{ url('add-tags')}}" class="setbtn">Add Tags</a>
                 </span>
                 <span>
                 <a href="{{ url('add-post')}}" class="setbtn">Add Post</a>
                 </span>
                <span>
                <a href="{{ url('show-post')}}" class="setbtn">show Post</a>
                </span>
                <h2>Welcome to Your Dashboard of admin/editor</h2>
                <span class="byline">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                Welcome You are logged in!
                </span> 
            </div>
        </div>
    </div>
</div>
@endsection

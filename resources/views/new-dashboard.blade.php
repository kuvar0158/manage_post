@extends('rlayout')
@section('content')
<div id="wrapper">
    <div id="page" class="container">
        <div id="content" class="setwidth">
            <div class="title">
                 <span>
                <a href="{{ url('show-all-post')}}" class="setbtn">Show all Post</a>
                </span>
                <h2>Welcome to Dashboard of Reader</h2>
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

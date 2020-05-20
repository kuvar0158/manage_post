@extends('layout')
@section('banner-header')
<div id="header-featured">
		<div id="banner-wrapper">
			<div id="banner" class="container">
				<h2>Laravel Layouts</h2>
				<a href="#" class="button">Task Article</a> </div>
		</div>
	</div>
@endsection
@section('content')
<div id="wrapper">
	<div id="page" class="container">
		<div id="content" class="setwidth">
			<div class="title">
				<h2>Welcome to Laravel Layouts</h2>
				 </div>
			    <span>
				<a href="{{ url('show-all-post')}}" class="setbtn">Show all Post</a>
			    </span>
			     <!-- <span>
				<a href="{{ url('show-tasktag-list')}}" class="setbtn">show Task & tag list</a>
			    </span -->
			 <ul class="style1">
				@if(!empty($task))
				@foreach($task as $val)
				<li class="first">
					<h3 class="setsizes">{{$val->title}}</h3>
					<p><a href="{{url('full-descrption', [$val->id])}}">{{$val->short_desc}}</a></p><br>
					<p><a href=" {{ url('show-all-tags', [$val->id])}} ">Show Tags</a></p>
				</li>
				@endforeach
				@endif
			</ul>
		</div>
		<div id="sidebar">
			  
		</div>
	</div>
</div>
@endsection


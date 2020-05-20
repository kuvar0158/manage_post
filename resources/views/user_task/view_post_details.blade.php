@extends('layout')
<style>
	span.set-data {
		color: red;
		font-size: 18px
	}
	p.set-detail {
		font-size: 20px;
        /*padding: 0 12px; */
	}
</style>
@section('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content" class="setwidth">
			<div class="title">
				<h2>Post Details page</h2>
			</div>
				<p class="set-detail"><span class="set-data">Title: </span>{{$edit_post[0]->title}}</p>
				<p class="set-detail"><span class="set-data">Description: </span>{{$edit_post[0]->long_desc}}</p>
				<div>
				<img id="blah" src="{{url('public/images')}}/{{$edit_post[0]->featured_image}}" alt="your image" width="100%" height="50%" />
				  </div>
		</div>
		<div id="sidebar">
			<ul class="style1">
				<li class="first">
				</li>
			</ul>
		</div>
	</div>
</div>
@endsection
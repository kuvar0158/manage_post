@extends('layout')
@section('banner-header')
<div id="header-featured">
		<div id="banner-wrapper">
			<div id="banner" class="container">
				<h2>Laravel Layouts</h2>
				<a href="#" class="button">Etiam posuere</a> </div>
		</div>
	</div>
@endsection
@section('content')
<div id="wrapper">
	<div id="page" class="container">
		<div id="content" class="setwidth">
			<div class="title">
				<h2>Welcome to our Full Description	</h2>
				 </div>
			   @if(!empty($full_desc))
				  <p>{{$full_desc[0]->long_desc}}</p>
				@endif
		</div>
		<div id="sidebar">
			<ul class="style1">
			</ul>
			<div id="stwo-col">
			</div>
		</div>
	</div>
</div>
@endsection


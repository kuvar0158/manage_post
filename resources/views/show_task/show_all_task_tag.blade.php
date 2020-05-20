@extends('layout')
@section('content')
<div id="wrapper">
	<div id="page" class="container">
		<div id="content" class="setwidth">
			<div class="title">
			   <h2>Show all Task of tag</h2>
			</div>
		      @if($get_task_name)
		      <ul class="show_list_icon">
              @foreach($get_task_name as $val)
              <li>{{$val->short_desc}}</li>
              <br>
              @endforeach
              </ul>
              @else
                <h4>No Task Found</h4>
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


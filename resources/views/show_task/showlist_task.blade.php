@extends('layout')
@section('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content" class="setwidth">
			@if ($message = Session::get('success'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>	
			        <strong>{{ $message }}</strong>
			</div>
			@endif
			<div class="title">
				<h2>List of our Task</h2>
				</div>
				<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">S.no</th>
				      <th scope="col">Title</th>
				      <th scope="col">Long Description</th>
				      <th scope="col">Feature Image</th>
				      <th>Action</th>
				      <th>Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	 @if(!empty($post))
				     @php
				     $no = 1;
				  	 @endphp
				     @foreach($post as $val)
				    <tr>
				      <td>{{$no++}}</td>
				      <td>{{$val->title}}</td>
				      <td>{{$val->long_desc}}</td>
				      <td><img src="{{url('public/images')}}/{{$val->featured_image}}" width="100" height="100" /></td>
				      <td> <a href="{{url('edit-post', [$val->id])}}">Edit</a></td>
                      <td>
                      <form action="{{url('delete-post', [$val->id])}}" method="POST">
				      @csrf
					  @method('delete')
					  <button type="submit" class="btn btn-outline-danger">Delete</button>
					  </form></td>
				    </tr>
				     @endforeach
					 @endif
				  </tbody>
				</table>
				{{$post->links()}}
		   </div>
		<div id="sidebar">
			
       	</div>
	</div>
</div>
@endsection
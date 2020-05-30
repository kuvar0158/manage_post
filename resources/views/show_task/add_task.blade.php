@extends('layout')
@section('content')
<!-- this is the identify the voice in dynmic ways -->
  <script src='https://code.responsivevoice.org/responsivevoice.js'></script>
<div id="wrapper">
	<div id="page" class="container">
		<div id="content" class="setwidth">
			@if ($message = Session::get('success'))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>	
			        <strong>{{ $message }}</strong>
			        <script type="text/javascript">
			        	 responsiveVoice.speak('You are save Successfully data');
			        </script>
			</div>
			@endif
			<div class="title">
				<h2>Add Post</h2>
				 </div>
				 <form action="{{ url('save-task')}}" method="POST" enctype="multipart/form-data">
					@csrf
					  Title:<br><br>
					  <input class="form-inputs @error('title') ? is-danger @enderror" type="text" name="title" id="title">
                      @error('title')
					  <p class="help is-danger">{{$errors->first('title')}}</p>
					  @enderror
					  <br><br>
					  Description:<br><br>
					  <textarea name="long_desc" id="long_desc" class="@error('long_desc') ? is-danger @enderror" rows="7" cols="50" placeholder="write desc.."></textarea>
					  @error('long_desc')
					  <p class="help is-danger">{{$errors->first('long_desc')}}</p>
					  @enderror
					  <br>
					  Select Tags:<br><br>
					  <select name="tags[]" class="" multiple="">
                      <!-- <option value="">select tags</option> -->
                      @if(!empty($tag))
                      @foreach($tag as $val)
                      <option value="{{$val->id}}">{{$val->tag_name}}</option>
                      @endforeach
                      @endif
                      </select>
                       @error('tags')
					  <p class="help is-danger">{{$errors->first('tags')}}</p>
					  @enderror
					  <br><br>
					  Feature images<br><br>
					  <input type="file" name="featured_image" id="featured_image">
					  @error('featured_image')
					  <p class="help is-danger">{{$errors->first('featured_image')}}</p>
					  @enderror
					  <br><br>
					  <input type="submit" class="setbtn" value="Submit">
				   </form>
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
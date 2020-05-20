@extends('layout')
@section('content')

<div id="wrapper">
	<div id="page" class="container">
		<div id="content" class="setwidth">
			<div class="title">
				<h2>Update Task List</h2>
				</div>
                 <form action="{{ url('update-post', [$edit_post[0]->id])}}" method="POST" enctype="multipart/form-data">
					@csrf
					<input name="_method" type="hidden" value="PUT">
					  Title:<br>
					  <input class="form-inputs @error('title') ? is-danger @enderror" type="text" id="title" name="title" value="{{$edit_post[0]->title}}">
					  @error('title')
					  <p class="help is-danger">{{$errors->first('title')}}</p>
					  @enderror
					  <br><br>
					  Description:<br><br>
					  <textarea name="long_desc" id="long_desc" class="@error('long_desc') ? is-danger @enderror"  rows="10" cols="50" placeholder="write long desc..">{{$edit_post[0]->long_desc}}</textarea>
					  @error('long_desc')
					  <p class="help is-danger">{{$errors->first('long_desc')}}</p>
					  @enderror
					  <br><br>
					  Feature Images:<br><br>
					  <input type="file" name="featured_image" id="featured_image"  value="{{$edit_post[0]->featured_image}}" onchange="readURL(this);">
					  <img id="blah" src="{{url('public/images')}}/{{$edit_post[0]->featured_image}}" alt="your image" width="100px" height="100px" />
					  @error('featured_image')
					  <p class="help is-danger">{{$errors->first('featured_image')}}</p>
					  @enderror
					  <br>
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
<script type="text/javascript">
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
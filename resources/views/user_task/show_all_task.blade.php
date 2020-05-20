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
				<h2>List of our Post</h2>
				<select name="tags" id="tags" onchange="selectTags()" class="form-control" style="margin-top: 20px;">
				  <option value="">Select tags</option>
				  @if(!empty($tag))
                  @foreach($tag as $val)
                  <option value="{{$val->id}}">{{$val->tag_name}}</option>
                  @endforeach
                  @endif
				</select>

				</div>
				<!-- <button class="btn btn-info">yty</button> -->
				<table class="table table-hover" id="table">
				  <thead>
				    <tr>
				      <th scope="col">S.no</th>
				      <th scope="col">Title</th>
				      <th scope="col">Long Description</th>
				      <th scope="col">Feature Image</th>
				      <th>Action</th>
				    </tr>
				  </thead>
				  <tbody id="tbody-set">
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
				      <td> <a href="{{url('view-post', [$val->slug])}}">View</a></td>
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
<script>
function selectTags(){
    var tags = $('#tags').val();    
    // alert(tags);
    $.ajax({
        url: '{{url("show-data-tags")}}',
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        dataType: 'JSON',
        data: {tags: tags},
        success: function (res) {
         console.log(res);
         // console.log(res.data.length);
         // alert(res.data[1]['title']);
         let length = res.data.length;
            if (res.data.length > 0) {
                // $('#tbody-set').html('');
                // let html = null;
            	for(let i=0; i<length; i++){
                    // alert(res.data[i]['title']);
         //             html = html+
							  //  ` 
								 // <tr>
								 //   <td>${SNo++}</td>
								 //   <td>${res.data[i]['title']}</td> 
								 //   <td>${res.data[i]['long_desc']}</td>
								 //   <td>${res.data[i]['featured_image']}</td>
								 //   <td>${res.data[i]['slug']}view</td>
								 // </tr>
							  //  `;
            	}
            	// $('#tbody-set').html(html);
            } else {
            	$('#tbody-set').show();
                   // alert(res.msg);
            }
        },
    })
}
</script>
@endsection
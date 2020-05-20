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
            <h3> Add Tags</h3>   
            <form action="{{ url('save-tags')}}" method="POST">
              @csrf
              Tag Name:<br><br>
              <input class="form-inputs @error('name') ? is-danger @enderror" type="text" name="name" id="name">
              @error('name')
              <p class="help is-danger">{{$errors->first('name')}}</p>
              @enderror
              <br><br>
              <input type="submit" class="setbtn" value="Submit">
            </form>
          </div>
        </div>
    </div>
</div>
@endsection

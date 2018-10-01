@extends('screens.manage.master')

@section('title')
Add Content
@endsection

@section('content')
<div class="col-sm-14">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1 class="panel-title">Add Content</h1>
    </div>
    
    <div class="panel-body">
      <form method="POST" action="/content/create" enctype="multipart/form-data">
          {{ csrf_field() }}

        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Name of Content">
        </div>

        <div class="form-group">
          <label for="description">Description:</label>
          <input type="text" class="form-control" id="description" name="description" placeholder="Description (Resolution? etc)">
        </div>

        <div class="form-group">
          <label for="content_url">Image Upload</label>
          <input type="file" id="content_url" name="content_url">
<!--          <p class="help-block">Saves Content URL to database and Saves image in storage</p> -->
        </div>

@include('screens.manage.content.partials.datetimepicker-add')

      <div class="form-group">
          {!! Form::label('Display Content on Screens') !!}
          {!! Form::select('screens[]', $screens, null, ['class' => 'form-control', 'multiple' => 'multiple']) !!}
      </div>

      <div class="form-group">
         <button type="submit" class="btn btn-primary">Add Content</button>        
      </div>

      @include('screens.errors')

      </form>
    </div>
  </div>
</div>
@endsection
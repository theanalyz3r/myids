@extends('screens.manage.master')

@section('title')
Edit Content Information
@endsection

@section('content')
<div class="col-sm-14">
  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="panel-title">

        <h2>Edit Content Information</h2>      
        <h4>Here you can modify a piece of Content</h4>
        
      </div>
    </div>

    <div class="panel-body">
      <form method="POST" action="/content/{{ $content->id }}" enctype="multipart/form-data">
          {{ method_field('PATCH') }}
          {{ csrf_field() }}

        @include('screens.errors')

        <img name="Image" src="/storage/{{ $content->content_url }}" width="150" alt="{{ $content->name }}" class="thumbnail">
        
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $content->name }}" placeholder="Name of Content">
        </div>

        <div class="form-group">
          <label for="description">Description:</label>
          <input type="text" class="form-control" id="description" name="description" value="{{ old('description') ?? $content->description }}" placeholder="Description (Resolution? etc)">
        </div>

@include('screens.manage.content.partials.datetimepicker-edit')

      <div class="form-group">
          {!! Form::label('Display Content on Screens') !!}
            <p class="help-block">Please select which displays you wish this item to display on, you must also select the current display. (Hold 'CTRL'/'CMD' and click to select multiple items)</p>
          {!! Form::select('screens[]', $screens, $content->screens->pluck('id')->toArray(), ['class' => 'form-control', 'multiple' => 'multiple', 'id' => 'screens']) !!}
      </div>

      <div class="form-group">
         <button type="submit" class="btn btn-primary">Update Content</button>        
      </div>



      </form>
    </div>
  </div>
</div>
@endsection
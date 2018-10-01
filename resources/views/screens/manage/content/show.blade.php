@extends('screens.manage.master')

@section('title')
Preview Content
@endsection

@section('content')
<div class="col-sm-14">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1 class="panel-title"><b>Preview Content</b> - {{ $content->name }}</h1>
      <h2 class="panel-title"><b>Description:</b> {{ $content->description }}</h2>
      <br>
      <h2 class="panel-title"><b>Starts On:</b> {{ $content->starts_on->format('l jS F Y h:i A') }}</h2>
      <h2 class="panel-title"><b>Expires On:</b> {{ $content->expires_on->format('l jS F Y h:i A') }}</h2>
    </div>

    <div class="panel-body">
      <img src="/storage/{{ $content->content_url }}" class="img-responsive" alt="{{ $content->name }}">
    </div>

  </div>
</div>
@endsection
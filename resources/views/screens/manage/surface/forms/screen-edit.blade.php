@extends('screens.manage.master')

@section('title')
Edit Screen
@endsection

@section('content')
<div class="col-sm-14">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1 class="panel-title">Edit a Screen</h1>
      <form method="POST" action="/screens/{{ $screen->id }}/pushactive">
        {{ method_field('POST') }}
        {{ csrf_field() }}
        <div class="form-group">
          <button type="submit" class="btn btn-success">Push Active Contents Now</button>
        </div>
      </form>
      <form method="POST" action="/screens/{{ $screen->id }}/pushfooter">
        {{ method_field('POST') }}
        {{ csrf_field() }}
        <div class="form-group">
          <label for="footer-message">Message:</label>
          <input type="text" class="form-control" id="footer-message" name="footer-message" value="{{ old('footer-message') ?? $screen->footer_message }}" placeholder="Message for bottom of screen">
          <button type="submit" class="btn btn-success">Push Footer Message Now</button>
        </div>
      </form>
    </div>
    <div class="panel-body">
      <form method="POST" action="/screens/{{ $screen->id }}">
          {{ method_field('PATCH') }}
          {{ csrf_field() }}

          <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $screen->name }}" placeholder="Name of Screen">
          </div>

          <div class="form-group">
            <label for="description">Description:</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ old('description') ?? $screen->description }}" placeholder="Description (Projector/TV/LED wall etc.)">
          </div>

          <div class="form-group">
            <label for="systemref">System Ref No.:</label>
            <input type="text" class="form-control" id="systemref" name="systemref" value="{{ old('systemref') ?? $screen->systemref }}" placeholder="7/8 Digit System Serial Number (No Unusual Characters)">
          </div>

          <div class="form-group">
              <label for="ip">IP Address of Display:</label>
              <input type="text" class="form-control" id="ip" name="ip" value="{{ old('ip') ?? $screen->ip }}" placeholder="Set the IP address of the Screen here, EXACTLY as is looks">
          </div>

          <div class="form-group">
            <label for="location">Location:</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ old('location') ?? $screen->location }}" placeholder="Where on site screen is located.(Entrance Way/Foyer etc.)">
          </div>

          <div class="form-group">
            <label for="footer_message">Footer Message: (Optional)</label>
            <input type="text" class="form-control" id="footer_message" name="footer_message" value="{{ old('footer_message') ?? $screen->footer_message }}" placeholder="Will be displayed on the Base of the screen">
          </div>

          <div class="form-group">
            <label for="default_content_select">Select default image for display</label>
              <select multiple class="form-control" id="default_content_select" name="default_content_select">
                @foreach($contents as $content)
                  <option value="{{ $content->id }}">{{ $content->name }}</option>
              @endforeach
            </select>
          </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update Screen Settings</button>        
         </div>
        @include('screens.errors')

        </form>
    </div>
  </div>
</div>
@endsection
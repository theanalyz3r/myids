@extends('screens.manage.master')

@section('title')
Create Screen
@endsection

@section('content')
<div class="col-sm-14">
  <div class="panel panel-default">
    <div class="panel-heading">
      <h1 class="panel-title">Create A Screen</h1>
    </div>
    <div class="panel-body">
      <form method="POST" action="/screens">
          {{ csrf_field() }}

        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Name of Screen">
        </div>

        <div class="form-group">
          <label for="description">Description:</label>
          <input type="text" class="form-control" id="description" name="description" placeholder="Description (Projector/TV/LED wall etc.)">
        </div>

        <div class="form-group">
          <label for="systemref">System Ref No.:</label>
          <input type="text" class="form-control" id="systemref" name="systemref" placeholder="7/8 Digit System Serial Number (No Unusual Characters)">
        </div>

        <div class="form-group">
            <label for="ip">IP Address of Display: (Optional)</label>
            <input type="text" class="form-control" id="ip" name="ip" placeholder="Set the IP address of the Screen here, EXACTLY as is looks">
        </div>

        <div class="form-group">
          <label for="location">Location:</label>
          <input type="text" class="form-control" id="location" name="location" placeholder="Where on site screen is located.(Review/Terrace etc.)">
        </div>

        <div class="form-group">
          <label for="footer_message">Footer Message: (Optional)</label>
          <input type="text" class="form-control" id="footer_message" name="footer_message" placeholder="Will be displayed on the Base of the screen">
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
         <button type="submit" class="btn btn-primary">Create Screen</button>        
      </div>

      @include('screens.errors')

      </form>
    </div>
  </div>
</div>
@endsection
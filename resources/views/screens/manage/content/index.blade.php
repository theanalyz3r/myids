@extends('screens.manage.master')

@section('title')
Manager Home
@endsection

<!-- Home Content Below -->

@section('content')
  <div class="col-sm-12">
    <div class="panel panel-success ">
      <div class="panel-heading">
        <h3 class="panel-title">
          <span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span>
          Currently In-Date Content
        </h3>
      </div>
<!-- Table -->
        <table class="table">
          <thead>
            <tr>
              <th>ID</th>
              <th>Preview</th>
              <th>Name of Content</th>
              <th>Currently Displayed On</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
<!-- Current CONTENT INDEX ITEM -->
            @foreach($currContents as $content)
            
        			<tr is="content-item" :attributes="{{ $content }}">	</tr>
         
        		@endforeach
          </tbody>
        </table>
    </div>
{{-- EXPIRED TABLE BEGINS --}}
<div class="panel panel-danger ">
  <div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span> Expired Content </h3></div>
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Preview</th>
          <th>Name of Content</th>
          <th>Currently Displayed On</th>
          <th class="text-center">Action</th>
        </tr>
      </thead>
      <tbody>
<!-- Expired Content Item -->
        @foreach($expContents as $content)
            
          <tr is="content-item" :attributes="{{ $content }}">	</tr>

        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
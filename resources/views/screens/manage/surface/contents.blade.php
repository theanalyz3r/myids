@extends('layouts.app')

@section('page-header')
    <div class="page-header flex">
        <div class="font-bold">
            {{ $screen->name }}
        </div>
    </div>
@endsection

@section('section-1')
	<div class="section">
		<div class="section-header flex justify-between">
			<div class="section-header-left flex text-white font-light items-baseline leading-none">
				<div class="text-2xl font-light">
					Media on this display
				</div>
			</div>
		</div>

		<div class="flex justify-between md:w-1/3">
			<a href="/screens/node/{{$screen->id}}" class="no-underline text-white">
				<div class="text-center rounded-full shadow bg-blue hover:bg-blue-dark py-2 px-4 my-2">
					Preview
				</div>
			</a>
			<a :href="overrideUrl" class="no-underline text-white">
				<div class="text-center rounded-full shadow bg-yellow-dark hover:bg-yellow-darker py-2 px-4 my-2">
					Override
				</div>
			</a>
			<a :href="overrideUrl" class="no-underline text-white">
				<div class="text-center rounded-full shadow bg-green hover:bg-green-dark py-2 px-4 my-2">
					Settings
				</div>
			</a>
		</div>

		<div class="flex">
			<div class="flex-1 mr-1">
				@foreach($screen->currentContents as $currentContent)
					<screen-content-item
						:contents="{{ $currentContent }}">
					</screen-content-item>
				@endforeach
			</div>
			<div class="hidden md:block flex-1 ml-1">
				<div class="card p-2 mb-4">
					<node-image-rotater 
						:screen="{{ $screen }}"
					>
					</node-image-rotater>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="section">
	<div class="section-header flex justify-between mb-4">
		<div class="section-header-left flex text-white font-light items-baseline leading-none">
			<div class="text-2xl font-light">
				Add Existing Content to Screen
			</div>
		</div>
	</div>

	<div class="section-content">
		<div class="card p-2 mb-4">
			<div class="flex flex-col">
				<form method="POST" action="/screens/{{ $screen->id }}/content/update" enctype="multipart/form-data">
					{{ method_field('PATCH') }}
					{{ csrf_field() }}
					<label class="block uppercase tracking-wide text-xs font-bold mb-2">
						Is the media already on the system? <br>
						Pick it to add it to {{ $screen->name }}
					</label>
					<div class="my-2">
						{!! Form::select('contents[]', $contents, null, ['class' => 'block appearance-none w-full bg-grey-lighter border border-grey-light hover:border-grey px-4 py-2 rounded shadow leading-tight focus:outline-none focus:shadow-outline', 'multiple' => 'multiple']) !!}
					</div>
					<p class="text-xs mb-3">
						(Hold <span class="font-bold">'CTRL'/'CMD'</span> and click to select multiple items)
					</p>

					<button type="submit" class="rounded-full text-white bg-blue px-4 py-2">Add Content</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="section">
	<div class="section-header flex justify-between mb-4">
		<div class="section-header-left flex text-white font-light items-baseline leading-none">
			<div class="text-2xl font-light">
				Add New Media
			</div>
		</div>
	</div>

	<div class="section-content">
		<div class="card p-2 mb-4">
			<div class="panel-body">
				<form method="POST" action="/content/create" enctype="multipart/form-data">
					{{ csrf_field() }}						
					<input name="screenid" type="hidden" id="screenid" value="{{ $screen->id }}">
					<input name="userid" type="hidden" id="userid" value="{{ Auth::user()->id }}">

					<div>
						<label class="block uppercase tracking-wide text-xs font-bold mb-2" for="name">
							Media Name
						</label>
						<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white" id="name" name="name" type="text" placeholder="The Bee Gees">
						<p class="text-red text-xs italic mb-3">Please fill out this field.</p>
					</div>
					
					<div>
						<label class="block uppercase tracking-wide text-xs font-bold mb-2" for="description">
							Media Description
						</label>
						<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-2 px-4 mb-1 leading-tight focus:outline-none focus:bg-white" id="description" name="description" type="text" placeholder="1920x1080 Entrance Poster">
						<p class="text-red text-xs italic mb-3">Please fill out this field.</p>
					</div>

					<div>
						<label class="block uppercase tracking-wide text-xs font-bold mb-2" for="content_url">
							Media Upload
						</label>
						<input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-1 leading-tight focus:outline-none focus:bg-white" type="file" id="content_url" name="content_url">
						<p class="text-red text-xs italic mb-3">You may only select one at a time!</p>
					</div>

					@include('screens.manage.content.partials.datetimepicker-add')

					<label class="block uppercase tracking-wide text-xs font-bold mb-2 mt-3">
						Which Displays would you like this media on? (you can change this later!)
					</label>
					<div class="my-2">
						{!! Form::select('screens[]', $screens, null, ['class' => 'block appearance-none w-full bg-grey-lighter border border-grey-light hover:border-grey px-4 py-2 rounded shadow leading-tight focus:outline-none focus:shadow-outline', 'multiple' => 'multiple']) !!}
					</div>
					<p class="text-xs mb-3">
						Please select which displays you wish this item to display on, you must also select the current display. <br>
						(Hold <span class="font-bold">'CTRL'/'CMD'</span> and click to select multiple items)
					</p>

					<div class="form-group">
						<button type="submit" class="rounded-full text-white bg-blue px-4 py-2">Add Content</button>        
					</div>

					@include('screens.errors')

				</form>
	    	</div>
	    </div>
	</div>
</div>
@endsection


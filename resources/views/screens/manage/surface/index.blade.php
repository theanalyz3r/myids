@extends('layouts.app')

@section('page-header')
    <div class="page-header flex">
        <div class="font-light">
            ids 
        </div>

        <div class="font-bold">
            Home
        </div>
    </div>
@endsection

@section('section-1')
    {{-- @forelse($sites as $site) --}}
        <div class="section">
            <div class="section-header flex justify-between mb-4">
                <div class="section-header-left flex text-white font-light items-baseline leading-none">
                    <div class="p-1 leading-none text-xs mx-1">
                        LOGO
                    </div>

                    <div class="text-2xl mr-1">
                        Preston Guild Hall
                    </div>

                    <div class="hidden text-xs">
                        1 Lancaster Road, Preston, PR11HT
                    </div>
                </div>
                <div class="section-header-right text-white font-light overflow-x-auto">
                    <div class="flex">
                        {{-- @foreach($site->categories as $category) --}}
                            <div class="category-btn rounded-full bg-red hover:bg-red-light text-center text-xs text-white mx-1 py-2 px-4">
                                Complex
                            </div>
                        {{-- @endforeach --}}
                    </div>
                </div>
            </div>

            <div class="section-content mb-4">
                {{-- @forelse($site->venues as $venue)            --}}
                @forelse($screens as $screen)
                  <screen-item 
                    :screen="{{json_encode($screen)}}"
                    :creator="{{json_encode($screen->user)}}"
                  ></screen-item>
                @empty
                
                <div class="card p-2 mb-4">
                    <div class="card-header flex justify-between items-center">
                        <div class="flex-col text-center">
                            <div class="text-2xl font-bold text-black no-underline">
                                No Screens on this Site yet!
                            </div>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    {{-- @empty  
        <div class="card p-2 mb-4">
            <div class="card-header flex justify-between items-center">
                <div class="flex-col text-center">
                    <div class="text-2xl font-bold text-black no-underline">
                        No Sites in the System yet!
                    </div>
                </div>
            </div>
        </div>
    @endforelse --}}
@endsection
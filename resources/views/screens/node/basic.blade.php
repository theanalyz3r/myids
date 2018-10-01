@extends('screens.node.master')

@section('title')
    Basic
@endsection

@section('content')
    <node-welcome
        :screen="{{ $screen }}"
        :contents="{{ $contents }}"
    >
    </node-welcome>

    {{-- <node-image-rotater :screen="{{ $screen }}">
    </node-image-rotater> --}}
    <node-media-player :screen="{{ $screen }}">
    </node-media-player>

    <node-logo></node-logo>

    <node-footer 
        :screen="{{ $screen }}"
        :contents="{{ $contents }}"
    >
    </node-footer>
@endsection
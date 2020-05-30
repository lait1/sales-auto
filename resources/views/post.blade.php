@extends('layout')

@section('content')
    <section class="post">
        <div class="post-header">
            <h1>{{$post->title}}</h1>
        </div>
        <div class="post-content">
            {!! $post->content !!}
        </div>
@endsection
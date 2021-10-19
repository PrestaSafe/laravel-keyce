@extends('layout.default')

@section('meta_title', $post->title)
@section('meta_description',$post->title)

@section('content')
    @include('partials.post-detail',$post)
@endsection

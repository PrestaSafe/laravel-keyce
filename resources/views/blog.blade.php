@extends('layout.default')

@section('meta_title','Notre blog')
@section('meta_description','Voici la liste de nos articles de blog')

@section('content')
<!-- Post content-->
@foreach ($posts as $post)
    @include('partials.post-detail',$post)
@endforeach

{{ $posts->links() }}

@endsection

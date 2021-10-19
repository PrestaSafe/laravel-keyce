@extends('layout.default')

@section('meta_title','Notre blog')
@section('meta_description','Voici la liste de nos articles de blog')

@section('content')
<!-- Post content-->
@forelse ($posts as $post)
    @include('partials.post-detail',$post)
@empty
    <div class="alert alert-warning">Aucun resultats de recherche</div>
@endforelse


{{ $posts->links() }}

@endsection

@extends('layout.default')

@section('content')
    <h1>{{ $category->name }}</h1>
    @php
        $posts = $category->posts()->where('active',1)
            ->orderBy('id','DESC')
            ->paginate(env('POST_PAGINATE',10));
    @endphp
    @forelse ($posts as $post)
        @include('partials.post-detail',$post)
    @empty
        <div class="alert alert-warning">Aucun resultats de recherche</div>
    @endforelse
    {{ $posts->links() }}
@endsection
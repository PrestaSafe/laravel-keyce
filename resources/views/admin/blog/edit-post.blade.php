@extends('layout.admin')

@section('content')
    Pour faire update, <br>
    faire un $post->title = 'champs title de la request';<br>
    faire un $post->content = 'champs content de la request';<br>
    faire un $post->save();<br>
@endsection
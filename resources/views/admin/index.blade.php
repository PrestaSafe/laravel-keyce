@extends('layout.admin')

@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Edit</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($posts as $post)
        <tr>
            <th scope="row">{{ $post->id }}</th>
            <td>{{ $post->title }}</td>
            <td>Editer</td>
            <td>supprimer</td>
        </tr>
        @empty    
        <tr><th colspan="5">Aucun articles</th></tr>
        @endforelse
      
    </tbody>
  </table>
@endsection
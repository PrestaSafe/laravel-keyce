@extends('layout.default')


@section('meta_title', 'page contact')
@section('meta_description', 'Page contact description')

@section('content')
    <h1>Contact page</h1>

    <form method="POST" action="{{ route('post_contact') }}">
        @csrf
        <div class="form-group mb-4">
            <label for="exampleFormControlInput1">Nom</label>
            <input type="text" class="form-control" value="{{ old('name') }}" name="name" id="name" placeholder="name@example.com">
        </div>
        
        <div class="form-group mb-4">
            <label for="email">email</label>
            <input type="email" class="form-control" value="{{ old('email') }}" name="email" id="email" placeholder="name@example.com">
        </div>

        <div class="form-group mb-4">
            <label for="sujet">Sujet</label>
            <input type="text" class="form-control" value="{{ old('sujet') }}" name="sujet" id="sujet" placeholder="name@example.com">
        </div>

        <div class="form-group mb-4">
            <label for="sujet">message</label>
            <textarea class="form-control" name="message" id="message" rows="3" placeholder="name@example.com">{{old('message')}}</textarea>
        </div>
        
    
        <div class="form-group mb-4">
            <button type="submit" class="btn btn-primary">Envoyer le message</button>
        </div>
    </form>

@endsection

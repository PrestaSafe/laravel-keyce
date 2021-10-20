@extends('layout.admin')

@section('content')
   <div class="mb-5">
    <form action="{{ route('posts.update', $post) }}" method="POST">
        @csrf
        @method('put')     
        <div class="form-group mb-4">
          <label for="exampleFormControlInput1">Title</label>
          <input type="text" class="form-control" name="title" value="{{ $post->title }}" placeholder="name@example.com">
        </div>
        @php
            $cat_ids = $post->categories->pluck('id')->toArray();
        @endphp
       
        <div class="form-group mb-4">
          <label for="exampleFormControlSelect2">Example multiple select</label>
          <select multiple class="form-control" name="categories[]">
              @php
                  $categories = \App\Models\Category::all();
              @endphp
              @foreach ($categories as $category)
                <option @if(in_array($category->id,$cat_ids)) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
        
          </select>
        </div>
        <div class="form-group mb-4">
          <label for="content">Content</label>
          <textarea class="form-control" id="content" name="content" rows="3">{{ $post->content }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
      </form>
   </div>
    
@endsection
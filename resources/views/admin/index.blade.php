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
        <tr class="post-line">
            <th scope="row">{{ $post->id }}</th>
            <td>{{ $post->title }}</td>
            <td> <a class="text-primary" href="{{ route('posts.edit',$post) }}">Editer</a> </td>
            <td>
              <form method="POST" class="destroyForm" action="{{ route('posts.destroy', $post) }}">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-primary">Delete</button>
              </form>

            </td>
        </tr>
        @empty    
        <tr><th colspan="5">Aucun articles</th></tr>
        @endforelse
      
    </tbody>
  </table>
@endsection

@section("scripts")
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript">
  $(function(){
    $('.destroyForm').on('submit',function(e){
      e.preventDefault(); // empeche de recharger la page
      // ajax 
      var that = $(this);
      if(confirm('Voulez vous supprimer ?')){
        $.ajax({
          url: that.attr('action'),
          dataType: 'json',
          method: "DELETE",
          data: that.serialize(),
          success: function(data)
          {
            if(data.success)
            {
              that.parents('tr.post-line').fadeOut();
            }
          },
          error: function(error)
          {
            alert('Error');
            console.log(error);
          }
        });
      }

    });
  })
</script>
@endsection
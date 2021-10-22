@extends('layout.default')


@section('meta_title', 'page contact')
@section('meta_description', 'Page contact description')

@section('content')
    <h1>Contact page</h1>
    <span class="loading d-none">
        <div class="alert alert-info">
            Chargement en cours <i class="fas fa-spinner fa-spin"></i> 
        </div>
    
    </span>

    <div id="ajax_return"></div>

    <form id="formContact" method="POST" action="{{ route('post_contact') }}">
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



@section("scripts")
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript">
  $(function(){
    let form = $('#formContact');
    $(form).on('submit', function(e){
        e.preventDefault();
        $.ajax({
            method:'POST',
            url: $(form).attr('action'),
            data: $(form).serialize(),
            dataType: 'json',
            beforeSend: function()
            {
                $('.loading').removeClass('d-none');
            },
            success: function(data){
                console.log(data);
                if(data.success)
                {
                    $('#ajax_return').empty().html('<div class="alert alert-success">'+data.message+'</div>');
                    form.slideUp();
                }else{

                    $('#ajax_return').empty().html('<div class="alert alert-danger">'+data.message+'</div>');
                }
                $('.loading').addClass('d-none');

            },
        });
    });
  })
</script>
@endsection
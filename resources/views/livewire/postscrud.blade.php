<div>
    <input type="text" wire:model.debounce.200ms="search" class="form-control" placeholder="Rechercher..">
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
                    <button wire:click="delete({{$post->id}})" type="button" class="btn btn-primary">Delete</button>
                </td>
            </tr>
            @empty    
            <tr><th colspan="5">Aucun articles</th></tr>
            @endforelse
        
        </tbody>
    </table>
</div>

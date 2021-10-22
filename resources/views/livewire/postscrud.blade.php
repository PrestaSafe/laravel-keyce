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
                    <td> <a class="text-primary" 
                        wire:click="edit({{$post->id}})"
                        data-bs-toggle="modal" data-bs-target="#exampleModal"
                        href="{{ route('posts.edit', $post) }}">Editer</a> </td>
                    <td>
                        <button wire:click="delete({{ $post->id }})" type="button"
                            class="btn btn-primary">Delete</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <th colspan="5">Aucun articles</th>
                </tr>
            @endforelse
            
            <!-- Modal -->
            <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="title" class="form-label">Post Title</label>
                                <input type="text" class="form-control" id="title" wire:model.defer="title" placeholder="name@example.com">
                              </div>
                              <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" id="content" wire:model.defer="content" rows="3"></textarea>
                              </div>
                              {{-- <input type="text" wire:model="id_post"> --}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" wire:click="save" data-bs-dismiss="modal">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </tbody>
    </table>
    {{ $posts->links() }}
</div>

<div>
    <div>
        <input type="text" wire:model.debounce.200ms="search" class="form-control" placeholder="Rechercher..">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">email</th>
                    <th scope="col">sujet</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $contact)
                    <tr class="post-line">
                        <th scope="row">{{ $contact->id }}</th>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->sujet }}</td>
                        <td> <a class="text-primary" 
                            wire:click="edit({{$contact->id}})"
                            data-bs-toggle="modal" data-bs-target="#exampleModal"
                            >Editer</a> </td>
                        <td>
                            <button wire:click="delete({{ $contact->id }})" type="button"
                                class="btn btn-primary">Delete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th colspan="6" class="text-center">Aucun contacts</th>
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
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" wire:model.defer="name" placeholder="name@example.com">
                                  </div>
                                  <div class="mb-3">
                                    <label for="email" class="form-label">email</label>
                                    <input type="text" class="form-control" id="email" wire:model.defer="email" placeholder="name@example.com">
                                  </div>
                                  <div class="mb-3">
                                    <label for="sujet" class="form-label">sujet</label>
                                    <input type="text" class="form-control" id="sujet" wire:model.defer="sujet" placeholder="name@example.com">
                                  </div>
                         
                                  <div class="mb-3">
                                    <label for="message" class="form-label">message</label>
                                    <textarea class="form-control" id="message" wire:model.defer="message" rows="3"></textarea>
                                  </div>
                                  {{-- <input type="text" wire:model="id_contact"> --}}
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
        {{ $contacts->links() }}
    </div>
    
</div>

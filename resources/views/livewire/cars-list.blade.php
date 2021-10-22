<div>
    <div class="row">
        
        <div class="form col-5">
            <form>
                <div class="mb-3">
                    <label for="marque" class="form-label">Marque</label>
                    <input type="text" class="form-control" wire:model="state.marque" id="marque" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="prix" class="form-label">Prix</label>
                    <input type="number" class="form-control" wire:model="state.prix" id="prix" placeholder="">
                </div>
                <div class="mb-3">
                    <button type="reset" wire:click.prevent="cancel" class="btn btn-secondary">Annuler</button>
                    @if ($updateMode)
                        <button type="submit" wire:click.prevent="update" class="btn btn-primary">Mettre à jour</button>
                    @else
                        <button type="submit" wire:click.prevent="store" class="btn btn-primary">Enregistrer</button>
                    @endif
                </div>
            </form>
        </div>
        <div class=" col-7">
            <h3>List des voitures</h3>
            <table class="table table-responsive table-bordered">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Marque</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($cars as $car)
                        <tr>
                            <th scope="row">{{ $car->id }}</th>
                            <td>{{ $car->marque }}</td>
                            <td>{{ $car->prix }}</td>
                            <td>
                                <button type="button" wire:click.prevent="edit({{ $car->id }})" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Modifier</button>
                                {{-- <button type="button" wire:click.prevent="edit({{ $car->id }})" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Modifier
                                  </button> --}}

                                  {{-- <button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Launch demo modal
                                  </button> --}}
                                  
                                <button type="button" wire:click.prevent="delete({{ $car->id }})" class="btn btn-danger btn-sm">Supprimer</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>



  
  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form>
                <div class="mb-3">
                    <label for="marque" class="form-label">Marque</label>
                    <input type="text" class="form-control" wire:model="state.marque" id="marque" placeholder="">
                </div>
                <div class="mb-3">
                    <label for="prix" class="form-label">Prix</label>
                    <input type="number" class="form-control" wire:model="state.prix" id="prix" placeholder="">
                </div>
                <div class="mb-3">
                    <button type="reset" wire:click.prevent="cancel" class="btn btn-secondary">Annuler</button>
                    @if ($updateMode)
                        <button type="submit" wire:click.prevent="update" class="btn btn-primary">Mettre à jour</button>
                    @else
                        <button type="submit" wire:click.prevent="store" class="btn btn-primary">Enregistrer</button>
                    @endif
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
            </table>
        </div>
    </div>
</div>
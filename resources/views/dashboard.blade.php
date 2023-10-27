<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="input-group mb-3 w-75  ">
                       <button class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="basic-addon2">Ajouter Reclamation</button>
                      </div>

                      <div class="text-center">

                        <table class="table table-bordered border-primary">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Departement</th>
                                <th>Date</th>
                               @if($User->IsAdmin == 0)
                                <th>Valider</th>
                               @else
                               <th>User</th>
                               @endif
                                <th>Operation</th>
                            </tr>
                            <tr>
                                @foreach ($Reclamations as $reclamation )
                                   <tr>
                                        <th> {{ $reclamation->id }} </th>
                                        <th>{{ $reclamation->Name }}</th>
                                        <th>{{ $reclamation->Departement }}</th>
                                        <th>{{ $reclamation->Date }}</th>
                                        @if($User->IsAdmin == 0)
                                            <th>{{ $reclamation->IsValidate == 0 ? "Non" :"Oui" }}</th>
                                        @else
                                        <th>{{ $User->email }}</th>
                                        @endif
                                        
                                        <th class="w-auto d-flex justify-content-end ">

                                            <form method="POST" class="" action="{{ route('reclamation.valider',$reclamation->id ) }}"  onSubmit="if(!confirm('Voullez-vous Envoie cette Reclamation ?')){return false;}">
                                                @csrf
                                                <input type="hidden" name="reclamation_id" value="{{ $reclamation->id }}">
                                                 <button type="submit" class="btn btn-success  text-black">Valider</button>
                                            </form>
                                            <a href="{{ route('reclamation.updateReclamation',$reclamation->id ) }}"
                                            <button type="button" class="btn btn-warning  text-black"  id="btn-update" >Modifier </button>
                                            </a>

                                            <form method="POST" class="" action="{{ route('reclamation.destroy',$reclamation->id ) }}"  onSubmit="if(!confirm('Voullez-vous Suprimer cette Reclamation ?')){return false;}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-success  text-black">Suprimer</button>
                                            </form>


                                        </th>
                                   </tr>

                                @endforeach
                            </tr>
                          </table>
                          {{ $Reclamations->links() }}
                      </div>





  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Ajoute Reclamation</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
                <!-- Form Ajoute Reclamation -->
          <form class="needs-validation" method="POST" action="{{ route('reclamation.store') }}" >
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="Name" placeholder="name">
                @error('Name')
                <div class="alert alert-danger" role="alert">
                   {{  $message }}
                  </div>
                @enderror
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Departement</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="Departement" placeholder="Departement">
                @error('Departement')
                <div class="alert alert-danger" role="alert">
                   {{  $message }}
                  </div>
                @enderror
              </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary bg-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary bg-primary">Ajouter</button>
        </div>
          </form>
      </div>
    </div>
  </div>




                </div>
            </div>
        </div>
    </div>

</x-app-layout>


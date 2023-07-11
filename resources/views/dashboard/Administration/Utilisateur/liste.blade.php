@extends('dashboard.layouts.dashboard', ['title' => 'Utilisateurs'])

@section('page_header')
<div class="page-header-content header-elements-md-inline">

    <div class="d-flex">
        <div class="breadcrumb">
            <a href="#" class="breadcrumb-item p-0"><i class="icon-home2 mr-2"></i> Acceuil </a>
            <span class="breadcrumb-item">Administration </span>
            <span style="font-size: 16px;color:#e79300;" class="breadcrumb-item active"> Utilisateurs</span>
         </div>
    </div>
    <div class="header-elements d-none py-0 mb-3 mb-md-0">
        <a href="#" data-toggle="modal" data-target="#modal_iconified" class="btn bg-teal-400">Ajouter un utilisateur</a>
    </div>
    {{-- <div class="header-elements d-none py-0 mb-3 mb-md-0">
        <a href="{{ route('user.create') }}" class="btn bg-teal">Ajouter un utilisateur</a>
    </div> --}}
</div>
@endsection

@section('content')
  {{-- <div class="card">
                <div class="card-datatable table-responsive">
                  <table class="datatables-basic table border-top">
                    <thead>
                      <tr>
                        <th></th>
                        <th></th>
                        <th>id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Salary</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                  </table>
                </div>
              </div> --}}
<div class="card">
    <table class="table table-striped datatable-responsive datatable-header-basic">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Profil</th>
                {{-- <th>Fonction</th> --}}
                <th>Email</th>
                <th>Téléphone</th>
                <th>Date de création</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->nom }}</td>
                    <td>{{ $user->prenom }}</td>
                    <td>{{ $user->profil->libelle }}</td>
                    {{-- <td>{{ $user->fonction->nom_fnct }}</td> --}}
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->telephone }}</td>
                    <td>{{ $user->created_at->format('d/m/Y à H:i:s') }}</td>
                    <td class="text-center">
                        {{-- <a href="{{ route('user.edit', $user) }}" class="icon-pencil7 text-info" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                        </a> --}}
                        <a href="#" class="icon-pencil7 text-info modaledit" id="{{ $user->id }}" data-toggle="tooltip" data-placement="bottom" title="Modifier hhhh">
                        </a>
                        <a href="{{ route('user.reset_password', $user) }}" class="icon-lock text-warning" data-toggle="tooltip" data-placement="bottom" title="Réinitialiser mot de passe" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','reset-form-{{ $user->id }}');">
                            {{-- <i class="far fa-trash-alt"></i> --}}
                        </a>
                        <form id="reset-form-{{ $user->id }}" action="{{ route('user.reset_password', $user) }}" method="POST" style="display: none;">
                            @csrf
                            @method('PUT')
                        </form>
                        <a href="{{ route('user.destroy', $user) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','logout-form-{{ $user->id }}');">
                            {{-- <i class="far fa-trash-alt"></i> --}}
                        </a>
                        <form id="logout-form-{{ $user->id }}" action="{{ route('user.destroy', $user) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div id="modal_iconified" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="POST" action="{{ route('user.store') }}">
            @csrf
            @method('POST')

            <div class="modal-header bg-primary">
                <h5 class="modal-title"><i class="icon-design mr-2"></i> Nouveau Utilisateur</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

                <div class="row mb-2">

                    <div class="col-md-6 mb-2">
                        <label for="inputEmail4" class="text-black">Profil <span class="text-danger text-bold">*</span></label>
                        <select class="form-control select @error('profil_id') is-invalid @enderror" name="profil_id" aria-describedby="profil_id" placeholder="Sélectionner le profil" required>
                            @foreach ($profils as $profil)
                                <option value="{{ $profil->id }}" {{ old('profil_id') == $profil->id ? 'selected' : ''  }}>{{ $profil->libelle }}</option>
                            @endforeach
                        </select></div>

                    <div class="col-md-6 mb-2">
                        <label for="inputEmail4" class="text-black">Nom <span class="text-danger text-bold">*</span></label>
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" aria-describedby="nom" placeholder="Saississez le nom de l'utilisateur" value="{{ old('nom') }}" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="inputEmail4" class="text-black">Prénom <span class="text-danger text-bold">*</span></label>
                        <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom" aria-describedby="prenom" placeholder="Saississez le prénom de l'utilisateur" value="{{ old('prenom') }}" required>
                   </div>

                    <div class="col-md-6 mb-2">
                         <label for="inputEmail4" class="text-black">Email <span class="text-danger text-bold">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" aria-describedby="email" placeholder="Saississez l'email de l'utilisateur" value="{{ old('email') }}" required>
                    </div>
                    <div class="col-md-6 mb-2">
                            <label for="inputEmail4" class="text-black">Titre <span class="text-danger text-bold">*</span></label>
                            <select class="form-control select @error('titre') is-invalid @enderror" id="titre" name="titre" aria-describedby="titre" placeholder="Sélectionner le titre" required>
                                <option value="Monsieur" {{ old('titre') == 'Monsieur' ? 'selected' : ''  }}>Monsieur</option>
                                <option value="Madame" {{ old('titre') == 'Madame' ? 'selected' : ''  }}>Madame</option>
                                <option value="Mademoiselle" {{ old('titre') == 'Mademoiselle' ? 'selected' : ''  }}>Mademoiselle</option>
                                <option value="Professeur" {{ old('titre') == 'Professeur'? 'selected' : ''  }}>Professeur</option>
                                <option value="Docteur" {{ old('titre') == 'Docteur' ? 'selected' : ''  }}>Docteur</option>
                            </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="inputEmail4" class="text-black">Fonction <span class="text-danger text-bold">*</span></label>
                        <select class="form-control select @error('profil_id') is-invalid @enderror" id="fonction" name="fonction" aria-describedby="profil_id" placeholder="Sélectionner le profil" required>
                            @foreach ($fonctions as $profil)
                                <option value="{{ $profil->id_fnct }}" {{ old('fonction') == $profil->id_fnct ? 'selected' : ''  }}>{{ $profil->nom_fnct }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="inputEmail4" class="text-black">Structure <span class="text-danger text-bold">*</span></label>
                        <select class="form-control select @error('structure') is-invalid @enderror" id="structure" name="structure_id" aria-describedby="structure" placeholder="Sélectionner la structure" required>
                            @foreach ($partenaires as $profil)
                                <option value="{{ $profil->id_pat }}" {{ old('structure') == $profil->id_pat ? 'selected' : ''  }}>{{ $profil->sigle_pat }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="inputEmail4" class="text-black">Téléphone <span class="text-danger text-bold">*</span></label>
                        <input type="text" class="form-control" placeholder="Téléphone" id="telephone" name="telephone"    required>
                    </div>


                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Fermer</button>
                <button type="submit" class="btn bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> Vaider</button>
            </div>
        </form>
    </div>
</div>
<div id="modal_edite" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" id="editform" action="" method="POST">

            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="modal-header bg-primary">
                <h5 class="modal-title"><i class="icon-design mr-2"></i> Modification Utilisateurs</h5>
                <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

                <div class="row mb-2">

                    <div class="col-md-6 mb-2">
                        <label for="inputEmail4" class="text-black">Profil <span class="text-danger text-bold">*</span></label>
                        <select class="form-control select @error('profil_id') is-invalid @enderror" name="profil_id" aria-describedby="profil_id" id="profil_up" placeholder="Sélectionner le profil" required>
                            @foreach ($profils as $profil)
                                <option value="{{ $profil->id }}" {{ old('profil_id') == $profil->id ? 'selected' : ''  }}>{{ $profil->libelle }}</option>
                            @endforeach
                        </select></div>

                    <div class="col-md-6 mb-2">
                        <label for="inputEmail4" class="text-black">Nom <span class="text-danger text-bold">*</span></label>
                        <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom_up" name="nom" aria-describedby="nom" placeholder="Saississez le nom de l'utilisateur" value="{{ old('nom') }}" required>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="inputEmail4" class="text-black">Prénom <span class="text-danger text-bold">*</span></label>
                        <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom_up" name="prenom" aria-describedby="prenom" placeholder="Saississez le prénom de l'utilisateur" value="{{ old('prenom') }}" required>
                   </div>

                    <div class="col-md-6 mb-2">
                         <label for="inputEmail4" class="text-black">Email <span class="text-danger text-bold">*</span></label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email_up" name="email" aria-describedby="email" placeholder="Saississez l'email de l'utilisateur" value="{{ old('email') }}" required>
                    </div>
                    <div class="col-md-6 mb-2">
                            <label for="inputEmail4" class="text-black">Titre <span class="text-danger text-bold">*</span></label>
                            <select class="form-control select @error('titre') is-invalid @enderror" id="titre_up" name="titre" aria-describedby="titre" placeholder="Sélectionner le titre" required>
                                <option value="Monsieur" {{ old('titre') == 'Monsieur' ? 'selected' : ''  }}>Monsieur</option>
                                <option value="Madame" {{ old('titre') == 'Madame' ? 'selected' : ''  }}>Madame</option>
                                <option value="Mademoiselle" {{ old('titre') == 'Mademoiselle' ? 'selected' : ''  }}>Mademoiselle</option>
                                <option value="Professeur" {{ old('titre') == 'Professeur'? 'selected' : ''  }}>Professeur</option>
                                <option value="Docteur" {{ old('titre') == 'Docteur' ? 'selected' : ''  }}>Docteur</option>
                            </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="inputEmail4" class="text-black">Fonction <span class="text-danger text-bold">*</span></label>
                        <select class="form-control select @error('profil_id') is-invalid @enderror" id="fonction_up" name="fonction" aria-describedby="profil_id" placeholder="Sélectionner le profil" required>
                            @foreach ($fonctions as $profil)
                                <option value="{{ $profil->id_fnct }}" {{ old('fonction') == $profil->id_fnct ? 'selected' : ''  }}>{{ $profil->nom_fnct }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-2">
                        <label for="inputEmail4" class="text-black">Structure <span class="text-danger text-bold">*</span></label>
                        <select class="form-control select @error('structure') is-invalid @enderror" id="structure_up" name="structure_id" aria-describedby="structure" placeholder="Sélectionner la structure" required>
                            @foreach ($partenaires as $profil)
                                <option value="{{ $profil->id_pat }}" {{ old('structure') == $profil->id_pat ? 'selected' : ''  }}>{{ $profil->sigle_pat }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label for="inputEmail4" class="text-black">Téléphone <span class="text-danger text-bold">*</span></label>
                        <input type="text" class="form-control " aria-describedby="telephone" id="telephone_up" name="telephone"    required>
                    </div>


                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-bs-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Fermer</button>
                <button type="submit" class="btn bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> Vaider</button>
            </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(document).on('click','.modaledit',function(){
            var ids=$(this).attr("id");
            var page= false;

           var lien="./user_edit/"
           var liena='./user_update/'

            $('#editform').attr('action',liena+ids)
           $('#modal_edite').modal('show')
           //alert(page)
           $.ajax({

                url:lien+ids,
                method: "GET",
                //data: {id_beneficiaire: id_beneficiaire},
                success: function (response) {
                    console.log(response);
                $('#fonction_up').val(response.User.fonction_id);
                $('#nom_up').val(response.User.nom);
                $('#prenom_up').val(response.User.prenom);
                $('#profil_up').val(response.User.profil_id);
                $('#telephone_up').val(response.User.telephone);
                $('#titre_up').val(response.User.titre);
                $('#email_up').val(response.User.email);
                $('#structure_up').val(response.User.structure_id);
                }
                            });

    });

    });
</script>
@endsection

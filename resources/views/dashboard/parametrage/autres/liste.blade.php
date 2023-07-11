@extends('dashboard.layouts.dashboard', ['title' => 'progrAutres paramétragesammes'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <span class="breadcrumb-item">Paramétrage</span>
                <span class="breadcrumb-item active">Autres paramétrages</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">

            </div>
        </div>
    </div>
</div>
<!-- /page header -->
@endsection

@section('content')
<div class="row">
<div class="col-sm-6">
<div class="card">
<div class="card-header bg-primary header-elements-inline">
                    <span class="text-uppercase font-size-sm font-weight-semibold">Fonctions</span>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
                    </div>
                </div>
<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline md">
        <div class="d-flex">
            <div class="breadcrumb">
                <span class="breadcrumb-item col-"> Fonction des utilisateurs</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="btn bg-teal-400 btn-block mb-2 mt-2" data-toggle="modal" data-target="#modal_iconified">
                    <i class="icon-add menu-icon tf-icons"></i>
                    Ajouter une fonction
                </a>
            </div>
        </div>
    </div>
<table class="table table-striped datatable-responsive datatable-header-basic" id="DataTables_Table_0">
        <thead>
            <tr>

                {{-- <th>Direction/service</th> --}}
                <th>Fonction</th>
                <th>Description</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fonctions as $fonction)
                <tr>
                {{-- <td>{{ $fonction->agence_fnct}}</td> --}}
                    <td>{{ $fonction->nom_fnct }}</td>
                    <td> {{ $fonction->description_fnct}}</td>

                    <td class="text-center">
                        <a href="#" class="icon-pencil7 text-info fonct_edit" id="{{ $fonction->id_fnct }}" data-toggle="tooltip" data-placement="bottom" title="Modifier hhhh">
                        </a>
                        {{-- <a href="{{ route('fonction.edit', $fonction) }}" class="icon-pencil7 text-info" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                        </a> --}}
                        <a href="{{ route('fonction.destroy', $fonction) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $fonction->id_fnct }}');">
                            {{-- <i class="far fa-trash-alt"></i> --}}
                        </a>
                        <form id="delete-form-{{ $fonction->id_fnct }}" action="{{ route('fonction.destroy', $fonction) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>
    <div class="col-sm-6">
<div class="card">
<div class="card-header bg-primary header-elements-inline">
                    <span class="text-uppercase font-size-sm font-weight-semibold">Catégorie de dépenses</span>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
</div>
</div>
<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline md">
        <div class="d-flex">
            <div class="breadcrumb">
                <span class="breadcrumb-item">Catégorie de dépenses</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="btn bg-teal-400 btn-block mb-2 mt-2" data-toggle="modal" data-target="#modal_categorie">
                    <i class="icon-add menu-icon tf-icons"></i>
                    Ajouter une catégorie
                </a>
            </div>
        </div>
    </div>
<table class="table table-striped datatable-responsive datatable-header-basic" id="DataTables_Table_0">
        <thead>
            <tr>

                <th>Code</th>
                <th>Catégorie</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $categorie)
                <tr>
                <td>{{$categorie->code_cat}}</td>
                    <td>{{$categorie->nom_cat}}</td>

                    <td class="text-center">
                        <a href="#" class="icon-pencil7 text-info cat_edit" id="{{ $categorie->id_cat }}" data-toggle="tooltip" data-placement="bottom" title="Modifier catégorie">
                        </a>
                        {{-- <a href="{{ route('categorie.edit', $categorie) }}" class="icon-pencil7 text-info" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                            {{-- <i class="far fa-edit"></i> -}}
                        </a> --}}
                        <a href="{{ route('categorie.destroy', $categorie) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $categorie->id_cat }}');">
                            {{-- <i class="far fa-trash-alt"></i> --}}
                        </a>
                        <form id="delete-form-{{ $categorie->id_cat }}" action="{{ route('categorie.destroy', $categorie) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>
<div class="col-sm-6">
    <br>
<div class="card">
<div class="card-header bg-primary header-elements-inline">
                    <span class="text-uppercase font-size-sm font-weight-semibold">Thématiques</span>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
</div>
</div>
<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline md">
        <div class="d-flex">
            <div class="breadcrumb">
                <span class="breadcrumb-item">Thématique</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="btn bg-teal-400 btn-block mb-2 mt-2" data-toggle="modal" data-target="#modal_thematique">
                    <i class="icon-add menu-icon tf-icons"></i>
                    Ajouter une thématique
                </a>
            </div>
        </div>
    </div>
<table class="table table-striped datatable-responsive datatable-header-basic" id="DataTables_Table_0">
        <thead>
            <tr>

                <th>Logo</th>
                <th>Thématique</th>
                <th>Description</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($thematiques as $thematique)
                <tr>
                <td>
                        @if ($thematique->photo_tmq)
                            <a href="{{ asset("uploads/produits/").'/'.$thematique->photo_tmq }}" data-popup="lightbox">
                                <img src="{{ asset("uploads/produits/").'/'.$thematique->photo_tmq }}" alt="" class="img-preview rounded">
                            </a>
                        @else
                            <a href="{{ asset("dashboard/global_assets/images/placeholders/placeholder.jpg") }}" data-popup="lightbox">
                                <img src="{{ asset("dashboard/global_assets/images/placeholders/placeholder.jpg") }}" alt="" class="img-preview rounded">
                            </a>
                        @endif
                    </td>
                    <td>{{ $thematique->nom_tmq }}</td>
                    <td>{{ $thematique->description_tmq}}</td>

                    <td class="text-center">
                        <a href="#" class="icon-pencil7 text-info thema_edit" id="{{ $thematique->id_tmq }}" data-toggle="tooltip" data-placement="bottom" title="Modifier catégorie">
                        </a>
                        {{-- <a href="{{ route('thematique.edit', $thematique) }}" class="icon-pencil7 text-info" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                            {{-- <i class="far fa-edit"></i> -}}
                        </a> --}}
                        <a href="{{ route('thematique.destroy', $thematique) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $thematique->id_tmq }}');">
                            {{-- <i class="far fa-trash-alt"></i> --}}
                        </a>
                        <form id="delete-form-{{ $thematique->id_tmq }}" action="{{ route('thematique.destroy', $thematique) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>
    <div class="col-sm-6">
        <br>
    <div class="card">
    <div class="card-header bg-primary header-elements-inline">
                    <span class="text-uppercase font-size-sm font-weight-semibold">Unité d'indicateurs</span>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
</div>
</div>
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline md">
        <div class="d-flex">
            <div class="breadcrumb">
                <span class="breadcrumb-item">Unité d'indicateurs</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="btn bg-teal-400 btn-block mb-2 mt-2" data-toggle="modal" data-target="#modal_unite">
                    <i class="icon-add menu-icon tf-icons"></i>
                    Ajouter une unité
                </a>
            </div>
        </div>
    </div>
<table class="table table-striped datatable-responsive datatable-header-basic" id="DataTables_Table_0">
        <thead>
            <tr>

                <th>Unité</th>
                <th>Définition</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($unites as $unite)
                <tr>
                <td>{{ $unite->code_uti}}</td>
                    <td>{{ $unite->nom_uti}}</td>

                    <td class="text-center">
                        <a href="#" class="icon-pencil7 text-info unit_edit" id="{{ $unite->id_uti }}" data-toggle="tooltip" data-placement="bottom" title="Modifier catégorie">
                        </a>
                        {{-- <a href="{{ route('unite.edit', $unite) }}" class="icon-pencil7 text-info" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                            {{-- <i class="far fa-edit"></i> -}}
                        </a> --}}
                        <a href="{{ route('unite.destroy', $unite) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $unite->id_uti }}');">
                            {{-- <i class="far fa-trash-alt"></i> --}}
                        </a>
                        <form id="delete-form-{{ $unite->id_uti }}" action="{{ route('unite.destroy', $unite) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>
    <div class="col-sm-6">
        <br>
    <div class="card">
    <div class="card-header bg-primary header-elements-inline">
                    <span class="text-uppercase font-size-sm font-weight-semibold">Type de partenaire </span>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
</div>
</div>
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline md">
        <div class="d-flex">
            <div class="breadcrumb">
                <span class="breadcrumb-item">Type de partenaire</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="btn bg-teal-400 btn-block mb-2 mt-2" data-toggle="modal" data-target="#modal_type_partenaire">
                    <i class="icon-add menu-icon tf-icons"></i>
                    Ajouter un Type
                </a>
            </div>
        </div>
    </div>
<table class="table table-striped datatable-responsive datatable-header-basic" id="DataTables_Table_0">
        <thead>
            <tr>

                <th>Nom</th>
                <th>Description</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($types as $type)
                <tr>
                <td>{{ $type->nom_tpt}}</td>
                    <td>{{ $type->description_tpt}}</td>

                    <td class="text-center">
                        <a href="#" class="icon-pencil7 text-info part_edit" id="{{ $type->id_tpt }}" data-toggle="tooltip" data-placement="bottom" title="Modifier catégorie">
                        </a>
                        {{-- <a href="{{ route('type.edit', $type) }}" class="icon-pencil7 text-info" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                            {{-- <i class="far fa-edit"></i> -}}
                        </a> --}}
                        <a href="{{ route('type.destroy', $type) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $type->id_tpt }}');">
                            {{-- <i class="far fa-trash-alt"></i> --}}
                        </a>
                        <form id="delete-form-{{ $type->id_tpt }}" action="{{ route('type.destroy', $type) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>
    <div class="col-sm-6">
        <br>
    <div class="card">
    <div class="card-header bg-primary header-elements-inline">
                    <span class="text-uppercase font-size-sm font-weight-semibold">Type de programme </span>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
</div>
</div>
    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline md">
        <div class="d-flex">
            <div class="breadcrumb">
                <span class="breadcrumb-item">Type de programme</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="btn bg-teal-400 btn-block mb-2 mt-2" data-toggle="modal" data-target="#modal_type_programme">
                    <i class="icon-add menu-icon tf-icons"></i>
                    Ajouter un Type
                </a>
            </div>
        </div>
    </div>
<table class="table table-striped datatable-responsive datatable-header-basic" id="DataTables_Table_0">
        <thead>
            <tr>

                <th>Nom</th>
                <th>Description</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($type_programmes as $type_programme)
                <tr>
                <td>{{ $type_programme->nom_tpr}}</td>
                    <td>{{ $type_programme->description_tpr}}</td>

                    <td class="text-center">
                        <a href="#" class="icon-pencil7 text-info prog_edit" id="{{ $type_programme->id_tpr }}" data-toggle="tooltip" data-placement="bottom" title="Modifier catégorie">
                        </a>
                        {{-- <a href="{{ route('type_programme.edit', $type_programme) }}" class="icon-pencil7 text-info" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                            {{-- <i class="far fa-edit"></i> -}}
                        </a> --}}
                        <a href="{{ route('type_programme.destroy', $type_programme) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $type_programme->id_tpr }}');">
                            {{-- <i class="far fa-trash-alt"></i> --}}
                        </a>
                        <form id="delete-form-{{ $type_programme->id_tpr }}" action="{{ route('type_programme.destroy', $type_programme) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>
</div>




        <!-- Iconified modal -->
        <div id="modal_iconified" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="{{ route('fonction.store') }}">
                    @csrf
                    @method('POST')

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white"><i class="icon-design mr-2"></i> &nbsp;Nouvelle fonction</h5>
                        <button type="button" class="close" data-dismiss="modal">X</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">

                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Nom Fonction <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="" aria-describedby="" placeholder="Saississez le code" required>
                            </div>

                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Description  <span class="text-danger text-bold"></span></label>
                              <textarea type="text" class="form-control" name="description" aria-=""></textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Structures <span class="text-danger text-bold"></span></label>
                                <select class="form-control" name="agence" aria-="" ng-init="initialiseSelect()">

                                    @foreach ($autres as  $value)
                                    <option data-icon="" value="{{$value->id_pat  }}">
                                       {{ $value->definition_pat }}
                                    </option>
                                @endforeach

                                    {{-- <option value="@{{x.id_fnct}}" ng-repeat="x in listeProduits">@{{x.libelle_pro}}</option> --}}
                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base menu-icon tf-icons"></i> Fermer</button>
                        <button type="submit" class="btn text-white bg-primary"><i class="icon-checkmark3 font-size-base menu-icon tf-icons"></i> Valider</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="modal_categorie" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="{{ route('categorie.store') }}">
                    @csrf
                    @method('POST')

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Nouvelle catégorie</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">

                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Code <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="" aria-="" placeholder="Saississez le code" required>
                            </div>

                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Nom catégorie  <span class="text-danger text-bold"></span></label>
                              <textarea type="text" class="form-control" name="nom" aria-=""></textarea>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base menu-icon tf-icons"></i> Fermer</button>
                        <button type="submit" class="btn bg-primary text-white"><i class="icon-checkmark3 font-size-base menu-icon tf-icons"></i> Valider</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="modal_thematique" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="{{ route('thematique.store') }}" >
                    @csrf
                    @method('POST')

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Nouvelle thématique</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">

                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Nom de la thématique <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="" aria-="" placeholder="Saississez le code" required>
                            </div>

                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Description  <span class="text-danger text-bold"></span></label>
                              <textarea type="text" class="form-control" name="description" aria-=""></textarea>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-lg-12 col-form-label font-weight-semibold">Image:</label>
                                    <div class="col-lg-12">
                                        <input type="file" class="form-control" name="image" id="image">
                                        <span class="form-text text-muted">Taille max (10 mb).</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base menu-icon tf-icons"></i> Fermer</button>
                        <button type="submit" class="btn bg-primary text-white"><i class="icon-checkmark3 font-size-base menu-icon tf-icons"></i> Valider</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="modal_unite" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="{{ route('unite.store') }}">
                    @csrf
                    @method('POST')

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Nouvelle unité</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">

                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Nom de l'Unité <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="" aria-describedby="" placeholder="Saississez le code" required>
                            </div>

                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Définition <span class="text-danger text-bold"></span></label>
                              <textarea type="text" class="form-control" name="nom" aria-=""></textarea>
                            </div>


                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base menu-icon tf-icons"></i> Fermer</button>
                        <button type="submit" class="btn bg-primary text-white"><i class="icon-checkmark3 font-size-base menu-icon tf-icons"></i> Valider</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="modal_type_partenaire" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="{{ route('type.store') }}">
                    @csrf
                    @method('POST')

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Nouveau type de partenaire</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">

                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Nom <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="" aria-describedby="" placeholder="Saississez un type" required>
                            </div>

                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Description <span class="text-danger text-bold"></span></label>
                              <textarea type="text" class="form-control" name="description" aria-=""></textarea>
                            </div>


                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base menu-icon tf-icons"></i> Fermer</button>
                        <button type="submit" class="btn bg-primary text-white"><i class="icon-checkmark3 font-size-base menu-icon tf-icons"></i> Valider</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="modal_type_programme" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="{{ route('type_programme.store') }}">
                    @csrf
                    @method('POST')

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Nouveau type de programme</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">

                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Nom <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="nom" name="nom" placeholder="" aria-describedby="" placeholder="Saississez un type" required>
                            </div>

                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Description <span class="text-danger text-bold"></span></label>
                              <textarea type="text" class="form-control" name="description" aria-=""></textarea>
                            </div>


                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base menu-icon tf-icons"></i> Fermer</button>
                        <button type="submit" class="btn bg-primary text-white"><i class="icon-checkmark3 font-size-base menu-icon tf-icons"></i> Valider</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /iconified modal -->

        {{-- Edit data modal --}}
        <div id="fonction_edit" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" id="editfonct" action="" method="POST">
                    {{ csrf_field() }}
               {{ method_field('PATCH') }}
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title text-white"><i class="icon-design mr-2"></i> &nbsp;Modification fonction</h5>
                        <button type="button" class="close" data-bs-dismiss="modal">X</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">

                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Nom Fonction <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="nom_fonc" name="nom" placeholder="" aria-describedby="" placeholder="Saississez le code" required>
                            </div>

                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Description  <span class="text-danger text-bold"></span></label>
                              <textarea type="text" class="form-control" name="description" id="description_fonc" aria-=""></textarea>
                            </div>

                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Structures <span class="text-danger text-bold"></span></label>
                                <select class="form-control" name="agence" aria-="" id="agence_fonc" ng-init="initialiseSelect()">

                                    @foreach ($autres as  $value)
                                    <option data-icon="" value="{{$value->id_pat  }}">
                                       {{ $value->definition_pat }}
                                    </option>
                                @endforeach

                                    {{-- <option value="@{{x.id_fnct}}" ng-repeat="x in listeProduits">@{{x.libelle_pro}}</option> --}}
                                </select>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-link" type="button" data-bs-dismiss="modal"><i class="icon-cross2 font-size-base menu-icon tf-icons"></i> Fermer</button>
                        <button type="submit" class="btn text-white bg-primary"><i class="icon-checkmark3 font-size-base menu-icon tf-icons"></i> Valider</button>
                    </div>
                </form>
            </div>
        </div>

        <div id="categorie_edit" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" id="editcat" action="">
                    {{ csrf_field() }}
               {{ method_field('PATCH') }}

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Modification catégorie</h5>
                        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">

                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Code <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="code_cat" name="code" placeholder="" aria-="" placeholder="Saississez le code" required>
                            </div>

                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Nom catégorie  <span class="text-danger text-bold"></span></label>
                              <textarea type="text" class="form-control" id="nom_cat" name="nom" aria-=""></textarea>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-link" type="button" data-bs-dismiss="modal"><i class="icon-cross2 font-size-base menu-icon tf-icons"></i> Fermer</button>
                        <button type="submit" class="btn bg-primary text-white"><i class="icon-checkmark3 font-size-base menu-icon tf-icons"></i> Valider</button>
                    </div>
                </form>
            </div>
        </div>

        <div id="unit_edit" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="" id="editunit">
                    {{ csrf_field() }}
               {{ method_field('PATCH') }}

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Modification unité</h5>
                        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">

                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Nom de l'Unité <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="code_unit" name="code" placeholder="" aria-describedby="" placeholder="Saississez le code" required>
                            </div>

                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Définition <span class="text-danger text-bold"></span></label>
                              <textarea type="text" class="form-control" id="nom_unit" name="nom" aria-=""></textarea>
                            </div>


                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-link" type="button" data-bs-dismiss="modal"><i class="icon-cross2 font-size-base menu-icon tf-icons"></i> Fermer</button>
                        <button type="submit" class="btn bg-primary text-white"><i class="icon-checkmark3 font-size-base menu-icon tf-icons"></i> Valider</button>
                    </div>
                </form>
            </div>
        </div>

        <div id="thema_edit" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="" id="editthema">
                    {{ csrf_field() }}
               {{ method_field('PATCH') }}

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Modification thématique</h5>
                        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">

                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Nom de la thématique <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="nom_thema" name="nom" placeholder="" aria-="" placeholder="Saississez le code" required>
                            </div>

                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Description  <span class="text-danger text-bold"></span></label>
                              <textarea type="text" class="form-control" id="description_thema" name="description" aria-=""></textarea>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-lg-12 col-form-label font-weight-semibold">Image:</label>
                                    <div class="col-lg-12">
                                        <input type="file" class="form-control" name="image" id="image_thema" data-fouc>
                                        <span class="form-text text-muted">Taille max (10 mb).</span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-link" type="button" data-bs-dismiss="modal"><i class="icon-cross2 font-size-base menu-icon tf-icons"></i> Fermer</button>
                        <button type="submit" class="btn bg-primary text-white"><i class="icon-checkmark3 font-size-base menu-icon tf-icons"></i> Valider</button>
                    </div>
                </form>
            </div>
        </div>

        <div id="type_partenaire_edit" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="" id="editpart">
                    {{ csrf_field() }}
               {{ method_field('PATCH') }}

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Modification type de partenaire</h5>
                        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">

                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Nom <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="nom_tpt" name="nom" placeholder="" aria-describedby="" placeholder="Saississez un type" required>
                            </div>

                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Description <span class="text-danger text-bold"></span></label>
                              <textarea type="text" class="form-control" id="description_tpt" name="description" aria-=""></textarea>
                            </div>


                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-link" type="button" data-bs-dismiss="modal"><i class="icon-cross2 font-size-base menu-icon tf-icons"></i> Fermer</button>
                        <button type="submit" class="btn bg-primary text-white"><i class="icon-checkmark3 font-size-base menu-icon tf-icons"></i> Valider</button>
                    </div>
                </form>
            </div>
        </div>

        <div id="type_programme_edit" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" id="editprog" action="">
                    {{ csrf_field() }}
               {{ method_field('PATCH') }}

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Modification type de programme</h5>
                        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">

                            <div class="col-md-12 mb-2">
                                <label for="inputEmail4" class="text-black">Nom <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="nom_tpr" name="nom" placeholder="" aria-describedby="" placeholder="Saississez un type" required>
                            </div>

                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Description <span class="text-danger text-bold"></span></label>
                              <textarea type="text" class="form-control" id="description_tpr" name="description" aria-=""></textarea>
                            </div>


                        </div>
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-link" type="button" data-bs-dismiss="modal"><i class="icon-cross2 font-size-base menu-icon tf-icons"></i> Fermer</button>
                        <button type="submit" class="btn bg-primary text-white"><i class="icon-checkmark3 font-size-base menu-icon tf-icons"></i> Valider</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- End edit modal --}}
        <script>
            $(document).ready(function(){
              $(document).on('click','.prog_edit',function(){
                  var ids=$(this).attr("id");
                  var lien="./prog_edit/"
                  var liena='./prog_update/'
                  $('#editprog').attr('action',liena+ids)
                 $('#type_programme_edit').modal('show')
                 $.ajax({
                      url:lien+ids,
                      method: "GET",
                      success: function (response) {
                          console.log(response);
                      $('#nom_tpr').val(response.Programme.nom_tpr);
                      $('#description_tpr').val(response.Programme.description_tpr);

                      }
                      });
                });
                });
      </script>

     <script>
            $(document).ready(function(){
              $(document).on('click','.part_edit',function(){
                  var ids=$(this).attr("id");
                  var lien="./part_edit/"
                  var liena='./part_update/'
                  $('#editpart').attr('action',liena+ids)
                 $('#type_partenaire_edit').modal('show')
                 $.ajax({
                      url:lien+ids,
                      method: "GET",
                      success: function (response) {
                          console.log(response);
                      $('#nom_tpt').val(response.Partenaire.nom_tpt);
                      $('#description_tpt').val(response.Partenaire.description_tpt);

                      }
                      });
                });
                });
      </script>

        <script>
            $(document).ready(function(){
              $(document).on('click','.thema_edit',function(){
                  var ids=$(this).attr("id");
                  var lien="./thema_edit/"
                  var liena='./thema_update/'
                  $('#editthema').attr('action',liena+ids)
                 $('#thema_edit').modal('show')
                 $.ajax({
                      url:lien+ids,
                      method: "GET",
                      success: function (response) {
                          console.log(response);
                      $('#nom_thema').val(response.Thematique.nom_tmq);
                      $('#description_thema').val(response.Thematique.description_tmq);
                      $('#image_thema').val(response.Thematique.photo_tmq);

                      }
                      });
                });
                });
      </script>
        <script>
            $(document).ready(function(){
                $(document).on('click','.fonct_edit',function(){
                    var ids=$(this).attr("id");
                    var lien="./fonc_edit/"
                    var liena='./fonc_update/'
                    $('#editfonct').attr('action',liena+ids)
                   $('#fonction_edit').modal('show')
                   $.ajax({
                        url:lien+ids,
                        method: "GET",
                        //data: {id_beneficiaire: id_beneficiaire},
                        success: function (response) {
                            console.log(response);
                        $('#nom_fonc').val(response.Fonction.nom_fnct);
                        $('#description_fonc').val(response.Fonction.description_fnct);
                        $('#agence_fonc').val(response.Fonction.agence_fnct);
                        }
                        });
            });
            });
        </script>

<script>
    $(document).ready(function(){
        $(document).on('click','.cat_edit',function(){
            var ids=$(this).attr("id");
            var lien="./cat_edit/"
            var liena='./cat_update/'
            $('#editcat').attr('action',liena+ids)
           $('#categorie_edit').modal('show')
           $.ajax({
                url:lien+ids,
                method: "GET",
                success: function (response) {
                    console.log(response);
                $('#nom_cat').val(response.Categorie.nom_cat);
                $('#code_cat').val(response.Categorie.code_cat);
                }
                });
    });
    });
</script>

<script>
      $(document).ready(function(){
        $(document).on('click','.unit_edit',function(){
            var ids=$(this).attr("id");
            var lien="./unit_edit/"
            var liena='./unit_update/'
            $('#editunit').attr('action',liena+ids)
           $('#unit_edit').modal('show')
           $.ajax({
                url:lien+ids,
                method: "GET",
                success: function (response) {
                    console.log(response);
                $('#code_unit').val(response.Unite.code_uti);
                $('#nom_unit').val(response.Unite.nom_uti);
                }
                });
    });
    });
</script>
@endsection

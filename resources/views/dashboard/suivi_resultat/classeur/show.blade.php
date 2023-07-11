@extends('dashboard.layouts.dashboard', ['title' => 'fiches dynamiques'])

@section('page_header')
<!-- Page header -->
<style>
    .dropdown-menu.hdropdown li {
        padding: 6px 12px;
        text-align: left;
        background: #fafbfc;
        border-bottom: 1px solid #eaeaea
    }
</style>
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <span class="breadcrumb-item">Suivi des résultats</span>
                <span class="breadcrumb-item">fiches dynamiques</span>
                <span class="breadcrumb-item active">Feuilles ({{ $tableName }})</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">

            <div class="breadcrumb justify-content-center">
                <a href="#" class=" btn bg-teal-400 btn-block mb-2 mt-2" data-toggle="modal" data-target="#modal_iconified">
                    <i class="icon-database-export mr-2"></i>
                    Exporter
                </a>
            </div>&nbsp;&nbsp;&nbsp;&nbsp;
            <div class="breadcrumb justify-content-center">
                <a href="#" class=" btn bg-teal-400 btn-block mb-2 mt-2" data-toggle="modal" data-target="#modal_iconified">
                    <i class="icon-add mr-2"></i>
                    Nouvelle donnée
                </a>
            </div>&nbsp;&nbsp;&nbsp;&nbsp;

            <div class="breadcrumb justify-content-center ">
                <div class="col-lg-2 col-md-1 col-sm-2 " style="">

                    <a class="dropdown-toggle btn mb-2 mt-2 btn-bl bg-teal-400 " href="#" data-toggle="dropdown" aria-expanded="false"><i class="icon-cogs mr-2"></i></a>
                    <ul class="dropdown-menu hdropdown style5">

                        <li>
                            <a href="#" data-toggle="modal" data-target="#modifier_feuille"><span class="icon-pencil mr-2 text-info"></span>
                                <span class="text-info">Modifier la feuille</span>
                            </a>
                        </li>
                        <li>
                            <!-- Bouton de suppression avec confirmation -->
                            <a href="#" data-toggle="modal" data-target="#modal_confirm">
                                <span class="icon-trash text-danger"></span>
                                <span class="text-danger">Supprimer la feuille</span>
                            </a>

                            <!-- Boîte de dialogue modale pour confirmation de suppression -->


                        </li>

                        <li>
                            <a href="#" data-toggle="modal" data-target="#ajouter_colonne">
                                <span class=" icon-plus-circle2 "></span>
                                Ajouter une colonne
                            </a>
                        </li>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#supprimer_colonne">
                                <span class="icon-trash  text-danger"></span>
                                <span class="text-danger">Supprimer une colonne</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#modifier_colonne">
                                <span class="icon-pencil  text-info"></span>
                                <span class="text-info">Modifier une colonne</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" data-toggle="modal" data-target="#modal_iconified">
                                <span class="icon-transmission "></span>
                                Deplacer une colonne
                            </a>
                        </li>

                    </ul>
                </div>

            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
    </div>
</div>
<!-- /page header -->
@endsection

@section('content')
<div class="card">
    <div class="tab-content">

        <div class="tab-pane fade show active" id="region">
            <table class="table table-striped datatable-responsive datatable-header-basic" id="DataTables_Table_0">
                <thead>
                    @foreach ($colonne as $column)
                    <th>{{ $column->nom_colonne }}</th>
                    @endforeach

                    <th>Actions</th>
                </thead>
                <tbody>
                    @if (isset($donnees))
                    @foreach ($donnees as $data)
                    <tr>
                        @foreach ($colonne as $column)
                        <td>{{ $data->{$column->champ} }}</td>
                        @endforeach
                        <td class="text-center">

                            <a href="#"   class="icon-pencil7 text-info modaledit_data" id="{{ $data->id }}" tabindex="{{$tableName}}" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                            </a>
                            {{-- <a href="" class="icon-pencil7 text-info modaledit_data" id="{{ $data->id }}" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                            </a> --}}

                            <a href="{{ route('classeur.supprimer', ['id' => $data->id, 'table' => $tableName]) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $data->id }}');">
                            </a>
                            <form id="delete-form-{{ $data->id }}" action="{{ route('classeur.supprimer', ['id' => $data->id, 'table' => $tableName]) }}" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="modal_confirm" tabindex="-1" role="dialog" aria-labelledby="modal_confirm_label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal_confirm_label">Confirmation de suppression</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Êtes-vous sûr de vouloir supprimer cette feuille ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <a href="{{ route('feuille_delete', ['id' => $feuilles->id_f]) }}" class="btn btn-danger">Supprimer</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Iconified modal -->
    <div id="modal_edit" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" id="" action="" method="POST">

                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="modal-header bg-primary">
                    <h5 class="modal-title"><i class="icon-design mr-2"></i> Ajouter un classeur</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                    <div class="row mb-2">

                        <div class="col-md-12 mb-12">
                            <label for="inputEmail4" class="text-black">Nom <span class="text-danger text-bold">*</span></label>
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="nom" required>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Fermer</button>
                    <button type="submit" class="btn bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> Valider</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Iconified modal -->
    <div id="modifier_feuille" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" method="POST" action="{{ route('feuilles.update', $feuilles) }}">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}

                <div class="modal-header bg-primary">
                    <h5 class="modal-title"><i class="icon-design mr-2"></i> Modifier la Feuille</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                    <div class="row mb-2">
                        <div class="col-md-6 mb-12">
                            <input type="hidden" class="form-control" value="{{$id_classeur}}" id="id_classeur" name="id_classeur" aria-describedby="sigle">
                            <label for="inputEmail4" class="text-black">Nom feuille <span class="text-danger text-bold">*</span></label>
                            <input type="text" class="form-control" id="nom" value="{{$feuilles->nom_f}}" name="nom" placeholder="nom" required>
                        </div>
                        <div class="col-md-6 mb-12">
                            <label for="inputEmail4" class="text-black">Nom table <span class="text-danger text-bold">*</span></label>
                            <input type="text" class="form-control" id="table_name" value="{{$tableName}}" name="table_name" placeholder="table_name" required>
                        </div>
                        <br>

                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Fermer</button>
                    <button type="submit" class="btn bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> Valider</button>
                </div>
            </form>
        </div>
    </div>


    <!-- Modal de confirmation de suppression -->
    <!-- Modal de confirmation de suppression -->
    <div class="modal fade" id="modal_confirm1" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmation de suppression</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Êtes-vous sûr de vouloir supprimer cette colonne ?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <a href="{{ route('feuille_delete', ['id' => $feuilles->id_f]) }}" class="btn btn-danger">Supprimer</a>
                </div>
            </div>
        </div>
    </div>


    <div id="modal_iconified" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" action="{{ route('storeData') }}" method="POST">
                @csrf
                <input type="hidden" name="tableName" value="{{ $tableName }}">

                <div class="modal-header bg-primary">
                    <h5 class="modal-title"><i class="icon-design mr-2"></i> Nouvelle Donnée ({{ $tableName }})</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="row mb-2">
                        <input type="hidden" name="tableName" value="{{ $tableName }}">

                        @foreach ($columns as $column)
                        @if ($column !== 'id')
                        @php
                        $columnType = DB::connection()->getDoctrineColumn($tableName, $column)->getType()->getName();

                        $inputType = ($columnType === 'integer') ? 'number' : 'text';
                        @endphp
                        @foreach ($colonne as $col)
                        @if ($col->champ === $column)
                        <div class="col-md-6 mb-12">
                            <label class="text-black" for="{{ $column }}">{{ $col->nom_colonne }}::</label>
                            <input class="form-control" type="{{ $inputType }}" id="{{ $column }}" name="{{ $column }}">
                        </div>
                        @endif
                        @endforeach
                        @endif
                        @endforeach
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Fermer</button>
                    <button type="submit" class="btn bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> Valider</button>
                </div>
            </form>
        </div>
    </div>
    <div id="ajouter_colonne" class="modal fade" tabindex="-1">
        <div class="modal-dialog">

            <form class="modal-content" method="POST" action="{{ route('ajout_colonne') }}">
                @csrf
                @method('POST')

                <input type="hidden" name="tableName" value="{{ $tableName }}">

                <div class="modal-body">

                    <div class="row mb-2">

                        <br>
                        <div class="col-md-12 mb-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Nom </th>
                                        <th scope="col">Libellé</th>
                                        <th scope="col">Type</th>
                                        <!-- <th scope="col">Action</th> -->
                                    </tr>
                                </thead>
                                <tbody id="dynamicadd">
                                    @foreach($columns as $column)
                                    @if ($column !== 'id')
                                    @php
                                    $columnType = DB::connection()->getDoctrineColumn($tableName, $column)->getType()->getName();
                                    $inputType = ($columnType === 'integer') ? 'number' : 'text';
                                    @endphp
                                    <tr>
                                        <td>
                                            @foreach ($colonne as $col)
                                            @if ($col->champ === $column)
                                            <!-- <label class="text-black" for="{{ $column }}">{{ $column }}</label> -->
                                            <input class="form-control" type="{{ $inputType }}" value="{{ $col->nom_colonne }}" id="{{ $column }}" name="{{ $column }}" disabled>
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <input type="text" name="column_label[]" class="form-control" value="{{ $column }}" readonly>
                                        </td>
                                        <td>
                                            <select name="column_type[]" class="form-control" disabled>
                                                <option value="string" {{ $columnType === 'string' ? 'selected' : '' }}>String</option>
                                                <option value="integer" {{ $columnType === 'integer' ? 'selected' : '' }}>Integer</option>
                                                <option value="float" {{ $columnType === 'float' ? 'selected' : '' }}>Float</option>
                                                <option value="boolean" {{ $columnType === 'boolean' ? 'selected' : '' }}>Boolean</option>
                                            </select>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    <tr>
                                        <td colspan="3">
                                            <button type="button" id="add" class="btn btn-success btn-sm">+</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Fermer</button>
                    <button type="submit" class="btn bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> Valider</button>
                </div>
            </form>
        </div>
    </div>
    <div id="supprimer_colonne" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <form class="modal-content" method="POST" action="#">
                @csrf
                @method('POST')

                <input type="hidden" name="tableName" value="{{ $tableName }}">

                <div class="modal-body">
                    <div class="row mb-2">
                        <br>
                        <div class="col-md-12 mb-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Libellé</th>
                                        <th scope="col">Type</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="dynamicadde">
                                    @foreach($columns as $column)
                                    @if ($column !== 'id')
                                    @php
                                    $columnType = DB::connection()->getDoctrineColumn($tableName, $column)->getType()->getName();
                                    $inputType = ($columnType === 'integer') ? 'number' : 'text';
                                    @endphp
                                    <tr>
                                        <td>
                                            @foreach ($colonne as $col)
                                            @if ($col->champ === $column)
                                            <input class="form-control col_id_f" type="hidden" value="{{ $col->id_col }}" disabled>
                                            <input class="form-control del_name" type="text" value="{{ $col->nom_colonne }}" id="{{ $column }}" name="{{ $column }}" disabled>
                                            @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            <input type="hidden" name="table_name" class="delbtn_feuille form-control" value="{{ $tableName }}">
                                            <input type="text" name="column_label[]" class="form-control delbtn_val" value="{{ $column }}" readonly>
                                        </td>
                                        <td>
                                            <select name="column_type[]" class="form-control" disabled>
                                                <option value="string" {{ $columnType === 'string' ? 'selected' : '' }}>String</option>
                                                <option value="integer" {{ $columnType === 'integer' ? 'selected' : '' }}>Integer</option>
                                                <option value="float" {{ $columnType === 'float' ? 'selected' : '' }}>Float</option>
                                                <option value="boolean" {{ $columnType === 'boolean' ? 'selected' : '' }}>Boolean</option>
                                            </select>
                                        </td>
                                        <td>
                                            <a href="#" type="button" data-dismiss="modal" class="btn delbtn btn-danger btn-sm btn-confirm-delete" data-column="{{ $column }}"><i class="icon-cross2"></i></a>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Annuler</button>
                    {{-- <button type="submit" class="btn bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> Valider</button> --}}
                </div>
            </form>
        </div>
    </div>
    <div id="delete_mod" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            {{-- <div class="modal-header bg-primary">
                <h5 class="modal-title"><i class="icon-design mr-2"></i> suppression dans ({{ $tableName }})</h5>
            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
        </div> --}}
        <form class="modal-content" action="{{ route('colonne_delete') }}" method="POST">
            @csrf
            <div class="row mb-2">
                <input type="hidden" name="id_colc" id="id_col_f">
                <input type="hidden" name="tableName" value="{{ $tableName }}">
            </div>
            <div class="row mb-2">
                <input type="hidden" name="del_name" id="name_del">

                <input type="hidden" name="col_name" id="name_colone">
            </div>
            <div class="text-center">
                Êtes-vous sûr de vouloir supprimer cette colonne ?
            </div>
            <br>
            <div class="modal-footer">
                <button class="btn btn-secondary" data-toggle="modal" data-target="#supprimer_colonne" type="button" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn bg-danger">Supprimer</button>
            </div>

        </form>
    </div>
</div>
<div id="modifier_colonne" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="POST" action="#">

            <input type="hidden" name="tableName" value="{{ $tableName }}">

            <div class="modal-body">
                <div class="row mb-2">
                    <br>
                    <div class="col-md-12 mb-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col">Libellé</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($columns as $column)
                                @if ($column !== 'id')
                                @php
                                $columnType = DB::connection()->getDoctrineColumn($tableName, $column)->getType()->getName();
                                $inputType = ($columnType === 'integer') ? 'number' : 'text';
                                @endphp
                                <tr>
                                    <td>
                                        @foreach ($colonne as $col)
                                        @if ($col->champ === $column)
                                        <input class="form-control col_id" type="hidden" value="{{ $col->id_col }}" disabled>
                                        <input class="form-control edit_libelle" type="text" value="{{ $col->nom_colonne }}" id="{{ $column }}" name="{{ $column }}" disabled>
                                        @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <input type="text" name="column_label[]" class="form-control edit_col" value="{{ $column }}" disabled>
                                    </td>
                                    <td>
                                        <select name="column_type[]" class="form-control edit_type" disabled>
                                            <option value="string" {{ $columnType === 'string' ? 'selected' : '' }}>String</option>
                                            <option value="integer" {{ $columnType === 'integer' ? 'selected' : '' }}>Integer</option>
                                            <option value="float" {{ $columnType === 'float' ? 'selected' : '' }}>Float</option>
                                            <option value="boolean" {{ $columnType === 'boolean' ? 'selected' : '' }}>Boolean</option>
                                        </select>
                                    </td>
                                    <td>
                                        <button type="button" data-dismiss="modal" class="btn editbtn btn-primary btn-sm " data-column="{{ $column }}"><i class="icon-pencil7"></i></button>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Annuler</button>
                {{-- <button type="submit" class="btn bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> Valider</button> --}}
            </div>
        </form>
    </div>
</div>
<div id="edite_md" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        {{-- <div class="modal-header bg-primary">
                <h5 class="modal-title"><i class="icon-design mr-2"></i> suppression dans ({{ $tableName }})</h5>
        <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
    </div> --}}
    <form class="modal-content" action="{{ route('colonne_update') }}" method="POST">
        @csrf
        <div class="modal-body">
            <div class="row mb-2">
                <br>
                <div class="col-md-12 mb-12">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Libellé</th>
                                <th scope="col">Type</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>

                                <td>
                                    <input type="hidden" class="form-control" name="col_id" id="col_id">
                                    <input type="text" name="col_name" id="name_lib" class="form-control" required>
                                    <input type="hidden" class="form-control" name="feuille" value="{{ $tableName }}">

                                </td>
                                <td>

                                    <input type="text" name="col_lib" id="name_col" class="form-control" required>
                                    <input type="hidden" class="form-control" name="acien" id="acien">

                                </td>

                                <td>
                                    <select name="col_type" class="form-control" id="name_typ" required>
                                        <option value="string">String</option>
                                        <option value="integer">Integer</option>
                                        <option value="float">Float</option>
                                        <option value="boolean">Boolean</option>
                                    </select>
                                </td>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal" data-toggle="modal" data-target="#modifier_colonne">Annuler</button>
            <button type="submit" class="btn bg-primary">Modifier</button>
        </div>

    </form>
</div>
</div>
<div id="modal_edit_data" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" id="editform_data" action="" method="POST">
            {{ csrf_field() }}
            {{ method_field('PATCH') }}

            <div class="modal-header bg-primary">
                <h5 class="modal-title"><i class="icon-design mr-2"></i> Modification Donnée ({{ $tableName }})</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="row mb-2">
                    <input type="hidden" name="tableName" value="{{ $tableName }}">

                    @foreach ($columns as $column)
                    @if ($column !== 'id')
                    @php
                    $columnType = DB::connection()->getDoctrineColumn($tableName, $column)->getType()->getName();

                    $inputType = ($columnType === 'integer') ? 'number' : 'text';
                    @endphp
                    @foreach ($colonne as $col)
                    @if ($col->champ === $column)
                    <div class="col-md-6 mb-12">
                        <label class="text-black" for="{{ $column }}">{{ $col->nom_colonne }}::</label>
                        <input class="form-control" type="{{$inputType }}" id="{{ $column }}" name="{{ $column }}">
                    </div>
                    @endif
                    @endforeach
                    @endif
                    @endforeach
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Fermer</button>
                <button type="submit" class="btn bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> Vaider</button>
            </div>
        </form>
    </div>
</div>
<!-- /iconified modal -->
</div>
<script>
    $(document).ready(function() {

        $('.editbtn').click(function(e) {

            e.preventDefault();
            var col_id = $(this).closest('tr').find('.col_id').val();
            var acien = $(this).closest('tr').find('.edit_col').val();
            var col_name = $(this).closest('tr').find('.edit_col').val();
            var type = $(this).closest('tr').find('.edit_type').val();
            var Libelle = $(this).closest('tr').find('.edit_libelle').val();
            // alert(col_name+' | '+ Libelle +' | '+type)
            $('#name_typ').val(type)
            $('#name_lib').val(Libelle)
            $('#name_col').val(col_name)
            $('#col_id').val(col_id)
            $('#acien').val(col_name)
            $('#edite_md').modal('show')
        });

        $(document).on('click', '.modaledit_data', function() {
        var id = $(this).attr("id");
        var table = $(this).attr("tabindex");
        console.log(table);
        var page = false;

        var lien = "../data_edition/"
        var liena = '../data_update/'

        $('#editform_data').attr('action', liena + id + '/' + table)
        $('#modal_edit_data').modal('show')
        //alert(page)
        $.ajax({
            url: lien + id + '/' + table,
            method: "GET",
            success: function(response) {
                //console.log(response);
                $.each(response.data, function(index, valeur) {
                    console.log('#' + index);
                    $('#' + index).val(valeur);
                });
            }
        });

    });

    });
</script>
<script>
    $(document).ready(function() {

        $('.delbtn').click(function(e) {

            e.preventDefault();
            var del_name = $(this).closest('tr').find('.del_name').val();
            var col_name = $(this).closest('tr').find('.delbtn_val').val();
            var feuille_name = $(this).closest('tr').find('.delbtn_feuille').val();
            var id_col_f = $(this).closest('tr').find('.col_id_f').val();
            $('#name_colone').val(col_name)
            $('#name_del').val(del_name)
            $('#id_col_f').val(id_col_f)
            $('#delete_mod').modal('show')
        });

    });
</script>
<script>
    $(document).ready(function() {

        var i = 1;
        $('#add').click(function() {
            //alert('ok');
            i++;
            $('#dynamicadd').append('<tr id="row' + i + '"><td><input type="text" name="column_label_[]"id="column_label_' + i + '" class="form-control"></td><td><input type="text" name="column_name_[]" id="column_name_' + i + '"class="form-control"></td><td><select name="column_type_[]" id="column_type_' + i + '" class="form-control"> <option value="string">String</option> <option value="integer">Integer</option> <option value="float">Float</option><option value="boolean">Boolean</option></select></td> <td><button type="button" id="' + i + '" class="btn btn-danger btn-sm remove_row">x</button></td></tr>');
        });
        $(document).on('click', '.modaledit', function() {
            var ids = $(this).attr("id");
            var page = false;

            var lien = "./feuille_edit/"
            var liena = './feuille_update/'

            $('#editform').attr('action', liena + ids)
            $('#modal_edit').modal('show')
            //alert(page)
            $.ajax({

                url: lien + ids,
                method: "GET",
                //data: {id_beneficiaire: id_beneficiaire},
                success: function(response) {
                    console.log(response);

                    $('#nom').val(response.feuille.nom_f);
                }
            });

        });


        $(document).on('click', '.remove_row', function() {
            var row_id = $(this).attr("id");
            $('#row' + row_id + '').remove();
        });
    });
    $(document).on('click', '.modaledit_data', function() {
        var id = $(this).attr("id");
        var table = $(this).attr("tabindex");
        console.log(table);
        var page = false;

        var lien = "../data_edition/"
        var liena = '../data_update/'

        $('#editform_data').attr('action', liena + id + '/' + table)
        $('#modal_edit_data').modal('show')
        //alert(page)
        $.ajax({
            url: lien + id + '/' + table,
            method: "GET",
            success: function(response) {
                //console.log(response);
                $.each(response.data, function(index, valeur) {

                    console.log('#' + index);
                    $('#' + index).val(valeur);
                });
            }
        });

    });
</script>


@endsection

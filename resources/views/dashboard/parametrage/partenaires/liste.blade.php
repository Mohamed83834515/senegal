@extends('dashboard.layouts.dashboard', ['title' => 'partenaires'])

@section('page_header')
<!-- Page header -->
<div class="page-header page-header-light">

    <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
        <div class="d-flex">
            <div class="breadcrumb">
                <a href="{{ route('dashboard.home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Accueil</a>
                <span class="breadcrumb-item">Paramétrage</span>
                <span class="breadcrumb-item active">Partenaires</span>
            </div>

            <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
        </div>

        <div class="header-elements d-none">
            <div class="breadcrumb justify-content-center">
                <a href="#" class="btn bg-teal-400 btn-block mb-2 mt-2 " data-toggle="modal" data-target="#modal_iconified">
                    <i class="icon-add mr-2"></i>
                    Ajouter un partenaire
                </a>
            </div>
        </div>
    </div>
</div>
<!-- /page header -->
@endsection

@section('content')
<div class="card">
    <table class="table table-striped datatable-responsive datatable-header-basic" id="DataTables_Table_0">
        <thead>
            <tr>
                <th>Logo</th>
                <th>Code</th>
                <th>Sigle</th>
                <th>Nom</th>
                <th>Type partenaire</th>
                <th>Contact</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($partenaires as $partenaire)
                <tr>
                    <td>
                        @if ($partenaire->logo_pat)
                            <a href="{{ asset("uploads/partenaires/").'/'.$partenaire->logo_pat }}" data-popup="lightbox">
                                <img src="{{ asset("uploads/produits/").'/'.$partenaire->logo_pat }}" alt="" class="img-preview rounded">
                            </a>
                        @else
                            <a href="{{ asset("dashboard/global_assets/images/placeholders/placeholder.jpg") }}" data-popup="lightbox">
                                <img src="{{ asset("dashboard/global_assets/images/placeholders/placeholder.jpg") }}" alt="" class="img-preview rounded">
                            </a>
                        @endif
                    </td>
                    <td>{{ $partenaire->code_pat }}</td>
                    <td>{{ $partenaire->sigle_pat }}</td>
                    <td>{{ $partenaire->definition_pat}}</td>
                    <td>
                        @if($partenaire->type_pat)
                             @foreach ($partenaire->type_pat as $pat)
                            @php
                                $type = $types->where('id_tpt', '=', $pat)->first();
                            @endphp
                            {{ $type->nom_tpt }}
                            @if (!$loop->last)
                                ,
                            @endif
                        @endforeach                            
                        @endif
                       
                    </td>

                    <td>{{ $partenaire->contact_pat}}</td>
                    <td class="text-center">
                        <a href="{{ route('partenaire.edit', $partenaire) }}" class="icon-pencil7 text-info" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                            {{-- <i class="far fa-edit"></i> --}}
                        </a>
                        <a href="{{ route('partenaire.destroy', $partenaire) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-{{ $partenaire->id_pat }}');">
                            {{-- <i class="far fa-trash-alt"></i> --}}
                        </a>
                        <form id="delete-form-{{ $partenaire->id_pat }}" action="{{ route('partenaire.destroy', $partenaire) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

        <!-- Iconified modal -->
        <div id="modal_iconified" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <form class="modal-content" method="POST" action="{{ route('partenaire.store') }}">
                    @csrf
                    @method('POST')

                    <div class="modal-header bg-primary">
                        <h5 class="modal-title"><i class="icon-design mr-2"></i> &nbsp;Nouveau partenaire</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <div class="row mb-2">

                            <div class="col-md-6 mb-2">
                                <label for="inputEmail4" class="text-black">Code du partenaire <span class="text-danger text-bold">*</span></label>
                                <input type="text" class="form-control" id="code" name="code" placeholder="Reveil" aria-describedby="code" placeholder="Saississez le code" required>
                            </div>

                            <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Sigle <span class="text-danger text-bold"></span></label>
                                <input type="text" class="form-control" name="sigle" aria-describedby="sigle"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Nom complet <span class="text-danger text-bold"></span></label>
                                <textarea type="text" class="form-control" name="definition" aria-describedby="definition"></textarea>
                            </div>
                               <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Type partenaire <span class="text-danger text-bold"></span></label>

                        <select class="form-control select @error('type') is-invalid @enderror" name="type[]" aria-describedby="type" data-placeholder="choisissez les types" data-fouc multiple>
                                @foreach ($types as $type)
                                    <option data-icon="" value="{{$type->id_tpt}}"
                                        {{ check_module_selected(old('type'), $type->id_tpt) ? 'selected' : '' }}>
                                        {{ $type->nom_tpt }}
                                    </option>

                                @endforeach
                            </select>
                            </div>
                               <div class="col-md-6">
                                <label for="inputEmail4" class="text-black">Contact <span class="text-danger text-bold"></span></label>
                                <input type="text" class="form-control" name="contact" aria-describedby="contact"></textarea>
                            </div>
                               <div class="col-md-12">
                                <label for="inputEmail4" class="text-black">Email <span class="text-danger text-bold"></span></label>
                                <input type="email" class="form-control" name="email" aria-describedby="email"></textarea>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="col-lg-12 col-form-label font-weight-semibold">Image:</label>
                                    <div class="col-lg-12">
                                        <input type="file" class="file-input" name="image" data-fouc>
                                        <span class="form-text text-muted">Taille max (10 mb).</span>
                                    </div>
                                </div>
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
        <!-- /iconified modal -->
</div>
@endsection

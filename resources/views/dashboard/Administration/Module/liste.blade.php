@extends('dashboard.layouts.dashboard', ['title' => 'Modules'])

@section('page_header')
<div class="page-header-content header-elements-md-inline">
    <div class="d-flex">
        <div class="breadcrumb">
            <a href="#" class="breadcrumb-item p-0"><i class="icon-home2 mr-2"></i> Acceuil</a>
            <span class="breadcrumb-item">Administration</span>
            <span style="font-size: 16px;color:#e79300;" class="breadcrumb-item active">Module</span>
       </div>
    </div>
    <div class="header-elements d-none py-0 mb-3 mb-md-0">
        <a href="#" data-toggle="modal" data-target="#modal_iconified" class="btn bg-teal-400 mr-2">Ajouter un module</a>
        <a href="#" data-toggle="modal" data-target="#modal_iconif" class="btn bg-teal-400 mr-2">Gestion Rang</a>
    </div>
    {{-- <div class="header-elements d-none py-0 mb-3 mb-md-0">
        <a href="{{ route('module.create') }}" class="btn bg-teal">Ajouter un module</a>
    </div> --}}
</div>
@endsection

@section('content')
<!-- Basic initialization -->
<div class="card">
    @if ($errors->any())
    <div class="alert bg-danger text-white alert-styled-left alert-dismissible">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
        <ul class="pl-1">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
   @endif
    <table class="table table-striped datatable-responsive datatable-header-basic">
        <thead>
            <tr>
                <th>Nom du module</th>
                <th>Module parent</th>
                <th>Lien</th>
                <th>Classe css</th>
                <th>Icône</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($modules as $module)
                <tr>
                    <td>{{ $module->libelle }}</td>
                    <td>{{ $module->parent_module ? $module->parent_module->libelle : 'Aucun' }}</td>
                    <td>{{ $module->lien }}</td>
                    <td>{{ $module->class }}</td>
                    <td><i class="{{ $module->icone }}"></i></td>
                    <td class="text-center">
                        {{-- <a href="{{ route('module.edit', $module) }}" class="icon-pencil7 text-info" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                        </a> --}}
                        <a href="#" class="icon-pencil7 text-info modaledit" id="{{ $module->id }}" data-toggle="tooltip" data-placement="bottom" title="Modifier un module">
                        </a>
                        <a href="{{ route('module.destroy', $module) }}" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','logout-form-{{ $module->id }}');">
                            {{-- <i class="far fa-trash-alt"></i> --}}
                        </a>
                        <form id="logout-form-{{ $module->id }}" action="{{ route('module.destroy', $module) }}" method="POST" style="display: none;">
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
        <form class="modal-content" method="POST" action="{{ route('module.store') }}">
            @csrf
            @method('POST')

            <div class="modal-header bg-primary">
                <h5 class="modal-title"><i class="icon-design mr-2"></i> Nouveau Module</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

                <div class="row mb-2">



                    <div class="col-md-6 mb-2">
                        <div class="form-group mb-3">
                            <label for="inputEmail4" class="text-black">Module parent</label>
                            <select class="form-control @error('idsmo') is-invalid @enderror" name="idsmo" aria-describedby="idsmo">
                                <option value="0">Sélectionner le module parent</option>
                                @foreach ($modules as $module)
                                    <option value="{{ $module->id }}" {{ old('idsmo') == $module->id ? 'selected' : ''  }}>{{ $module->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                     </div>
                    <div class="col-md-6 mb-2">
                        <div class="form-group mb-3">
                            <label for="inputEmail4" class="text-black">Nom <span class="text-danger text-bold">*</span></label>
                            <input type="text" class="form-control @error('libelle') is-invalid @enderror" id="libelle" name="libelle" aria-describedby="libelle" placeholder="Saississez le nom du module" value="{{ old('libelle') }}" required>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <div class="form-group mb-3">
                            <label for="inputEmail4" class="text-black">Icône <span class="text-danger text-bold">*</span></label>
                            <input type="text" class="form-control @error('icone') is-invalid @enderror" id="icone" name="icone" aria-describedby="icone" placeholder="Saississez l'icône à utiliser" value="{{ old('icone') }}" required>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <div class="form-group mb-3">
                            <label for="inputEmail4" class="text-black">Lien <span class="text-danger text-bold">*</span></label>
                            <input type="text" class="form-control @error('lien') is-invalid @enderror" id="lien" name="lien" aria-describedby="lien" placeholder="Saississez le lien à utiliser" value="{{ old('lien') }}" required>
                        </div>
                     </div>

                     <div class="col-md-12 mb-2">
                        <div class="form-group mb-3">
                            <label for="inputEmail4" class="text-black">Classe css</label>
                            <input type="text" class="form-control @error('class') is-invalid @enderror" id="class" name="class" aria-describedby="class" placeholder="Saississez les classes css à utiliser" value="{{ old('class') }}">
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
<div id="modal_iconif" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="POST" action="">
            {{-- {{ csrf_field() }}
            {{ method_field('PATCH') }} --}}
            <div class="modal-header bg-primary">
                <h5 class="modal-title"><i class="icon-design mr-2"></i> Gestion du rang (Module)</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

                <div class="row mb-2">

                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Module</th>
                                <th width="100">Rang</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rangmodule as $rang)
                                <tr>
                                    <td>{{ $rang->libelle }}</td>
                                    <td><a href="#" class="editable" data-type="text" data-name="rang" data-pk="{{ $rang->id }}"> {{ $rang->rang }} </a> </td>
                                    <td>No action</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Fermer</button>
                <a href="" class="btn bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> Enrégistrer</a>
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
                <button type="button" data-bs-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

                <div class="row mb-2">



                    <div class="col-md-6 mb-2">
                        <div class="form-group mb-3">
                            <label for="inputEmail4" class="text-black">Module parent</label>
                            <select class="form-control @error('idsmo') is-invalid @enderror" id="idsmo_up" name="idsmo" aria-describedby="idsmo">
                                <option value="0">Sélectionner le module parent</option>
                                @foreach ($modules as $module)
                                    <option value="{{ $module->id }}" {{ old('idsmo') == $module->id ? 'selected' : ''  }}>{{ $module->libelle }}</option>
                                @endforeach
                            </select>
                        </div>
                     </div>
                    <div class="col-md-6 mb-2">
                        <div class="form-group mb-3">
                            <label for="inputEmail4" class="text-black">Nom <span class="text-danger text-bold">*</span></label>
                            <input type="text" class="form-control @error('libelle') is-invalid @enderror" id="libelle_up" name="libelle" aria-describedby="libelle" placeholder="Saississez le nom du module" value="{{ old('libelle') }}" required>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <div class="form-group mb-3">
                            <label for="inputEmail4" class="text-black">Icône <span class="text-danger text-bold">*</span></label>
                            <input type="text" class="form-control @error('icone') is-invalid @enderror" id="icone_up" name="icone" aria-describedby="icone" placeholder="Saississez l'icône à utiliser" value="{{ old('icone') }}" required>
                        </div>
                    </div>

                    <div class="col-md-6 mb-2">
                        <div class="form-group mb-3">
                            <label for="inputEmail4" class="text-black">Lien <span class="text-danger text-bold">*</span></label>
                            <input type="text" class="form-control @error('lien') is-invalid @enderror" id="lien_up" name="lien" aria-describedby="lien" placeholder="Saississez le lien à utiliser" value="{{ old('lien') }}" required>
                        </div>
                     </div>

                     <div class="col-md-12 mb-2">
                        <div class="form-group mb-3">
                            <label for="inputEmail4" class="text-black">Classe css</label>
                            <input type="text" class="form-control @error('class') is-invalid @enderror" id="class_up" name="class" aria-describedby="class" placeholder="Saississez les classes css à utiliser" value="{{ old('class') }}">
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-link" data-bs-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Fermer </button>
                {{-- <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Fermer</button> --}}
                <button type="submit" class="btn bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> Vaider</button>
            </div>
        </form>
    </div>
</div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/jquery-editable/js/jquery-editable-poshytip.min.js"></script>

<script>
    $.fn.editable.defaults.mode = "inline";
    $.ajaxSetup({
        headers:{
           'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
    });
    $('.editable').editable({
        url: "{{ route('rang.update') }}",
        type: 'text',
        pk:1,
        name:'rang',
        title:'entrer'
    });
</script>
<script>
    $(document).ready(function(){
        $(document).on('click','.modaledit',function(){
            var ids=$(this).attr("id");

           var lien="./module_edit/"
           var liena='./module_update/'

            $('#editform').attr('action',liena+ids)
           $('#modal_edite').modal('show')
           //alert(page)
           $.ajax({

                url:lien+ids,
                method: "GET",
                success: function (response) {
                    console.log(response);
                $('#idsmo_up').val(response.Module.idsmo);
                $('#libelle_up').val(response.Module.libelle);
                $('#lien_up').val(response.Module.lien);
                $('#icone_up').val(response.Module.icone);
                $('#class_up').val(response.Module.class);
                }
                 });

    });

    });
</script>
@endsection

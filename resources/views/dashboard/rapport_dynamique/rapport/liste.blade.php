@extends('dashboard.layouts.dashboard', ['title' => 'Rapport_dynamique'])
@section('page_header')
<div class="page-header-content header-elements-md-inline">

    <div class="d-flex">
        <div class="breadcrumb">
            <a href="#" class="breadcrumb-item p-0"><i class="icon-home2 mr-2"></i> Acceuil </a>
            <span class="breadcrumb-item">Rapport_Dynamique </span>
            <span style="font-size: 16px;color:#e79300;" class="breadcrumb-item active"> Rapport_dynamique</span>
         </div>
    </div>
    <div class="header-elements d-none py-0 mb-3 mb-md-0">
        <a href="#" data-toggle="modal" data-target="#modal_iconified" class="btn bg-teal-400">Ajouter un rapport</a>
    </div>
    {{-- <div class="header-elements d-none py-0 mb-3 mb-md-0">
        <a href="{{ route('user.create') }}" class="btn bg-teal">Ajouter un utilisateur</a>
    </div> --}}
</div>
@endsection
@section('content')

<div class="container">
    <br>
    <div class="row">
        @foreach ($rapport as $rap)
        <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
        <div class="card border border-primary">
            <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="card-info">
                <p class="card-text text-primary">Nom du rapport</p>
                <br>
                <div class="d-flex align-items-end mb-2">
                    <a class="h4 card-title mb-0 me-2" href="{{route('info.rapport', $rap->id_rapp)}}">
                     {{$rap->nom_rapport}}
                    </a>
                    <a href="{{ route('rapport_dynamique.destroy', $rap) }}" class="fas fa-trash p-1 text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','logout-form-{{ $rap->id_rapp }}');">
                        {{-- <i class="far fa-trash-alt"></i> --}}
                    </a>
                    <form id="logout-form-{{ $rap->id_rapp }}" action="{{ route('rapport_dynamique.destroy', $rap) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                    <small class="text-success"></small>
                </div>
                </div>
                <div class="card-icon">
                <span class="badge bg-label-primary rounded p-2">
                    <i class="bx bx-archive bx-sm"></i>
                </span>
                </div>
            </div>
            </div>
        </div>
        </div>
        @endforeach
    </div>
</div>
<div id="modal_iconified" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="POST" action="{{ route('ajout_rapport') }}">
            @csrf
            @method('POST')

            <div class="modal-header bg-primary">
                <h5 class="modal-title"><i class="icon-design mr-2"></i> Nouvel Rapport</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

                <div class="row mb-2">
                    <div class="col-md-6 mb-12">
                        <label for="inputEmail4" class="text-black">Nom Rapport  <span class="text-danger text-bold">*</span></label>
                        <input type="text" class="form-control" id="libelle" name="libelle" required placeholder="libellé" required>
                    </div>

                    <div class="col-md-6 mb-12">
                        <label for="inputEmail4" class="text-black">Feuille  <span class="text-danger text-bold">*</span></label>
                        <select name="feuille" class="form-control feuille  classeur_id" required>
                            <option value="" selected disabled>Choisir le classeur</option>
                            @foreach ($classeur as $classeurs)
                            <option value="{{$classeurs->id_cl}}">{{$classeurs->libelle_cl}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="row mb-2">
                    <div class="col-md-6 mb-12">
                        <label for="inputEmail4" class="text-black">Table  <span class="text-danger text-bold">*</span></label>
                        <select name="table[]" id="feuille_id" class="form-control select72 feuille_id" required>

                        </select>
                      </div>

                    <div class="col-md-6 mb-12">
                        <label for="inputEmail4" class="text-black">Colonne  <span class="text-danger text-bold">*</span></label>
                        <select name="colonne[]" id="colonne_id" class="form-control select72" required>

                        </select>
                    </div>

                </div>


                <div class="row mb-2">
                    <div class="col-md-12 mb-12">
                        <label for="inputEmail4" class="text-black">Opération  <span class="text-danger text-bold">*</span></label>
                        <select name="operation" class="form-control" required>
                            <option value="count">Compte</option>
                            <option value="sum">Somme</option>
                            <option value="avg">Moyenne</option>

                        </select>
                    </div>
                </div>
                <button type="button" class="btn btn-primary btn-sm" value="Ajouter le critère" id="add">Ajouter un critère</button>
                <div id="dynamicadd"></div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Fermer</button>
                <button type="submit" class="btn bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> Vaider</button>
            </div>
        </form>
    </div>
</div>

{{-- <div id="monDiv" class="text-danger">changer ma couleur</div>
    <button class="classeur_id">change</button>
<script>
      $('.classeur_id').click(function (event) {

  // Sélectionner l'élément <div> par son ID
  var monDiv = document.getElementById('monDiv');

  // Ajouter une nouvelle classe à l'élément
  monDiv.classList.add('text-info');

  // Supprimer une classe de l'élément
  monDiv.classList.remove('text-danger');

  // Remplacer une classe existante par une nouvelle
  monDiv.classList.replace('text-danger', 'text-info');
   });
</script> --}}
<script>

    $(document).ready(function() {
        $('#add').click(function() {
            //alert('ok');
            $('#dynamicadd').html(`
            <div id="row">
            <div class="row mb-2">
                    <div class="col-md-6 mb-12">
                        <label for="inputEmail4" class="text-black">Condition <span class="text-danger text-bold">*</span></label>
                        <input type="text" class="form-control" name="condition" placeholder="condition" required>
                    </div>
                    <div class="col-md-6 mb-12">
                        <label for="inputEmail4" class="text-black">Operateur<span class="text-danger text-bold">*</span></label>
                        <select name="operateur" class="form-control" required>
                            <option value="">Opérateur</option>
                            <option value="=">=</option>
                            <option value="<"><</option>
                            <option value=">">></option>
                            <option value=">=">>=</option>
                            <option value="<="><=</option>
                        </select>
                    </div>
            </div>
            <div class="row mb-2">
                    <div class="col-md-12 mb-12">
                        <label for="inputEmail4" class="text-black">valeur  <span class="text-danger text-bold">*</span></label>
                        <input type="text" class="form-control" name="valeur" placeholder="Valeur" required>
                    </div>
            </div>
            <button type="button" class="btn btn-danger btn-sm remove_row">Annuler le critère</button>
            </div>
            `);
        });
        $(document).on('click', '.remove_row', function() {
            $('#row').remove();
        });
        $('.classeur_id').change(function (event) {

            var id_cl= this.value;
            // alert (id)

                $.ajax({

                    url:"./feuille_get/"+id_cl,
                    type:"GET",
                    success:function(data){
                        console.log(data)
                        var plans = data.feuilles;
                        var html = "";
                       for(let i =0;i <plans.length;i++){
                            html += `
                            <option data-id="`+plans[i]['id_f']+`" value="`+plans[i]['table_f']+`">`+plans[i]['table_f']+`</option>
                            `;
                        }
                        $('.select72').select2({
                         dropdownParent:  $('#modal_iconified'),
                         placeholder: 'Choissisez',
                         multiple: 'multiple',
                         });
                        $("#feuille_id").html(html);
                    }

                    });

        });
//         $('#foo').on("change",function(){
//     var dataid = $("#foo option:selected").attr('data-id');
//     alert(dataid)
// });

        $('.feuille_id').change(function (event) {
            var id_f = $(".feuille_id option:selected").attr('data-id');

        // alert (id)


            $.ajax({

                url:"./colonne_get/"+id_f,
                type:"GET",
                success:function(data){
                    console.log(data)
                    var plans = data.colonnes;
                    var html = "";
                    for(let i =0;i <plans.length;i++){
                            html += `
                            <option value="`+plans[i]['champ']+`">`+plans[i]['champ']+`</option>
                            `;
                        }

                        $("#colonne_id").append(html);
                        $("#condition").html(html);

                    }

                });

        });
        $('.select82').select2({
          dropdownParent:  $('#modal_iconified'),
          placeholder: 'Choissisez',
          });
    });

</script>

@section('script')
<script src="{{asset("/assets/js/forms-selects.js")}}"></script>
<script src="{{asset("/assets/vendor/libs/select2/select2.js")}}"></script>
@endsection
@endsection

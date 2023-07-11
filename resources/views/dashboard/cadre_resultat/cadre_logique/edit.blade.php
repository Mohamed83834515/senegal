<div id="modal_iconified" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" method="POST" action="{{ route('cadre_logique.store') }}">
            @csrf
            @method('POST')
           
            @if ($id>0)
            @php
                $id=$id;
            @endphp 
            @else
            @php
                $id=1;
            @endphp 
            @endif
                
            <div class="modal-header bg-primary">
                <h5 class="modal-title"><i class="icon-design mr-2"></i> Modifier  @if($id==1)
                    @if (isset($PremierNiveau))
                    {{ $PremierNiveau->libelle_ncl }}
                    @endif
                        
                    @else
                    @if (isset($PremierNiveau))
                    {{ $PremierNiveau->libelle_ncl }}
                    @endif
                    @endif </h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">

                <div class="row mb-2">

                    <div class="col-md-12 mb-2">
                        <label for="inputEmail4" class="text-black">Code <span class="text-danger text-bold">*</span></label>
                        <input type="text" class="form-control" id="code" name="code" placeholder="code" aria-describedby="code" placeholder="Saississez le code" required>
                        <input type="hidden" class="form-control" id="niveau" value="{{ $id }}" name="niveau" placeholder="Code" aria-describedby="code" placeholder="Saississez le code" required>
                    </div>


                    <div class="col-md-12">
                        <label for="inputEmail4" class="text-black">
                            @if (isset($PremierNiveau))
                            {{ $PremierNiveau->libelle_ncl }} 
                        @endif
                         <span class="text-danger text-bold"></span></label>
                        <textarea type="text" class="form-control" name="intitule" id="intitule" aria-describedby="definition"></textarea>
                    </div>

                    @if($id==1)
                    <div class="col-md-6">
                     <label for="inputEmail4" class="text-black">Coût <span class="text-danger text-bold"></span></label>
                     <input type="number" class="form-control" name="cout" id="cout" aria-describedby="contact"></textarea>
                   </div>
                   @else
                   
                        <div class="col-md-12">
                            <label for="inputEmail4" class="text-black">
                                @if (isset($Avant))
                                {{ $Avant->libelle_ncl }}
                                @endif 
                                <span class="text-danger text-bold"></span></label>
                            <select class="form-control select " name="parent" id="parent" data-placeholder="choisissez les types"  >
                                
                                @foreach ($cadres as $typ)
                                
                                @if ($typ->id_niv_cl==$Avant->id_ncl)
                                <option data-icon="" value="{{$typ->id_cl}}"
                                    {{ check_module_selected(old('type'), $typ->id_cl) ? 'selected' : '' }}>
                                    {{ $typ->intitule_cl }}
                                </option>
                                @endif
                                    
                                
                                

                            @endforeach
                                  
                            </select>
                        </div>
                    @endif



                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-link" data-dismiss="modal"><i class="icon-cross2 font-size-base mr-1"></i> Fermer</button>
                <button type="submit" class="btn bg-primary"><i class="icon-checkmark3 font-size-base mr-1"></i> Valider</button>
            </div>
        </form>
    </div>
</div>
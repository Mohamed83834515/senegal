<thead>
    <tr>

        <th>Code</th> 
        @for ($i=1;$i<=$id;$i++)
            <th>
                @php
                    $type = $niveau->where('id_nvl', '=', $i)->first();   
                @endphp
                
                {{ $type->libelle_nvl }} 
            </th>  
        @endfor
         
         
        <th>@if($id==1)Abrégé@endif </th> 
        <th>@if($id==1)
            Couleur
        @endif  </th> 
        <th class="text-center">Action</th>
    </tr>
</thead>
<tbody>
    @php
    $type = $localites->where('idniv_localite', '=', $id);
@endphp
@foreach ($type as $region)
    

    
        <tr>
            <td>{{ $region->code_localite }}</td>
            <td>{{ $region->intitule_localite }}</td>  
            <td>{{ $region->abreviation_localite }}</td>  
            <td style="background-color: {{ $region->code_localite_national }} ">{{ $region->code_localite_national }}</td>  
            <td class="text-center">
                <a href="" class="icon-pencil7 text-info" data-toggle="tooltip" data-placement="bottom" title="Modifier">
                    {{-- <i class="far fa-edit"></i> --}}
                </a>
                <a href="" class="icon-trash text-danger" data-toggle="tooltip" data-placement="bottom" title="Supprimer" onclick="event.preventDefault(); confirmationModal('Voulez-vous continuer l\'action ?','delete-form-');">
                    {{-- <i class="far fa-trash-alt"></i> --}}
                </a>
                <form id="" action="" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </td>
        </tr>
    @endforeach
</tbody>
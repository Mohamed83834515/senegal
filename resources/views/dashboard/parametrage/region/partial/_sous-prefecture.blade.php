<thead>
    <tr>

        <th>Code</th> 
        <th>Region</th> 
        <th>Departement</th> 
        <th>Sous préfecture</th> 
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
            <td>{{ $region->parent->parent->intitule_localite }}</td>  
            <td>{{ $region->parent->intitule_localite }}</td>  
            <td>{{ $region->intitule_localite  }}</td>  
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
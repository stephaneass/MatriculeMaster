<tr>
    <td>{{$loop->index + 1}}</td>
    <td>{{$cycle->label}}</td>
    <td>{{$cycle->description}}</td>
    <td>{{$cycle->format}}</td>
    <td>
        <!-- Buttons Group -->
        <button wire:click="edit({{$cycle->id}})" 
            onclick="showCycleModal('update')"
            type="button" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-edit-line"></i></button>            
    </td>
</tr>
<tr>
    <td>{{$student->matricule_number}}</td>
    <td>{{$student->last_name}}</td>
    <td>{{$student->first_name}}</td>
    <td>{{$student->gender}}</td>
    <td>{{$student->birth_date}}</td>
    <td>{{$student->registration_date}}</td>
    <td>
        <!-- Buttons Group -->
        <button wire:click="edit({{$student->id}})" 
            onclick="showStudentModal('update')"
            type="button" class="btn btn-primary btn-icon waves-effect waves-light"><i class="ri-edit-line"></i></button>            
    </td>
</tr>
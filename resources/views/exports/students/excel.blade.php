<tr>
    <td>{{$title}}</td><br>
</tr>
<br><br>
@include('livewire.admin.students.table', [
        'students' => $students, 
        'columns' => $columns, 
    ])
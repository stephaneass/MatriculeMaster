<table class="customTable customTable0 table align-middle table-nowrap table-striped-columns mb-0">
    <x-table.header :columns="$columns" />
    <tbody>
        @foreach ($students as $student)
            @include('livewire.admin.students.item')
        @endforeach
    </tbody>
</table>
@props(['columns'])
<thead class="table-light">
    <tr>
        @foreach ($columns as $column)
            <th scope="col">{{$column}}</th>
        @endforeach
        {{-- <th scope="col" style="width: 150px;">Action</th> --}}
    </tr>
</thead>
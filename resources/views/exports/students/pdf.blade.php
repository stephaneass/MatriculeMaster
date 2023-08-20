<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="preconnect" href="https://fonts.gstatic.com">

</head>
<body>
<style>
    table.customTable0 {
        width: 100%;
        background-color: #FFFFFF;
        border-collapse: collapse;
        border-width: 0px;
        border-color: #CDC8C0;
        border-style: solid;
        color: #362103;
    }

    table.customTable0 td, table.customTable0 th {
        border-width: 0px;
        border-color: #CDC8C0;
        border-style: solid;
        padding: 4px;
    }

    table.customTable0 thead {
        background-color: #CDC8C0;
    }

    table.customTable {
        width: 100%;
        background-color: #FFFFFF;
        border-collapse: collapse;
        border-width: 1px;
        border-color: #CDC8C0;
        border-style: solid;
        color: #362103;
    }

    table.customTable td, table.customTable th {
        border-width: 1px;
        border-color: #CDC8C0;
        border-style: solid;
       /*  padding: 4px; */
    }

    table.customTable thead {
        background-color: #CDC8C0;
    }

    table th{
        font-size: 12px;
    }
    table td, table td * {
        vertical-align: top;
        font-size: 12px;
    }
    td {
        text-align: center;
        vertical-align: middle;
        border-width: 1px;
        border-style: solid;
    }
</style>
<H2 align="center"> 
    {{$title}} <br>
</H2>

<br>

@include('livewire.admin.students.table', [
        'students' => $students, 
        'columns' => $columns, 
    ])

</body>

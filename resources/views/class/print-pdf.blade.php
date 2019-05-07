@extends('layouts.print')

@section('content')
<br><br>
<table class="table" cellspacing="0" cellpadding="2" border="0">
    <thead>
        <tr>
            <th width="5%" style="border: 1px solid black; background-color:#ababab; text-align:center;font-weight:bold;">Num</th>
            <th width="10%" style="border: 1px solid black; background-color:#ababab; text-align:center;font-weight:bold;">Class</th>
            <th width="15%" style="border: 1px solid black; background-color:#ababab; text-align:center;font-weight:bold;">Decription</th>
            <th width="10%" style="border: 1px solid black; background-color:#ababab; text-align:center;font-weight:bold;">Teacher</th>
            <th width="60%" style="border: 1px solid black; background-color:#ababab; text-align:center;font-weight:bold;">Students</th>
        </tr>
    </thead>
    <tbody>
        @foreach($models as $num => $model)
        <?php 
        $stringStudents = '';
        foreach ($model->studentClass as $studentClass) {
            $stringStudents .= $studentClass->student->name.', ';
        }
        ?>
        <tr>
            <td width="5%" style="border: 1px solid black">{{ $num+1 }}</td>
            <td width="10%" style="border: 1px solid black">{{ $model->name }}</td>
            <td width="15%" style="border: 1px solid black">{{ $model->description }}</td>
            <td width="10%" style="border: 1px solid black">{{ $model->teacher->name }}</td>
            <td width="60%" style="border: 1px solid black">{{ substr(trim($stringStudents), 0, -1) }}</td>
        </tr>
        @endforeach       
    </tbody>
</table>

@endsection

@extends('layout')
@section('content')
<table class="table table-striped">
  <thead>
    <th>ID</th>
    <th>Show Name</th>
    <th>Series</th>
    <th>Lead Actor</th>
    <th>Action</th>
  </thead>
  <tbody>
    @foreach($shows as $show)
    <tr>
      <td>{{$show->id}}</td> 
      <td>{{$show->company_name}}</td> 
      <td>{{$show->department_name}}</td> 
      <td>{{$show->team_lead_name}}</td>
      <td><a href="{{action('PDFDataController@downloadPDF', $show->id)}}">Download PDF</a></td>
    </tr>
@endforeach
  </tbody>
</table>
@endsection
@extends('sales.sales_dashboard')
@section('sales')


<div class="page-content">

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Client</a></li>
        <li class="breadcrumb-item active" aria-current="page">News Clients Report</li>
    </ol>

    <!-- <a href="{{ route('new.client') }}" class="btn btn-outline-primary">Add New Client</a> -->
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h6 class="card-title">New Clients Report (Past 30 days)</h6>
<!--<p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p>-->
<div class="table-responsive">
  <table id="dataTableExample" class="table">
    <thead>
      <tr>
        <th>Client Name</th>
        <th>Address</th>
        <th>Country</th>
        <th>Contact Person</th>
        <th>Status</th>
        <th>Date Created</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($newClientsData as $key => $item)
      <tr>
        <td>{{ $item->client_name }}</td>
        <td>{{ $item->client_addr }}</td>
        <td>{{ $item->client_country }}</td>
        <td>{{ $item->client_contactperson }}</td>
        <td>{{ $item->client_status }}</td>
        <td>{{ $item->created_at }}</td>
        <td>
        <a href="{{ route('sales.edit.client',$item->id) }}" class="btn btn-inverse-warning">Edit</a>
        <a href="{{ route('sales.delete.client',$item->id) }}" class="btn btn-inverse-danger" id="delete">Delete</a>    

        </td>
      </tr>
    @endforeach 
    </tbody>
  </table>
</div>
</div>
</div>
    </div>
</div>

</div>

@endsection
@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Contract</a></li>
        <li class="breadcrumb-item active" aria-current="page">Approaching Contract Expiration Report</li>
    </ol>

    <!--<a href="{{ route('new.contract') }}" class="btn btn-outline-primary">Add New Contract</a>-->
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h6 class="card-title">Approaching Contract Expiration Report (in 60 days)</h6>
<!--<p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p>-->
<div class="table-responsive">
  <table id="dataTableExample" class="table">
    <thead>
      <tr>
        <th>Client Name</th>
        <th>Project Name</th>
        <th>Start Date</th>
        <th>End of Contract</th>
        <th>Contract Signed</th>
        <th>Filename</th>
        <th>Created By</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($allExpiredContractData as $key => $item)
      <tr>
        <td>{{ $item->client_name }}</td>
        <td>{{ $item->project_name }}</td>
        <td>{{ $item->contract_start }}</td>
        <td>{{ $item->contract_end }}</td>
        <td>{{ $item->contract_signed }}</td>
        <td>{{ $item->contract_filename }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->contract_status }}</td>
        <td>
        <a href="{{ route('edit.contract',$item->id) }}" class="btn btn-inverse-warning">Edit</a>
        <a href="{{ route('delete.contract',$item->id) }}" class="btn btn-inverse-danger" id="delete">Delete</a> 
        <a href="{{ '/upload/contracts/'.$item->contract_filename}}" class="btn btn-inverse-primary" download>Download</a>   

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
@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Proposal</a></li>
        <li class="breadcrumb-item active" aria-current="page">All Proposals</li>
    </ol>

    <a href="{{ route('new.proposal') }}" class="btn btn-outline-primary">Add New Proposal</a>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h6 class="card-title">All Generated Proposals</h6>
<!--<p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p>-->
<div class="table-responsive">
  <table id="dataTableExample" class="table">
    <thead>
      <tr>
        <th>Client Name</th>
        <th>Project Name</th>
        <th>Contact Person</th>
        <th>Status</th>
        <th>Date Submitted</th>
        <th>Created By</th>
        <th>Date Created</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($allProposals as $key => $item)
      <tr>
        <td>{{ $item->client_name }}</td>
        <td>{{ $item->proposal_project }}</td>
        <td>{{ $item->proposal_contactperson }}</td>
        <td>{{ $item->proposal_status }}</td>
        <td>{{ $item->date_submitted }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->created_at }}</td>
        <td>
        <a href="{{ route('edit.proposal',$item->id) }}" class="btn btn-inverse-warning">Edit</a>
        <a href="{{ route('delete.proposal',$item->id) }}" class="btn btn-inverse-danger" id="delete">Delete</a>    

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
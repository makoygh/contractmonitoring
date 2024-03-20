@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">

<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Users</a></li>
        <li class="breadcrumb-item active" aria-current="page">All Users</li>
    </ol>

    <a href="{{ route('admin.register.user') }}" class="btn btn-outline-primary">Add New User</a>
</nav>

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h6 class="card-title">All Registered Users</h6>
<!--<p class="text-muted mb-3">Read the <a href="https://datatables.net/" target="_blank"> Official DataTables Documentation </a>for a full list of instructions and other options.</p>-->
<div class="table-responsive">
  <table id="dataTableExample" class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Status</th>
        <th>Role</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @foreach($registeredUsers as $key => $item)
      <tr>
        <td>{{ $item->name }}</td>
        <td>{{ $item->email }}</td>
        <td>{{ $item->status }}</td>
        <td>{{ $item->role }}</td>
        <td>
        <a href="{{ route('admin.edit.user',$item->id) }}" class="btn btn-inverse-warning">Edit</a>
        <a href="{{ route('admin.delete.user',$item->id) }}" class="btn btn-inverse-danger" id="delete">Delete</a>    

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
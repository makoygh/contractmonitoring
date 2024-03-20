@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">


        <div class="row profile-body">

          <!-- middle wrapper start -->
          <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">


            <div class="card">
              <div class="card-body">

								<h6 class="card-title">Edit User</h6>

								<form class="forms-sample" method="POST" action="{{ route('admin.store.edituser') }}" enctype="multipart/form-data">

                                @csrf
                                    <input type="hidden" name="id" value="{{ $userData->id }}">
                                    <div class="mb-3">
										<label for="userName" class="form-label">Name</label>
										<input type="text" name="name" 
                                        class="form-control @error('name') is-invalid @enderror" id="name" autocomplete="off" value="{{ $userData->name}}">
                                        @error('name')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
									</div>

									<div class="mb-3">
										<label for="userEmail" class="form-label">Email Address</label>
										<input type="email" name="email" 
                                        class="form-control @error('email') is-invalid @enderror" id="email" autocomplete="off"  value="{{ $userData->email}}">
                                        @error('email')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
									</div>

                                    <div class="mb-3">
										<label for="roleSelect" class="form-label">Role</label>
										<select class="form-select  @error('roleSelect') is-invalid @enderror" name="roleSelect" id="roleSelect" >
											<option selected disabled>Select User Role</option>
											<option value="admin" {{ $userData->role == 'admin' ? 'selected="selected"' : '' }} >admin</option>
											<option value="sales" {{ $userData->role == 'sales' ? 'selected="selected"' : '' }} >sales</option>
											<option value="user" {{ $userData->role == 'user' ? 'selected="selected"' : '' }} >user</option>
										</select>
                                        @error('roleSelect')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
									</div>

                                    <div class="mb-3">
										<label for="userStatus" class="form-label">Status</label>
										<select class="form-select  @error('userStatus') is-invalid @enderror" name="userStatus" id="userStatus">
											<option selected disabled>Select Status</option>
											<option value="active" {{ $userData->status == 'active' ? 'selected="selected"' : '' }} >active</option>
											<option value="inactive" {{ $userData->status == 'inactive' ? 'selected="selected"' : '' }} >inactive</option>
										</select>
                                        @error('userStatus')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
									</div>
                                    <!--
									<div class="mb-3">
										<label for="exampleInputPassword2" class="form-label">Password</label>
										<input type="password" name="new_password" 
                                        class="form-control @error('new_password') is-invalid @enderror" id="new_password" autocomplete="off"  value="{{ $userData->password}}">
                                        @error('new_password')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
									</div>

                                    
									<div class="mb-3">
										<label for="exampleInputPassword3" class="form-label">Confirm New Password</label>
										<input type="password" name="new_password_confirmation" 
                                        class="form-control" id="new_password_confirmation" autocomplete="off" >

									</div>
                                    -->


									<button type="submit" class="btn btn-primary me-2">Save Changes</button>
									<!--<button class="btn btn-secondary">Cancel</button>-->
								</form>

              </div>
            </div>


            </div>
          </div>
          <!-- middle wrapper end -->
          <!-- right wrapper start --  User Password Reset -->
          <div class="d-none d-xl-block col-xl-4">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card rounded">
                  <div class="card-body">
                    <h6 class="card-title"> User Password Reset </h6>
                    <!--<div class="row ms-0 me-0">
                      <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                        <figure class="mb-2">
                          <img class="img-fluid rounded" src="https://via.placeholder.com/96x96" alt="">
                        </figure>
                      </a>
                      <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                        <figure class="mb-2">
                          <img class="img-fluid rounded" src="https://via.placeholder.com/96x96" alt="">
                        </figure>
                      </a>
                      <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                        <figure class="mb-2">
                          <img class="img-fluid rounded" src="https://via.placeholder.com/96x96" alt="">
                        </figure>
                      </a>
                      <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                        <figure class="mb-2">
                          <img class="img-fluid rounded" src="https://via.placeholder.com/96x96" alt="">
                        </figure>
                      </a>
                      <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                        <figure class="mb-2">
                          <img class="img-fluid rounded" src="https://via.placeholder.com/96x96" alt="">
                        </figure>
                      </a>
                      <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                        <figure class="mb-2">
                          <img class="img-fluid rounded" src="https://via.placeholder.com/96x96" alt="">
                        </figure>
                      </a>
                      <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                        <figure class="mb-0">
                          <img class="img-fluid rounded" src="https://via.placeholder.com/96x96" alt="">
                        </figure>
                      </a>
                      <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                        <figure class="mb-0">
                          <img class="img-fluid rounded" src="https://via.placeholder.com/96x96" alt="">
                        </figure>
                      </a>
                      <a href="javascript:;" class="col-md-4 ps-1 pe-1">
                        <figure class="mb-0">
                          <img class="img-fluid rounded" src="https://via.placeholder.com/96x96" alt="">
                        </figure>
                      </a>
                    </div>-->

                    <div class="card">
              <div class="card-body">

								<h6 class="card-title"> &nbsp; </h6>
                <div class="row ms-0 me-0">
								<form class="forms-sample" method="POST" action="{{ route('admin.update.userpassword') }}" enctype="multipart/form-data">

                                @csrf
                  <input type="hidden" name="userid_reset" value="{{ $userData->id }}">
									<!--<div class="mb-3">
										<label for="exampleInputPassword1" class="form-label">Old Password</label>
										<input type="password" name="old_password" 
                                        class="form-control @error('old_password') is-invalid @enderror" id="old_password" autocomplete="off" >
                                        @error('old_password')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
									</div>-->

									<div class="mb-3">
										<label for="exampleInputPassword2" class="form-label">New Password</label>
										<input type="password" name="new_password" 
                                        class="form-control @error('new_password') is-invalid @enderror" id="new_password" autocomplete="off" >
                                        @error('new_password')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
									</div>

                                    
									<div class="mb-3">
										<label for="exampleInputPassword3" class="form-label">Confirm New Password</label>
										<input type="password" name="new_password_confirmation" 
                                        class="form-control" id="new_password_confirmation" autocomplete="off" >

									</div>

									<!--<div class="form-check mb-3">
                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
										<label class="form-check-label" for="exampleCheck1">
											Remember me
										</label>
									</div>-->
									<button type="submit" class="btn btn-primary me-2">Save Changes</button>
									<!--<button class="btn btn-secondary">Cancel</button>-->
								</form>
                </div>
              </div>
            </div> <!-- end of change password -->

                  </div>
                </div>
              </div>
              
              <!--<div class="col-md-12 grid-margin">
                <div class="card rounded">
                  <div class="card-body">
                    <h6 class="card-title">suggestions for you</h6>
                    <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                      <div class="d-flex align-items-center hover-pointer">
                        <img class="img-xs rounded-circle" src="https://via.placeholder.com/37x37" alt="">											
                        <div class="ms-2">
                          <p>Mike Popescu</p>
                          <p class="tx-11 text-muted">12 Mutual Friends</p>
                        </div>
                      </div>
                      <button class="btn btn-icon border-0"><i data-feather="user-plus"></i></button>
                    </div>
                    <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                      <div class="d-flex align-items-center hover-pointer">
                        <img class="img-xs rounded-circle" src="https://via.placeholder.com/37x37" alt="">											
                        <div class="ms-2">
                          <p>Mike Popescu</p>
                          <p class="tx-11 text-muted">12 Mutual Friends</p>
                        </div>
                      </div>
                      <button class="btn btn-icon border-0"><i data-feather="user-plus"></i></button>
                    </div>
                    <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                      <div class="d-flex align-items-center hover-pointer">
                        <img class="img-xs rounded-circle" src="https://via.placeholder.com/37x37" alt="">											
                        <div class="ms-2">
                          <p>Mike Popescu</p>
                          <p class="tx-11 text-muted">12 Mutual Friends</p>
                        </div>
                      </div>
                      <button class="btn btn-icon border-0"><i data-feather="user-plus"></i></button>
                    </div>
                    <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                      <div class="d-flex align-items-center hover-pointer">
                        <img class="img-xs rounded-circle" src="https://via.placeholder.com/37x37" alt="">											
                        <div class="ms-2">
                          <p>Mike Popescu</p>
                          <p class="tx-11 text-muted">12 Mutual Friends</p>
                        </div>
                      </div>
                      <button class="btn btn-icon border-0"><i data-feather="user-plus"></i></button>
                    </div>
                    <div class="d-flex justify-content-between mb-2 pb-2 border-bottom">
                      <div class="d-flex align-items-center hover-pointer">
                        <img class="img-xs rounded-circle" src="https://via.placeholder.com/37x37" alt="">											
                        <div class="ms-2">
                          <p>Mike Popescu</p>
                          <p class="tx-11 text-muted">12 Mutual Friends</p>
                        </div>
                      </div>
                      <button class="btn btn-icon border-0"><i data-feather="user-plus"></i></button>
                    </div>
                    <div class="d-flex justify-content-between">
                      <div class="d-flex align-items-center hover-pointer">
                        <img class="img-xs rounded-circle" src="https://via.placeholder.com/37x37" alt="">											
                        <div class="ms-2">
                          <p>Mike Popescu</p>
                          <p class="tx-11 text-muted">12 Mutual Friends</p>
                        </div>
                      </div>
                      <button class="btn btn-icon border-0"><i data-feather="user-plus"></i></button>
                    </div>

                  </div>
                </div>
              </div>-->
            </div>
          </div>
          <!-- right wrapper end -->
        </div>

 
 

	</div>




@endsection
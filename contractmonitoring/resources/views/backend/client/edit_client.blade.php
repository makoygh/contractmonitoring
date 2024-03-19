@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">


        <div class="row profile-body">

          <!-- middle wrapper start -->
          <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">


            <div class="card">
              <div class="card-body">

								<h6 class="card-title">Edit Client</h6>

								<form class="forms-sample" method="POST" action="{{ route('save.editclient') }}" enctype="multipart/form-data">

                                @csrf
                                    <input type="hidden" name="id" id="id" value="{{ $clientData->id}}">
                                    <div class="mb-3">
										<label for="clientName" class="form-label">Client Name</label>
										<input type="text" name="client_name" 
                                        class="form-control @error('client_name') is-invalid @enderror" id="client_name" autocomplete="off" value="{{ $clientData->client_name}}">
                                        @error('client_name')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
									</div>

									<div class="mb-3">
										<label for="clientAddr" class="form-label">Address</label>
										<input type="text" name="client_address" 
                                        class="form-control @error('client_address') is-invalid @enderror" id="client_address" autocomplete="off" value="{{ $clientData->client_addr}}">
                                        @error('client_address')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
									</div>

									<div class="mb-3">
										<label for="clientAddr" class="form-label">Country</label>
										<input type="text" name="client_country" 
                                        class="form-control @error('client_country') is-invalid @enderror" id="client_country" autocomplete="off" value="{{ $clientData->client_country}}">
                                        @error('client_country')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
									</div>

									<div class="mb-3">
										<label for="clientAddr" class="form-label">Contact Person</label>
										<input type="text" name="client_contactperson" 
                                        class="form-control @error('client_contactperson') is-invalid @enderror" id="client_contactperson" autocomplete="off" value="{{ $clientData->client_contactperson}}">
                                        @error('client_contactperson')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
									</div>                                    

                                    <div class="mb-3">
										<label for="userStatus" class="form-label">Status</label>
										<select class="form-select  @error('client_status') is-invalid @enderror" name="client_status" id="client_status">
											<option selected disabled>Select Status</option>
											<option value="active" {{ $clientData->client_status == 'active' ? 'selected="selected"' : '' }} >active</option>
											<option value="inactive" {{ $clientData->client_status == 'inactive' ? 'selected="selected"' : '' }} >inactive</option>
										</select>
                                        @error('client_status')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
									</div>

									<!--<div class="mb-3">
										<label for="exampleInputPassword2" class="form-label">Password</label>
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

									</div>-->


									<button type="submit" class="btn btn-primary me-2">Save Changes</button>
									<!--<button class="btn btn-secondary">Cancel</button>-->
								</form>

              </div>
            </div>


            </div>
          </div>
          <!-- middle wrapper end -->
          <!-- right wrapper start -->
          <!--<div class="d-none d-xl-block col-xl-3">
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card rounded">
                  <div class="card-body">
                    <h6 class="card-title">latest photos</h6>
                    <div class="row ms-0 me-0">
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
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 grid-margin">
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
              </div>
            </div>
          </div>-->
          <!-- right wrapper end -->
        </div>

	</div>




@endsection
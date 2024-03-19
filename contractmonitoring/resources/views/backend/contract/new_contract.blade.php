@extends('admin.admin_dashboard')
@section('admin')


<div class="page-content">


        <div class="row profile-body">

          <!-- middle wrapper start -->
          <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">


            <div class="card">
              <div class="card-body">

								<h6 class="card-title">Add New Contract</h6>

								<form class="forms-sample" method="POST" action="{{ route('store.newcontract') }}" enctype="multipart/form-data">

                                @csrf
                                    <input type="hidden" value="{{ $userData->id}}" name="userid" id="userid">
                                    <div class="mb-3">
										<label for="clientName" class="form-label">Client Name</label>
										
                                       <!-- <input type="text" name="client_name" 
                                        class="form-control @error('client_name') is-invalid @enderror" id="client_name" autocomplete="off" >-->
                                       
                                        <select class="form-select  @error('client_id') is-invalid @enderror" name="client_id" id="client_id">
                                        <option value="option_select" disabled selected>Select Client Name</option>
                                        
                                        @foreach($clientData as $client)
                                            <option value="{{ $client->id }}">{{ $client->client_name}}</option>
                                        @endforeach
                                        </select>
                                       
                                       
                                        @error('client_name')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
									</div>

									<div class="mb-3">
										<label for="projName" class="form-label">Project Name</label>
										<input type="text" name="project_name" 
                                        class="form-control @error('project_name') is-invalid @enderror" id="project_name" autocomplete="off" >
                                        @error('project_name')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
									</div>

									<div class="mb-3">
										<label for="contractStart" class="form-label">Contract Start Date</label>

                                        <!--<input type="date" name="contract_start" 
                                        class="form-control @error('contract_start') is-invalid @enderror" id="contract_start" autocomplete="off" >-->

                                        <input class="form-control mb-4 mb-md-0 @error('contract_start') is-invalid @enderror" id="contract_start" name="contract_start" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="yyyy-mm-dd" inputmode="numeric">
										
                                        @error('contract_start')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
									</div>

									<div class="mb-3">
										<label for="contractEnd" class="form-label">Contract End Date</label>

                                        <!--<input type="date" name="contract_start" 
                                        class="form-control @error('contract_start') is-invalid @enderror" id="contract_start" autocomplete="off" >-->
                                        <input class="form-control mb-4 mb-md-0 @error('contract_end') is-invalid @enderror" id="contract_end" name="contract_end" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="yyyy-mm-dd" inputmode="numeric">
										
                                        @error('contract_end')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
									</div>

                                    <div class="mb-3">
										<label for="contractSigned" class="form-label">Contract Date Signed</label>

                                        <!--<input type="date" name="contract_start" 
                                        class="form-control @error('contract_start') is-invalid @enderror" id="contract_start" autocomplete="off" >-->

                                        <input class="form-control mb-4 mb-md-0 @error('contract_signed') is-invalid @enderror" id="contract_signed" name="contract_signed" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="yyyy-mm-dd" inputmode="numeric">
										
                                        @error('contract_signed')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
									</div>

									<div class="mb-3">
										<label for="uploadDocument" class="form-label">Upload Document</label>
										<!--<input type="text" name="contract_filename" 
                                        class="form-control @error('contract_filename') is-invalid @enderror" id="contract_filename" autocomplete="off" >-->
                                        
                                        <input class="form-control  @error('contract_filename') is-invalid @enderror" type="file" id="contract_filename" name="contract_filename" >
                                        @error('contract_filename')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
									</div>                                    

                                    <div class="mb-3">
										<label for="contractStatus" class="form-label">Status</label>
										<select class="form-select  @error('contract_status') is-invalid @enderror" name="contract_status" id="contract_status">
											<option selected disabled>Select Status</option>
											<option>active</option>
											<option>inactive</option>
                                            <option>on-hold</option>
										</select>
                                        @error('contract_status')
                                            <span class='text-danger'>{{ $message }}</span>
                                        @enderror
									</div>

                                    <div class="mb-3">
										<label for="createdBy" class="form-label">Created By</label><br>
										<label for="createdBy" class="form-label">{{ $userData->name }}</label>
                                       <!-- <input type="text" name="client_name" 
                                        class="form-control @error('client_name') is-invalid @enderror" id="client_name" autocomplete="off" >-->
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
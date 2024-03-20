@extends('sales.sales_dashboard')
@section('sales')


<div class="page-content">


        <div class="row profile-body">

          <!-- middle wrapper start -->
          <div class="col-md-8 col-xl-8 middle-wrapper">
            <div class="row">


            <div class="card">
              <div class="card-body">

								<h6 class="card-title">Edit Client</h6>

								<form class="forms-sample" method="POST" action="{{ route('sales.save.editclient') }}" enctype="multipart/form-data">

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

        </div>

	</div>




@endsection
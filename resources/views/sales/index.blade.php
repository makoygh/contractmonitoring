@extends('sales.sales_dashboard')
@section('sales')


<div class="page-content">

            <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0" style="font-size: 20px">Dashboard</h4>
            </div>
            
            <div class="d-flex align-items-center flex-wrap text-nowrap">
                <!--<div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
                <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
                <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input>
                </div>
                <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="printer"></i>
                Print
                </button>
                <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
                <i class="btn-icon-prepend" data-feather="download-cloud"></i>
                Download Report
                </button>-->
            </div>
            </div>

            <div class="row">
            <div class="col-12 col-xl-12 stretch-card">
                <div class="row flex-grow-1">
                <!-- NEW CONTRACTS -->
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">New Contracts (Past 30 days)</h6></br></br>
                        
                        <!--<div class="dropdown mb-2">
                            <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                            </div>
                        </div>-->
                        </div>
                        <div class="row">
                        <div class="col-6 col-md-12 col-xl-5">
                            <h2 class="mb-2" style="font-size: 50px">{{ $contract_count }}</h2>
                            <div class="d-flex align-items-baseline">
                            <!--<p class="text-success">
                                <span>+3.3%</span>
                                <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                            </p>-->
                            </div>
                        </div>
                        <div class="col-6 col-md-12 col-xl-7">
                            <!--<div id="customersChart" class="mt-md-3 mt-xl-0"></div>-->
                            
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- NEW CLIENTS -->
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">New Clients (Past 30 days)</h6></br></br>
                        <!--<div class="dropdown mb-2">
                            <a type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                            </div>
                        </div>-->
                        </div>
                        <div class="row">
                        <div class="col-6 col-md-12 col-xl-5">
                            <h3 class="mb-2" style="font-size: 50px"> {{ $client_count }} </h3>
                            <div class="d-flex align-items-baseline">
                            <!--<p class="text-danger">
                                <span>-2.8%</span>
                                <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                            </p>-->
                            </div>
                        </div>
                        <div class="col-6 col-md-12 col-xl-7">
                            <!--<div id="ordersChart" class="mt-md-3 mt-xl-0"></div>-->

                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                  <!-- CONTRACT EXPIRES -->
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">Contracts Expires (in 60 days)</h6></br></br>
                        <!--<div class="dropdown mb-2">
                            <a type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                            </div>
                        </div>-->
                        </div>
                        <div class="row">
                        <div class="col-6 col-md-12 col-xl-5">
                            <h3 class="mb-2" style="font-size: 50px"> {{ $contract_expire }} </h3>
                            <div class="d-flex align-items-baseline">
                           <!-- <p class="text-success">
                                <span>+2.8%</span>
                                <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                            </p>-->
                            </div>
                        </div>
                        <div class="col-6 col-md-12 col-xl-7">
                           <!-- <div id="growthChart" class="mt-md-3 mt-xl-0"></div>-->
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- ACTIVE CONTRACTS -->
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">All Active Contracts</h6></br></br>
                        <!--<div class="dropdown mb-2">
                            <a type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                            </div>
                        </div>-->
                        </div>
                        <div class="row">
                        <div class="col-6 col-md-12 col-xl-5">
                            <h3 class="mb-2" style="font-size: 50px"> {{ $contract_active }} </h3>
                            <div class="d-flex align-items-baseline">
                           <!-- <p class="text-success">
                                <span>+2.8%</span>
                                <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                            </p>-->
                            </div>
                        </div>
                        <div class="col-6 col-md-12 col-xl-7">
                           <!-- <div id="growthChart" class="mt-md-3 mt-xl-0"></div>-->
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
               </div>
            </div> <!-- row -->


            
            <!-- MONTHLY PROPOSALS -->
            <div class="row">
            <div class="col-lg-7 col-xl-8 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline mb-2">
                    <h6 class="card-title mb-0">Generated Proposals (Past 90 days)</h6>
                    <div class="dropdown mb-2">
                        <a type="button" id="dropdownMenuButton4" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                        </div>
                    </div>
                    </div>
                    <p class="text-muted">Number of business proposals created in a given time period.</p>
                    <!--<div id="monthlySalesChart"></div>-->
                    <div id="generated_proposals_chart"></div>
                </div> 
                </div>
            </div>

            <div class="col-lg-5 col-xl-4 grid-margin stretch-card">
                <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-baseline">
                    <h6 class="card-title mb-0">Proposals Approval Rate</h6>
                    <div class="dropdown mb-2">
                        <a type="button" id="dropdownMenuButton5" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                        <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                        </div>
                    </div>
                    </div>
                    <div id="approved_proposals_chart"> </div>
                    <div class="row mb-3">
                    <!--<div class="col-6 d-flex justify-content-end">
                        <div>
                        <label class="d-flex align-items-center justify-content-end tx-10 text-uppercase fw-bolder">Total # of leads <span class="p-1 ms-1 rounded-circle bg-secondary"></span></label>
                        <h5 class="fw-bolder mb-0 text-end">10,000</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div>
                        <label class="d-flex align-items-center tx-10 text-uppercase fw-bolder"><span class="p-1 me-1 rounded-circle bg-primary"></span> Leads contacted</label>
                        <h5 class="fw-bolder mb-0">5,000</h5>
                        </div>
                    </div>-->
                    </div>
                    <!--<div class="d-grid">
                    <button class="btn btn-primary">Upgrade storage</button>
                    </div>-->
                </div>
                </div>
            </div>
            </div> <!-- row -->


          <!-- PROPOSALS METRICS -->

          <div>
                <h4 class="mb-3 mb-md-0" style="font-size: 20px">Proposals Metrics (Past 90 days)</h4><br>
            </div>

            <div class="row">
            <div class="col-12 col-xl-12 stretch-card">
                <div class="row flex-grow-1">
                <!-- NEW PROPOSALS -->
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">New Proposals</h6></br></br>
                        
                        <!--<div class="dropdown mb-2">
                            <a type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                            </div>
                        </div>-->
                        </div>
                        <div class="row">
                        <div class="col-6 col-md-12 col-xl-5">
                            <h2 class="mb-2" style="font-size: 50px">{{ $new_proposals }}</h2>
                            <div class="d-flex align-items-baseline">
                            <!--<p class="text-success">
                                <span>+3.3%</span>
                                <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                            </p>-->
                            </div>
                        </div>
                        <div class="col-6 col-md-12 col-xl-7">
                            <!--<div id="customersChart" class="mt-md-3 mt-xl-0"></div>-->
                            
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- NEW CLIENTS -->
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">Submitted Proposals</h6></br></br>
                        <!--<div class="dropdown mb-2">
                            <a type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                            </div>
                        </div>-->
                        </div>
                        <div class="row">
                        <div class="col-6 col-md-12 col-xl-5">
                            <h3 class="mb-2" style="font-size: 50px"> {{ $submitted_proposals }} </h3>
                            <div class="d-flex align-items-baseline">
                            <!--<p class="text-danger">
                                <span>-2.8%</span>
                                <i data-feather="arrow-down" class="icon-sm mb-1"></i>
                            </p>-->
                            </div>
                        </div>
                        <div class="col-6 col-md-12 col-xl-7">
                            <!--<div id="ordersChart" class="mt-md-3 mt-xl-0"></div>-->

                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                  <!-- CONTRACT EXPIRES -->
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">Proposals Under Client Review</h6></br></br>
                        <!--<div class="dropdown mb-2">
                            <a type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                            </div>
                        </div>-->
                        </div>
                        <div class="row">
                        <div class="col-6 col-md-12 col-xl-5">
                            <h3 class="mb-2" style="font-size: 50px"> {{ $review_proposals }} </h3>
                            <div class="d-flex align-items-baseline">
                           <!-- <p class="text-success">
                                <span>+2.8%</span>
                                <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                            </p>-->
                            </div>
                        </div>
                        <div class="col-6 col-md-12 col-xl-7">
                           <!-- <div id="growthChart" class="mt-md-3 mt-xl-0"></div>-->
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                <!-- ACTIVE CONTRACTS -->
                <div class="col-md-3 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">Denied Proposals</h6></br></br>
                        <!--<div class="dropdown mb-2">
                            <a type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="eye" class="icon-sm me-2"></i> <span class="">View</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="edit-2" class="icon-sm me-2"></i> <span class="">Edit</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="trash" class="icon-sm me-2"></i> <span class="">Delete</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="printer" class="icon-sm me-2"></i> <span class="">Print</span></a>
                            <a class="dropdown-item d-flex align-items-center" href="javascript:;"><i data-feather="download" class="icon-sm me-2"></i> <span class="">Download</span></a>
                            </div>
                        </div>-->
                        </div>
                        <div class="row">
                        <div class="col-6 col-md-12 col-xl-5">
                            <h3 class="mb-2" style="font-size: 50px"> {{ $denied_proposals }} </h3>
                            <div class="d-flex align-items-baseline">
                           <!-- <p class="text-success">
                                <span>+2.8%</span>
                                <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                            </p>-->
                            </div>
                        </div>
                        <div class="col-6 col-md-12 col-xl-7">
                           <!-- <div id="growthChart" class="mt-md-3 mt-xl-0"></div>-->
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
               </div>
            </div> <!-- row -->


</div>




@endsection

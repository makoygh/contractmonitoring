<nav class="sidebar">
      <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
          DQ<span> Contract</span>
        </a>
        <!--<img src="{{ asset('img/navi-logo.png') }} width='500' height='500'">-->
        <div class="sidebar-toggler not-active">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <li class="nav-item nav-category">Main</li>
          <li class="nav-item">
            <a href="{{ route('sales.dashboard') }}" class="nav-link">
              <i class="link-icon" data-feather="box"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item nav-category">Management</li>
          <!--<li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#users" role="button" aria-expanded="false" aria-controls="users">
              <i class="link-icon" data-feather="user"></i>
              <span class="link-title">User</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="users">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('admin.view.users') }}" class="nav-link">All Users</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('admin.register.user') }}" class="nav-link">Add User</a>
                </li>                
              </ul>
            </div>
          </li>-->
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#client" role="button" aria-expanded="false" aria-controls="client">
              <i class="link-icon" data-feather="users"></i>
              <span class="link-title">Client</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="client">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('sales.all.client') }}" class="nav-link">All Clients</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('sales.new.client') }}" class="nav-link">Add Client</a>
                </li>
              </ul>

          </li>
          <li class="nav-item">
            <a class="nav-link"  data-bs-toggle="collapse" href="#contract" role="button" aria-expanded="false" aria-controls="contract">
              <i class="link-icon" data-feather="book-open"></i>
              <span class="link-title">Contract</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="contract">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('sales.all.contracts') }}" class="nav-link">All Contracts</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('new.contract') }}" class="nav-link">Add Contract</a>
                </li>

              </ul>
          </li>

          <!-- LEADS -->
          <!--<li class="nav-item">
            <a class="nav-link"  data-bs-toggle="collapse" href="#leads" role="button" aria-expanded="false" aria-controls="leads">
              <i class="link-icon" data-feather="user-check"></i>
              <span class="link-title">Leads</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="leads">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="#" class="nav-link">All Leads</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">Add Lead</a>
                </li>
              </ul>
          </li>-->

          <li class="nav-item">
            <a class="nav-link"  data-bs-toggle="collapse" href="#proposals" role="button" aria-expanded="false" aria-controls="proposals">
              <i class="link-icon" data-feather="file-text"></i>
              <span class="link-title">Proposals</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="proposals">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('sales.all.proposals') }}" class="nav-link">All Proposals</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('sales.new.proposal') }}" class="nav-link">Add Proposal</a>
                </li>
                <!--<li class="nav-item">
                  <a href="#" class="nav-link">Schedule</a>
                </li>-->
              </ul>
          </li>

          
          <!-- REPORT -->
          <li class="nav-item nav-category">Report</li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#activeclients" role="button" aria-expanded="false" aria-controls="activeclients">
              <i class="link-icon" data-feather="users"></i>
              <span class="link-title">Clients</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="activeclients">
              <ul class="nav sub-menu">
              <li class="nav-item">
                  <a href="{{ route('sales.new.clients.report') }}" class="nav-link">New Clients</a>
                </li>   
              <li class="nav-item">
                  <a href="#" class="nav-link">Active Clients</a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">Inactive Clients</a>
                </li>                
                <!--<li class="nav-item">
                  <a href="#" class="nav-link">Roles</a>
                </li>-->
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link"  data-bs-toggle="collapse" href="#contracts" role="button" aria-expanded="false" aria-controls="contracts">
              <i class="link-icon" data-feather="book-open"></i>
              <span class="link-title">Contracts</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="contracts">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('sales.new.contracts.report') }}" class="nav-link">Active Contracts</a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('sales.all.expire.contracts') }}" class="nav-link">Approaching Expiration</a>
                </li>
                <!--<li class="nav-item">
                  <a href="#" class="nav-link">Schedule</a>
                </li>-->
              </ul>
          </li>


        </ul>
      </div>
    </nav>
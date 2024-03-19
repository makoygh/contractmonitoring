<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>Admin Panel - Contract Monitoring</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

<!-- Plugin css for Data Tables -->
<link rel="stylesheet" href="{{ asset('../assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
<!-- End plugin css for this page --> 

	<!-- core:css -->
	<link rel="stylesheet" href="{{ asset('../assets/vendors/core/core.css') }}">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="{{ asset('../assets/vendors/flatpickr/flatpickr.min.css') }}">
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('../assets/fonts/feather-font/css/iconfont.css') }}">
	<link rel="stylesheet" href="{{ asset('../assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{ asset('../assets/css/demo2/style.css') }}">
  <!-- End layout styles -->

  <!-- Notifications -->  
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

  <link rel="shortcut icon" href="{{ asset('../assets/images/favicon.png') }}" />
</head>
<body>
	<div class="main-wrapper">

		<!-- partial:partials/_sidebar.html -->
        @include('admin.body.sidebar')
    <!--
    <nav class="settings-sidebar">
      <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
          <i data-feather="settings"></i>
        </a>
        <div class="theme-wrapper">
          <h6 class="text-muted mb-2">Light Theme:</h6>
          <a class="theme-item" href="../demo1/dashboard.html">
            <img src="../assets/images/screenshots/light.jpg" alt="light theme">
          </a>
          <h6 class="text-muted mb-2">Dark Theme:</h6>
          <a class="theme-item active" href="../demo2/dashboard.html">
            <img src="../assets/images/screenshots/dark.jpg" alt="light theme">
          </a>
        </div>
      </div>
    </nav>-->
		<!-- partial -->
	
		<div class="page-wrapper">
					
			<!-- partial:partials/_navbar.html -->
        @include('admin.body.header')
			<!-- partial -->

	     <!-- page content here -->
         @yield('admin_dboard')

			<!-- partial:partials/_footer.html -->
        @include('admin.body.footer')
			<!-- partial -->
		
		</div>
	</div>

	


	<!-- core:js -->
	<script src="{{ asset('../assets/vendors/core/core.js') }}"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
  <script src="{{ asset('../assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('../assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{ asset('../assets/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('../assets/js/template.js') }}"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
  <script src="{{ asset('../assets/js/dashboard-dark.js') }}"></script>
	<!-- End custom js for this page -->

<!-- Notifications -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	
	<!-- Plugin js for data tables -->
	<script src="{{ asset('../assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('../assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
	<script src="{{ asset('../assets/js/data-table.js') }}"></script>
	<!-- End custom js for this page -->	

	<!-- Plugin js for Sweet Alert -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="{{ asset('../assets/js/code.js') }}"></script>
	<!-- End custom js for this page -->


  <script src="{{ asset('../assets/vendors/jquery-validation/jquery.validate.min.js') }}"></script>
  <!--<script src="{{ asset('../assets/js/form-validation.js') }}"></script>-->
  <script src="{{ asset('../assets/js/inputmask.js') }}"></script>
  <script src="{{ asset('../assets/vendors/inputmask/jquery.inputmask.min.js') }}"></script>
  <script src="{{ asset('../assets/vendors/inputmask/bindings/inputmask.binding.js') }}"></script>
  <!--<script src="{{ asset('../assets/js/select2.js') }}"></script>-->

  <!-- Charts -->
  <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
  <script src="{{ asset('../assets/vendors/apexcharts/apexcharts.min.js') }}"></script>

<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>	

<!-- Proposals Chart -->



<script>



      var proposal_data = {!! $quarterly_proposals !!}

      console.log(proposal_data);

      const months=[];
      const proposal_count=[];

      $.each(proposal_data, function(key, val){
        months.push(val.monthname);
        proposal_count.push(val.total);

      });

      console.log(months);

      var options = {
        chart: {
          type: 'bar'
        },
        series: [{
          name: 'sales',
          data: proposal_count //[30,40,35,50,49,60,70,91,125]
        }],
        xaxis: {
          categories: months //[1991,1992,1993,1994,1995,1996,1997, 1998,1999]
        }
      }

      var chart = new ApexCharts(document.querySelector("#chart"), options);

      chart.render();

    




</script>




</body>
</html>    
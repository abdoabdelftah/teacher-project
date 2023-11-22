<!DOCTYPE html>


<html lang="en" class="light-style layout-menu-fixed layout-compact " dir="rtl" data-theme="theme-default" data-assets-path="{{asset('student/assets/')}}" data-template="horizontal-menu-template">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>منصة الاستاذ خيرى</title>


    <meta name="description" content="Materialize – is the most developer friendly &amp; highly customizable Admin Dashboard Template." />
    <meta name="keywords" content="dashboard, material, material design, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">




    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="https://demos.pixinvent.com/materialize-html-admin-template/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;ampdisplay=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="{{asset('student/assets/vendor/fonts/materialdesignicons.css')}}" />
    <link rel="stylesheet" href="{{asset('student/assets/vendor/fonts/flag-icons.css')}}" />

    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="{{asset('student/assets/vendor/libs/node-waves/node-waves.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('student/assets/vendor/css/rtl/core.css')}}"  />
    <link rel="stylesheet" href="{{asset('student/assets/vendor/css/rtl/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('student/assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('student/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
    <link rel="stylesheet" href="{{asset('student/assets/vendor/libs/typeahead-js/typeahead.css')}}" />
    <link rel="stylesheet" href="{{asset('student/assets/vendor/libs/apex-charts/apex-charts.css')}}" />
<link rel="stylesheet" href="{{asset('student/assets/vendor/libs/swiper/swiper.css')}}" />

    <!-- Page CSS -->
    @yield('css')

    <!-- Helpers -->
    <script src="{{asset('student/assets/vendor/js/helpers.js')}}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js')}} in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js')}}.  -->
    <script src="{{asset('student/assets/vendor/js/template-customizer.js')}}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('student/assets/js/config.js')}}"></script>

</head>

<body>



  <!-- Layout wrapper -->
<div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
  <div class="layout-container">


<!-- Navbar -->


  <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="container-xxl">




      <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
        <a href="index-2.html" class="app-brand-link gap-2">
          <span class="app-brand-logo demo">
<span style="color:var(--bs-primary);">
  <svg width="268" height="150" viewBox="0 0 38 20" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M30.0944 2.22569C29.0511 0.444187 26.7508 -0.172113 24.9566 0.849138C23.1623 1.87039 22.5536 4.14247 23.5969 5.92397L30.5368 17.7743C31.5801 19.5558 33.8804 20.1721 35.6746 19.1509C37.4689 18.1296 38.0776 15.8575 37.0343 14.076L30.0944 2.22569Z" fill="currentColor" />
    <path d="M30.171 2.22569C29.1277 0.444187 26.8274 -0.172113 25.0332 0.849138C23.2389 1.87039 22.6302 4.14247 23.6735 5.92397L30.6134 17.7743C31.6567 19.5558 33.957 20.1721 35.7512 19.1509C37.5455 18.1296 38.1542 15.8575 37.1109 14.076L30.171 2.22569Z" fill="url(#paint0_linear_2989_100980)" fill-opacity="0.4" />
    <path d="M22.9676 2.22569C24.0109 0.444187 26.3112 -0.172113 28.1054 0.849138C29.8996 1.87039 30.5084 4.14247 29.4651 5.92397L22.5251 17.7743C21.4818 19.5558 19.1816 20.1721 17.3873 19.1509C15.5931 18.1296 14.9843 15.8575 16.0276 14.076L22.9676 2.22569Z" fill="currentColor" />
    <path d="M14.9558 2.22569C13.9125 0.444187 11.6122 -0.172113 9.818 0.849138C8.02377 1.87039 7.41502 4.14247 8.45833 5.92397L15.3983 17.7743C16.4416 19.5558 18.7418 20.1721 20.5361 19.1509C22.3303 18.1296 22.9391 15.8575 21.8958 14.076L14.9558 2.22569Z" fill="currentColor" />
    <path d="M14.9558 2.22569C13.9125 0.444187 11.6122 -0.172113 9.818 0.849138C8.02377 1.87039 7.41502 4.14247 8.45833 5.92397L15.3983 17.7743C16.4416 19.5558 18.7418 20.1721 20.5361 19.1509C22.3303 18.1296 22.9391 15.8575 21.8958 14.076L14.9558 2.22569Z" fill="url(#paint1_linear_2989_100980)" fill-opacity="0.4" />
    <path d="M7.82901 2.22569C8.87231 0.444187 11.1726 -0.172113 12.9668 0.849138C14.7611 1.87039 15.3698 4.14247 14.3265 5.92397L7.38656 17.7743C6.34325 19.5558 4.04298 20.1721 2.24875 19.1509C0.454514 18.1296 -0.154233 15.8575 0.88907 14.076L7.82901 2.22569Z" fill="currentColor" />
    <defs>
      <linearGradient id="paint0_linear_2989_100980" x1="5.36642" y1="0.849138" x2="10.532" y2="24.104" gradientUnits="userSpaceOnUse">
        <stop offset="0" stop-opacity="1" />
        <stop offset="1" stop-opacity="0" />
      </linearGradient>
      <linearGradient id="paint1_linear_2989_100980" x1="5.19475" y1="0.849139" x2="10.3357" y2="24.1155" gradientUnits="userSpaceOnUse">
        <stop offset="0" stop-opacity="1" />
        <stop offset="1" stop-opacity="0" />
      </linearGradient>
    </defs>
  </svg>
</span>
</span>
<span class="app-brand-text demo menu-text fw-bold ms-2">Khairy</span>
        </a>



        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-xl-none">
          <i class="mdi mdi-close align-middle"></i>
        </a>

      </div>




      <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0  d-xl-none  ">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
          <i class="mdi mdi-menu mdi-24px"></i>
        </a>
      </div>


      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">






        <ul class="navbar-nav flex-row align-items-center ms-auto">

            <!-- Quick links  -->
          <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-1 me-xl-0">
            <a class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
              <i class='mdi mdi-view-grid-plus-outline mdi-24px'></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end py-0">
              <div class="dropdown-menu-header border-bottom">
                <div class="dropdown-header d-flex align-items-center py-3">
                  <h5 class="text-body mb-0 me-auto">Shortcuts</h5>
                  <a href="javascript:void(0)" class="dropdown-shortcuts-add text-muted" data-bs-toggle="tooltip" data-bs-placement="top" title="Add shortcuts"><i class="mdi mdi-view-grid-plus-outline mdi-24px"></i></a>
                </div>
              </div>
              <div class="dropdown-shortcuts-list scrollable-container">
                <div class="row row-bordered overflow-visible g-0">
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                      <i class="mdi mdi-calendar fs-4"></i>
                    </span>
                    <a href="app-calendar.html" class="stretched-link">Calendar</a>
                    <small class="text-muted mb-0">Appointments</small>
                  </div>
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                      <i class="mdi mdi-file-document-outline fs-4"></i>
                    </span>
                    <a href="app-invoice-list.html" class="stretched-link">Invoice App</a>
                    <small class="text-muted mb-0">Manage Accounts</small>
                  </div>
                </div>
                <div class="row row-bordered overflow-visible g-0">
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                      <i class="mdi mdi-account-outline fs-4"></i>
                    </span>
                    <a href="app-user-list.html" class="stretched-link">User App</a>
                    <small class="text-muted mb-0">Manage Users</small>
                  </div>
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                      <i class="mdi mdi-shield-check-outline fs-4"></i>
                    </span>
                    <a href="app-access-roles.html" class="stretched-link">Role Management</a>
                    <small class="text-muted mb-0">Permission</small>
                  </div>
                </div>
                <div class="row row-bordered overflow-visible g-0">
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                      <i class="mdi mdi-chart-pie-outline fs-4"></i>
                    </span>
                    <a href="index-2.html" class="stretched-link">Dashboard</a>
                    <small class="text-muted mb-0">Analytics</small>
                  </div>
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                      <i class="mdi mdi-cog-outline fs-4"></i>
                    </span>
                    <a href="pages-account-settings-account.html" class="stretched-link">Setting</a>
                    <small class="text-muted mb-0">Account Settings</small>
                  </div>
                </div>
                <div class="row row-bordered overflow-visible g-0">
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                      <i class="mdi mdi-help-circle-outline fs-4"></i>
                    </span>
                    <a href="pages-faq.html" class="stretched-link">FAQs</a>
                    <small class="text-muted mb-0">FAQs & Articles</small>
                  </div>
                  <div class="dropdown-shortcuts-item col">
                    <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                      <i class="mdi mdi-dock-window fs-4"></i>
                    </span>
                    <a href="modal-examples.html" class="stretched-link">Modals</a>
                    <small class="text-muted mb-0">Useful Popups</small>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <!-- Quick links -->

          <!-- Notification -->
          <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-2 me-xl-1">
            <a class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
              <i class="mdi mdi-bell-outline mdi-24px"></i>
              <span class="position-absolute top-0 start-50 translate-middle-y badge badge-dot bg-danger mt-2 border"></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end py-0">
              <li class="dropdown-menu-header border-bottom">
                <div class="dropdown-header d-flex align-items-center py-3">
                  <h6 class="mb-0 me-auto">Notification</h6>
                  <span class="badge rounded-pill bg-label-primary">8 New</span>
                </div>
              </li>
              <li class="dropdown-notifications-list scrollable-container">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item list-group-item-action dropdown-notifications-item">
                    <div class="d-flex gap-2">
                      <div class="flex-shrink-0">
                        <div class="avatar me-1">
                          <img src="{{ asset('admin/assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle">
                        </div>
                      </div>
                      <div class="d-flex flex-column flex-grow-1 overflow-hidden w-px-200">
                        <h6 class="mb-1 text-truncate">قام الطالب بالاجابة على الامتحان</h6>
                        <small class="text-truncate text-body">جارى</small>
                      </div>
                      <div class="flex-shrink-0 dropdown-notifications-actions">
                        <small class="text-muted">منذ دقيقة</small>
                      </div>
                    </div>
                  </li>

                </ul>
              </li>
              <li class="dropdown-menu-footer border-top p-2">
                <a href="javascript:void(0);" class="btn btn-primary d-flex justify-content-center">
                  الاطلاع على الكل
                </a>
              </li>
            </ul>
          </li>
          <!--/ Notification -->

          <!-- User -->
          <li class="nav-item navbar-dropdown dropdown-user dropdown">
            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
              <div class="avatar avatar-online">
                <img src="{{ asset('assets/images/faces/face8.jpg') }}" alt class="w-px-40 h-auto rounded-circle">
              </div>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item" href="#">
                  <div class="d-flex">
                    <div class="flex-shrink-0 me-3">
                      <div class="avatar avatar-online">
                        <img src="{{ asset('assets/images/faces/face8.jpg') }}" alt class="w-px-40 h-auto rounded-circle">
                      </div>
                    </div>
                    <div class="flex-grow-1">
                      <span class="fw-medium d-block">محمد خيرى</span>
                      <small class="text-muted">ادمن</small>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <div class="dropdown-divider"></div>
              </li>

              <li>
                <a class="dropdown-item" href="#" >
                  <i class="mdi mdi-logout me-2"></i>
                  <span class="align-middle">تسجيل الخروج</span>
                </a>
              </li>
            </ul>
          </li>
          <!--/ User -->



        </ul>
      </div>





    </div>
  </nav>


<!-- / Navbar -->



    <!-- Layout container -->
    <div class="layout-page">

      <!-- Content wrapper -->
      <div class="content-wrapper">







<!-- Menu -->
<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal  menu bg-menu-theme flex-grow-0">
  <div class="container-xxl d-flex h-100">


    <ul class="menu-inner">

      <!-- Dashboards -->
      <li class="menu-item
 active">
        <a href="javascript:void(0)" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons mdi mdi-home-outline"></i>
          <div data-i18n="Dashboards">Dashboards</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item">
            <a href="app-ecommerce-dashboard.html" class="menu-link">
              <i class="menu-icon tf-icons mdi mdi-cart-outline"></i>
              <div data-i18n="eCommerce">eCommerce</div>
            </a>
          </li>
        </ul>
      </li>

    </ul>


  </div>
</aside>
<!-- / Menu -->


        <!-- Content -->

          <div class="container-xxl flex-grow-1 container-p-y">




            @yield('content')




          </div>
          <!--/ Content -->



 <!-- Footer -->
 <footer class="content-footer footer bg-footer-theme">
    <div class="container-fluid">
      <div class="footer-container d-flex align-items-center justify-content-between py-3 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
          © <script>
          document.write(new Date().getFullYear())

          </script> By Abdelfattah</a>
        </div>
        <div class="d-none d-lg-inline-block">


        </div>
      </div>
    </div>
  </footer>
  <!-- / Footer -->


          <div class="content-backdrop fade"></div>
        </div>
        <!--/ Content wrapper -->
      </div>

      <!--/ Layout container -->
    </div>

  </div>



  <!-- Overlay -->
  <div class="layout-overlay layout-menu-toggle"></div>


  <!-- Drag Target Area To SlideIn Menu On Small Screens -->
  <div class="drag-target"></div>

  <!-- Layout wrapper -->




  <script src="{{asset('student/assets/vendor/libs/jquery/jquery.js')}}"></script>
  <script src="{{asset('student/assets/vendor/libs/popper/popper.js')}}"></script>
  <script src="{{asset('student/assets/vendor/js/bootstrap.js')}}"></script>
  <script src="{{asset('student/assets/vendor/libs/node-waves/node-waves.js')}}"></script>
  <script src="{{asset('student/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
  <script src="{{asset('student/assets/vendor/libs/hammer/hammer.js')}}"></script>
  <script src="{{asset('student/assets/vendor/libs/i18n/i18n.js')}}"></script>
  <script src="{{asset('student/assets/vendor/libs/typeahead-js/typeahead.js')}}"></script>
  <script src="{{asset('student/assets/vendor/js/menu.js')}}"></script>

  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="{{asset('student/assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>
<script src="{{asset('student/assets/vendor/libs/swiper/swiper.js')}}"></script>

  <!-- Main JS -->
  <script src="{{asset('student/assets/js/main.js')}}"></script>


  <!-- Page JS -->
  <script src="{{asset('student/assets/js/dashboards-analytics.js')}}"></script>

  @if(Session::has('message'))
  <!-- Display toast when session has message -->
  <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <script>
      Toastify({
          text: "{{ Session::get('message') }}",
          duration: 3000,  // Display duration in milliseconds
          gravity: "top",  // Position of the toast
          close: true  // Show close button
      }).showToast();
  </script>
@endif

@yield('js')

</body>

</html>

<!-- beautify ignore:end -->

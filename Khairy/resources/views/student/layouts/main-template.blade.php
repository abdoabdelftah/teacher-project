<!DOCTYPE html>
<html lang="ar" dir="rtl">
  
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>استاذ محمد خيرى</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/chartist/chartist.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/demo_1/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
  </head>
  <body class="rtl">
    <div class="container-scroller">
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
         <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        
          <a class="navbar-brand brand-logo-mini" href="{{url('/grades')}}"><img src="{{ asset('assets/images/test.png') }}" alt="logo" /></a>
         <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
          </button>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">مرحبا بك فى لوحة التحكم استاذ محمد خيرى!</h5>
          
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <div class="container-fluid page-body-wrapper">
        <div id="settings-trigger"><i class="icon-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close icon-close"></i>
          <p class="settings-heading">جلود الشريط الجانبي</p>
          <div class="sidebar-bg-options selected" id="sidebar-default-theme">
            <div class="img-ss rounded-circle bg-dark border mr-3"></div>الإفتراضي
          </div>
          <div class="sidebar-bg-options" id="sidebar-light-theme">
            <div class="img-ss rounded-circle bg-light border mr-3"></div>ضوء
          </div>
          <p class="settings-heading mt-2">لون الرأس</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles dark"></div>
            <div class="tiles default light"></div>
          </div>
        </div>
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item navbar-brand-mini-wrapper">
              <a class="nav-link navbar-brand brand-logo-mini" href="../../index.html"><img src="{{ asset('assets/images/logo-mini.svg') }}" alt="logo" /></a>
            </li>
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                  <img class="img-xs rounded-circle" src="{{ asset('assets/images/faces/face8.jpg') }}" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">استاذ محمد خيرى</p>
                  <p class="designation"></p>
                </div>
                <div class="icon-container">
                 
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">لوحة القيادة</span>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../../index.html">
                <span class="menu-title">لوحة القيادة</span>
                <i class="icon-screen-desktop menu-icon"></i>
              </a>
            </li>
         
          </ul>
        </nav>
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Quick Action Toolbar Starts-->
            <div class="row quick-action-toolbar">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-header d-block d-md-flex">
                    <h5 class="mb-0">إجراءات سريعة</h5>
                    <p class="mr-auto mb-0">كيف هي اتجاه المستخدمين النشطين مع مرور الوقت؟<i class="icon-bulb"></i></p>
                  </div>
                  <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
                    <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                      <button type="button" class="btn px-0"> <i class="icon-user ml-2"></i> إضافة عميل</button>
                    </div>
                    <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                      <button type="button" class="btn px-0"><i class="icon-docs ml-2"></i> خلق الاقتباس</button>
                    </div>
                    <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                      <button type="button" class="btn px-0"><i class="icon-folder ml-2"></i> أدخل الدفع</button>
                    </div>
                    <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                      <button type="button" class="btn px-0"><i class="icon-book-open ml-2"></i>إنشاء فاتورة</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Quick Action Toolbar Ends-->
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row income-expense-summary-chart-text">
                      <div class="col-xl-4">
                        <h5>ملخص الدخل والنفقات</h5>
                        <p class="small text-muted">مقارنة بين الأشخاص وفقًا للنطاق الزمني الموضح أعلاه. تعرف أكثر.</p>
                      </div>
                      <div class=" col-md-3 col-xl-2">
                        <p class="income-expense-summary-chart-legend"> <span style="border-color: #6469df"></span> إجمالي الدخل </p>
                        <h3>$ 1,766.00</h3>
                      </div>
                      <div class="col-md-3 col-xl-2">
                        <p class="income-expense-summary-chart-legend"> <span style="border-color: #37ca32"></span> المصروفات الكلية </p>
                        <h3>$ 5,698.30</h3>
                      </div>
                      <div class="col-md-6 col-xl-4 d-flex align-items-center">
                        <div class="input-group mr-auto" id="income-expense-summary-chart-daterange">
                          <div class="inpu-group-prepend input-group-text"><i class="icon-calendar"></i></div>
                          <input type="text" class="form-control">
                          <div class="input-group-prepend input-group-text"><i class="icon-arrow-down"></i></div>
                        </div>
                      </div>
                    </div>
                    <div class="row income-expense-summary-chart mt-3">
                      <div class="col-md-12">
                        <div class="ct-chart" id="income-expense-summary-chart"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="d-sm-flex align-items-baseline report-summary-header">
                          <h5 class="font-weight-semibold">ملخص تقرير</h5> <span class="mr-auto">تقرير محدث</span> <button class="btn btn-icons border-0 p-2"><i class="icon-refresh"></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="row report-inner-cards-wrapper">
                      <div class=" col-md -6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">مصروف</span>
                          <h4>$32123</h4>
                          <span class="report-count"> 2 تقارير</span>
                        </div>
                        <div class="inner-card-icon bg-success">
                          <i class="icon-rocket"></i>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">شراء</span>
                          <h4>95,458</h4>
                          <span class="report-count"> 3 تقارير</span>
                        </div>
                        <div class="inner-card-icon bg-danger">
                          <i class="icon-briefcase"></i>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">كمية</span>
                          <h4>2650</h4>
                          <span class="report-count"> 5 تقارير</span>
                        </div>
                        <div class="inner-card-icon bg-warning">
                          <i class="icon-globe-alt"></i>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">إرجاع</span>
                          <h4>25,542</h4>
                          <span class="report-count"> 9 تقارير</span>
                        </div>
                        <div class="inner-card-icon bg-primary">
                          <i class="icon-diamond"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 col-xl-4 grid-margin stretch-card">
                <div class="card sessions-progress-bar-card">
                  <div class="card-header">
                    <h4>جلسات الدول</h4>
                  </div>
                  <div class="card-body">
                    <ul class="dashboard-progress-bar-wrapper m-0">
                      <li>
                        <div class="d-flex justify-content-between">
                          <h6>1. هولندا</h6>
                          <p class="font-weight-semibold">$380.50 <span class="text-muted font-weight-normal">(1.51%)</span></p>
                        </div>
                        <div class="progress progress-md">
                          <div class="progress-bar bg-primary" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </li>
                      <li>
                        <div class="d-flex justify-content-between">
                          <h6>2. الولايات المتحدة الامريكيه</h6>
                          <p class="font-weight-semibold">$503.20 <span class="text-muted font-weight-normal">(13.45%)</span></p>
                        </div>
                        <div class="progress progress-md">
                          <div class="progress-bar bg-info" role="progressbar" style="width: 75%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </li>
                      <li>
                        <div class="d-flex justify-content-between">
                          <h6>3. المملكة المتحدة</h6>
                          <p class="font-weight-semibold">$421.80 <span class="text-muted font-weight-normal">(1.51%)</span></p>
                        </div>
                        <div class="progress progress-md">
                          <div class="progress-bar bg-danger" role="progressbar" style="width: 60%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </li>
                      <li>
                        <div class="d-flex justify-content-between">
                          <h6>4. كندا</h6>
                          <p class="font-weight-semibold">$850.30 <span class="text-muted font-weight-normal">(1.51%)</span></p>
                        </div>
                        <div class="progress progress-md">
                          <div class="progress-bar bg-warning" role="progressbar" style="width: 55%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </li>
                      <li>
                        <div class="d-flex justify-content-between">
                          <h6>5. أستراليا</h6>
                          <p class="font-weight-semibold">$380.50 <span class="text-muted font-weight-normal">(1.51%)</span></p>
                        </div>
                        <div class="progress progress-md">
                          <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-6 col-xl-4 grid-margin stretch-card">
                <div class="card dashboard-inline-datepicker datepicker-custom">
                  <div class="card-body">
                    <div id="dashboard-inline-datepicker"></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 grid-margin stretch-card">
                <div class="card quick-status-card">
                  <div class="card-body">
                    <h4 class="card-title">لمحة سريعة</h4>
                    <div class="row">
                      <div class="col-md-6 px-2">
                        <div id="circle-progress-1"></div>
                      </div>
                      <div class="col-md-6 px-2">
                        <div id="circle-progress-2"></div>
                      </div>
                    </div>
                    <div class="row mt-5">
                      <div class="col-12 px-1">
                        <div class="wrapper py-4 d-flex border-bottom">
                          <span class="icon-holder">
                            <i class="icon-wallet"></i>
                          </span>
                          <div class="mr-3">
                            <p class="mb-1">رصيدي</p>
                            <h6 class="mb-0">$5021.00</h6>
                          </div>
                          <div class="mr-auto"><i class="icon-arrow-down-circle"></i><span class="text-muted ml-2">2.87 %</span></div>
                        </div>
                        <div class="wrapper py-4 d-flex">
                          <span class="icon-holder">
                            <i class="icon-basket-loaded"></i>
                          </span>
                          <div class="mr-3">
                            <p class="mb-1">إيرادات المبيعات</p>
                            <h6 class="mb-0"></h6>24,301.00</h6>
                          </div>
                          <div class="mr-auto"><i class="icon-arrow-down-circle"></i><span class="text-muted ml-2">2.87 %</span></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card social-card card-colored twitter-card">
                  <div class="card-body d-flex flex-wrap align-items-center justify-content-center">
                    <i class="icon-social-twitter flex-shrink-0"></i>
                    <div class="wrapper mr-3">
                      <h5 class="mb-0">متابعين تويتر</h5>
                      <h1 class="mb-0">3200+</h1>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card social-card card-colored facebook-card">
                  <div class="card-body d-flex flex-wrap align-items-center justify-content-center">
                    <i class="icon-social-facebook flex-shrink-0"></i>
                    <div class="wrapper mr-3">
                      <h5 class="mb-0">اعجابات الفيسبوك</h5>
                      <h1 class="mb-0">1500+</h1>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card social-card card-colored instagram-card">
                  <div class="card-body d-flex flex-wrap align-items-center justify-content-center">
                    <i class="icon-social-instagram flex-shrink-0"></i>
                    <div class="wrapper mr-3">
                      <h5 class="mb-0">المشاركات انستغرام</h5>
                      <h1 class="mb-0">2320+</h1>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">جلسات عن طريق القناة</h4>
                    <div class="aligner-wrapper py-3">
                      <canvas id="sessionsDoughnutChart" height="210"></canvas>
                      <div class="wrapper d-flex flex-column justify-content-center absolute absolute-center">
                        <h2 class="text-center mb-0 font-weight-bold">8.234</h2>
                        <small class="d-block text-center text-muted  font-weight-medium mb-0">مجموع العملاء المحتملين</small>
                      </div>
                    </div>
                    <div class="wrapper mt-4 d-flex flex-wrap align-items-cente">
                      <div class="d-flex">
                        <span class="square-indicator bg-danger mr-2"></span>
                        <p class="mb-0 mr-2">المخصصة لشخص ما</p>
                      </div>
                      <div class="d-flex">
                        <span class="square-indicator bg-success mr-2"></span>
                        <p class="mb-0 mr-2">لم يتم تخصيصه لأحد</p>
                      </div>
                      <div class="d-flex">
                        <span class="square-indicator bg-warning mr-2"></span>
                        <p class="mb-0 mr-2">إعادة التعيين لشخص آخر</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body performane-indicator-card">
                    <div class="d-sm-flex">
                      <h4 class="card-title flex-shrink-1">مؤشر الأداء</h4>
                      <p class="m-sm-0 mr-sm-auto flex-shrink-0">
                        <span class="data-time-range ml-0">7d</span>
                        <span class="data-time-range active">2w</span>
                        <span class="data-time-range">1m</span>
                        <span class="data-time-range">3m</span>
                        <span class="data-time-range">6m</span>
                      </p>
                    </div>
                    <div class="d-sm-flex flex-wrap mt-3">
                      <div class="d-flex align-items-center">
                        <span class="dot-indicator bg-primary mr-2"></span>
                        <p class="mb-0 mr-2 text-muted font-weight-semibold">شكاوي (2098)</p>
                      </div>
                      <div class="d-flex align-items-center">
                        <span class="dot-indicator bg-info mr-2"></span>
                        <p class="mb-0 mr-2 text-muted font-weight-semibold"> مهمة القيام به (1123)</p>
                      </div>
                      <div class="d-flex align-items-center">
                        <span class="dot-indicator bg-danger mr-2"></span>
                        <p class="mb-0 mr-2 text-muted font-weight-semibold">حضر (876)</p>
                      </div>
                    </div>
                    <div id="performance-indicator-chart" class="ct-chart mt-5"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xl-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center">
                      <h4 class="card-title mb-0">النشاط الاخير</h4>
                      <a href="#" class="btn btn-outline-info border-0 font-weight-semibold mr-auto p-0 btn-no-hover-bg">شاهد المزيد</a>
                    </div>
                    <div class="d-flex mt-4 py-3 border-bottom">
                      <img class="img-sm rounded-circle" src="{{ asset('assets/images/faces/face3.jpg') }}" alt="profile image">
                      <div class="wrapper mr-2">
                        <p class="mb-1 font-weight-medium">إعادة تصميم تطبيق الجوال</p>
                        <small class="text-muted">+23 منذ العام الماضي</small>
                      </div>
                      <small class="text-muted mr-auto">10:07PM</small>
                    </div>
                    <div class="d-flex py-3 border-bottom">
                      <img class="img-sm rounded-circle" src="{{ asset('assets/images/faces/face2.jpg') }}">
                      <div class="wrapper mr-2">
                        <p class="mb-1 font-weight-medium">دعوة للتعاون على تطبيق...</p>
                        <small class="text-muted">+23 منذ العام الماضي</small>
                      </div>
                      <small class="text-muted mr-auto">01:07AM</small>
                    </div>
                    <div class="d-flex py-3 border-bottom">
                      <img class="img-sm rounded-circle" src="{{ asset('assets/images/faces/face4.jpg') }}" alt="profile image">
                      <div class="wrapper mr-2">
                        <p class="mb-1 font-weight-medium">إعادة تصميم الموقع</p>
                        <small class="text-muted">+23 منذ العام الماضي</small>
                      </div>
                      <small class="text-muted mr-auto">04:42AM</small>
                    </div>
                    <div class="d-flex py-3  border-bottom">
                      <img class="img-sm rounded-circle" src="{{ asset('assets/images/faces/face8.jpg') }}">
                      <div class="wrapper mr-2">
                        <p class="mb-1 font-weight-medium">تحليلات لوحة القيادة</p>
                        <small class="text-muted">+23 منذ العام الماضي</small>
                      </div>
                      <small class="text-muted mr-auto">07:44PM</small>
                    </div>
                    <div class="d-flex pt-3">
                      <img class="img-sm rounded-circle" src="{{ asset('assets/images/faces/face7.jpg') }}">
                      <div class="wrapper mr-2">
                        <p class="mb-1 font-weight-medium">تصميم شعار كبير</p>
                        <small class="text-muted">+23 منذ العام الماضي</small>
                      </div>
                      <small class="text-muted mr-auto">10:49AM</small>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xl-8 grid-margin stretch-card">
                <div class="card sales-report-country">
                  <div class="card-body">
                    <div class="d-md-flex">
                      <h4 class="card-title">أداء المبيعات حسب البلد</h4>
                      <div class="mb-2 m-md-0 mr-md-auto">
                        <a href="#" class="text-secondary ml-3"><i class="icon-cloud-upload ml-3"></i> ملف التصدير</a>
                        <a href="#" class="text-secondary ml-3"><i class="icon-printer ml-3"></i>اطبع الملف</a>
                      </div>
                    </div>
                    <div class="row my-xl-3">
                      <div class="col-md-12 d-md-flex">
                        <div>
                          <h1 class="font-weight-bold mb-0">136,356.00</h1>
                          <p class="text-muted">+23 منذ العام الماضي</p>
                        </div>
                        <div class="mr-md-3">
                          <p class="mb-0 mt-2">أداء المبيعات لجميع الدول في العالم</p>
                          <p class="mb-0">هذا هو أحدث أرباحك لتاريخ اليوم.</p>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xl-4 pt-3">
                        <div class="row">
                          <div class="pb-xl-3 col-sm-6 col-xl-12 sales-activity">
                            <p class="mb-1">التنشيط</p>
                            <h1 class="font-weight-bold mb-0 text-info">156,123</h1>
                            <p class="text-muted">محدث-6:16 pm</p>
                          </div>
                          <div class="pt-xl-3 col-sm-6 col-xl-12 sales-activity">
                            <p class="mb-0">صافي الإيرادات</p>
                            <h1 class="font-weight-bold mb-0 text-primary">331,520</h1>
                            <p class="text-muted pb-0">محدث-5:14 pm</p>
                          </div>
                        </div>
                      </div>
                      <div class="col-xl-8">
                        <div id="dashboard-vmap" class="vector-map"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h4 class="card-title mb-sm-0">مخزون المنتجات</h4>
                      <a href="#" class="text-dark mr-auto mb-3 mb-sm-0"> عرض جميع المنتجات</a>
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="font-weight-bold">معرف المتجر</th>
                            <th class="font-weight-bold">يستحق</th>
                            <th class="font-weight-bold">بوابة</th>
                            <th class="font-weight-bold">أنشئت في</th>
                            <th class="font-weight-bold">المدفوعة على</th>
                            <th class="font-weight-bold">حالة</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <img class="img-sm rounded-circle" src="{{ asset('assets/images/faces/face1.jpg') }}" alt="profile image"> Katie Holmes </td>
                            <td>$3621</td>
                            <td><img src="{{ asset('assets/images/dashboard/alipay.png') }}" alt="alipay" class="gateway-icon ml-2"> alipay</td>
                            <td>04 يونيو 2019</td>
                            <td>18 يوليو 2019</td>
                            <td>
                              <div class="badge badge-success p-2">تم الدفع</div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <img class="img-sm rounded-circle" src="{{ asset('assets/images/faces/face2.jpg') }}" alt="profile image"> Minnie Copeland </td>
                            <td>$6245</td>
                            <td><img src="{{ asset('assets/images/dashboard/paypal.png') }}" alt="alipay" class="gateway-icon ml-2"> باي بال</td>
                            <td>25 سبتمبر 2019</td>
                            <td>07 شهر اكتوبر 2019</td>
                            <td>
                              <div class="badge badge-danger p-2">قيد الانتظار</div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <img class="img-sm rounded-circle" src="{{ asset('assets/images/faces/face3.jpg') }}" alt="profile image"> Rodney Sims </td>
                            <td>$9265</td>
                            <td><img src="{{ asset('assets/images/dashboard/alipay.png') }}" alt="alipay" class="gateway-icon ml-2"> alipay</td>
                            <td>12 dec 2019</td>
                            <td>26 أغسطس 2019</td>
                            <td>
                              <div class="badge badge-warning p-2">فشلت</div>
                            </td>
                          </tr>
                          <tr>
                            <td>
                              <img class="img-sm rounded-circle" src="{{ asset('assets/images/faces/face4.jpg') }}" alt="profile image"> Carolyn Barker </td>
                            <td>$2263</td>
                            <td><img src="{{ asset('assets/images/dashboard/alipay.png') }}" alt="alipay" class="gateway-icon ml-2"> alipay</td>
                            <td>30 سبتمبر 2019</td>
                            <td>20 شهر اكتوبر 2019</td>
                            <td>
                              <div class="badge badge-success p-2">تم الدفع</div>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="d-flex mt-4 flex-wrap">
                      <p class="text-muted">إظهار 1 إلى 10 من أصل 57 مُدخل</p>
                      <nav class="mr-auto">
                        <ul class="pagination separated pagination-info">
                          <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-left"></i></a></li>
                          <li class="page-item active"><a href="#" class="page-link">1</a></li>
                          <li class="page-item"><a href="#" class="page-link">2</a></li>
                          <li class="page-item"><a href="#" class="page-link">3</a></li>
                          <li class="page-item"><a href="#" class="page-link">4</a></li>
                          <li class="page-item"><a href="#" class="page-link"><i class="icon-arrow-right"></i></a></li>
                        </ul>
                      </nav>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">حقوق الطبع والنشر © 2019 Stellar. كل الحقوق محفوظة. <a href="#"> شروط الاستخدام</a><a href="#">سياسة الخصوصية</a></span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">اليدوية والمصنوعة من <i class="icon-heart text-danger"></i></span>
            </div>
          </footer>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/moment/moment.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/vendors/chartist/chartist.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>
    <!-- End custom js for this page -->
  </body>

</html>
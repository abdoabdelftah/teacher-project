<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-wide " data-theme="theme-default" dir="rtl"
    data-assets-path="{{ asset('admin/assets/') }}" data-template="front-pages">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>لوحة تحكم منصة الاستاذ خيرى</title>


    <!-- Favicon -->
    <link rel="icon" type="image/x-icon"
        href="" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;ampdisplay=swap"
        rel="stylesheet">


    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/fonts/materialdesignicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/node-waves/node-waves.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/rtl/core.css') }}"/>
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/rtl/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/demo.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/pages/front-page.css') }}" />
    <!-- Vendors CSS -->

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/nouislider/nouislider.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/swiper/swiper.css') }}" />

    <!-- Page CSS -->


    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/pages/front-page-landing.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <style>

    .custom-btn {
    padding: 10px 20px;
    background-color: #666CFF;
    color: #fff;
    border: none;
    border-radius: 30px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.custom-btn:hover {
    background-color: #0056b3;
}


</style>\
    <!-- Helpers -->
    <script src="{{ asset('admin/assets/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('admin/assets/vendor/js/template-customizer.js') }}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('admin/assets/js/config.js') }}"></script>

</head>

<body>




    <script src="{{ asset('admin/assets/vendor/js/dropdown-hover.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/js/mega-dropdown.js') }}"></script>

    <!-- Navbar: Start -->
    <nav class="layout-navbar container shadow-none py-0">
        <div class="navbar navbar-expand-lg landing-navbar border-top-0 px-3 px-md-4">
            <!-- Menu logo wrapper: Start -->
            <div class="navbar-brand app-brand demo d-flex py-0 py-lg-2 me-4">
                <!-- Mobile menu toggle: Start-->
                <button class="navbar-toggler border-0 px-0 me-2" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="tf-icons mdi mdi-menu mdi-24px align-middle"></i>
                </button>
                <!-- Mobile menu toggle: End-->
                <a href="landing-page.html" class="app-brand-link">
                    <span class="app-brand-logo demo">
                        <span style="color:#666cff;">
                            <svg width="268" height="150" viewBox="0 0 38 20" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M30.0944 2.22569C29.0511 0.444187 26.7508 -0.172113 24.9566 0.849138C23.1623 1.87039 22.5536 4.14247 23.5969 5.92397L30.5368 17.7743C31.5801 19.5558 33.8804 20.1721 35.6746 19.1509C37.4689 18.1296 38.0776 15.8575 37.0343 14.076L30.0944 2.22569Z"
                                    fill="currentColor" />
                                <path
                                    d="M30.171 2.22569C29.1277 0.444187 26.8274 -0.172113 25.0332 0.849138C23.2389 1.87039 22.6302 4.14247 23.6735 5.92397L30.6134 17.7743C31.6567 19.5558 33.957 20.1721 35.7512 19.1509C37.5455 18.1296 38.1542 15.8575 37.1109 14.076L30.171 2.22569Z"
                                    fill="url(#paint0_linear_2989_100980)" fill-opacity="0.4" />
                                <path
                                    d="M22.9676 2.22569C24.0109 0.444187 26.3112 -0.172113 28.1054 0.849138C29.8996 1.87039 30.5084 4.14247 29.4651 5.92397L22.5251 17.7743C21.4818 19.5558 19.1816 20.1721 17.3873 19.1509C15.5931 18.1296 14.9843 15.8575 16.0276 14.076L22.9676 2.22569Z"
                                    fill="currentColor" />
                                <path
                                    d="M14.9558 2.22569C13.9125 0.444187 11.6122 -0.172113 9.818 0.849138C8.02377 1.87039 7.41502 4.14247 8.45833 5.92397L15.3983 17.7743C16.4416 19.5558 18.7418 20.1721 20.5361 19.1509C22.3303 18.1296 22.9391 15.8575 21.8958 14.076L14.9558 2.22569Z"
                                    fill="currentColor" />
                                <path
                                    d="M14.9558 2.22569C13.9125 0.444187 11.6122 -0.172113 9.818 0.849138C8.02377 1.87039 7.41502 4.14247 8.45833 5.92397L15.3983 17.7743C16.4416 19.5558 18.7418 20.1721 20.5361 19.1509C22.3303 18.1296 22.9391 15.8575 21.8958 14.076L14.9558 2.22569Z"
                                    fill="url(#paint1_linear_2989_100980)" fill-opacity="0.4" />
                                <path
                                    d="M7.82901 2.22569C8.87231 0.444187 11.1726 -0.172113 12.9668 0.849138C14.7611 1.87039 15.3698 4.14247 14.3265 5.92397L7.38656 17.7743C6.34325 19.5558 4.04298 20.1721 2.24875 19.1509C0.454514 18.1296 -0.154233 15.8575 0.88907 14.076L7.82901 2.22569Z"
                                    fill="currentColor" />
                                <defs>
                                    <linearGradient id="paint0_linear_2989_100980" x1="5.36642" y1="0.849138"
                                        x2="10.532" y2="24.104" gradientUnits="userSpaceOnUse">
                                        <stop offset="0" stop-opacity="1" />
                                        <stop offset="1" stop-opacity="0" />
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_2989_100980" x1="5.19475" y1="0.849139"
                                        x2="10.3357" y2="24.1155" gradientUnits="userSpaceOnUse">
                                        <stop offset="0" stop-opacity="1" />
                                        <stop offset="1" stop-opacity="0" />
                                    </linearGradient>
                                </defs>
                            </svg>
                        </span>
                    </span>
                    <span class="app-brand-text demo menu-text fw-bold ms-2 ps-1">Khairy</span>
                </a>
            </div>
            <!-- Menu logo wrapper: End -->
            <!-- Menu wrapper: Start -->
            <div class="collapse navbar-collapse landing-nav-menu" id="navbarSupportedContent">
                <button class="navbar-toggler border-0 text-heading position-absolute end-0 top-0 scaleX-n1-rtl"
                    type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="tf-icons mdi mdi-close"></i>
                </button>
                <ul class="navbar-nav me-auto p-3 p-lg-0">


                </ul>
            </div>
            <div class="landing-menu-overlay d-lg-none"></div>
            <!-- Menu wrapper: End -->
            <!-- Toolbar: Start -->
            <ul class="navbar-nav flex-row align-items-center ms-auto">

                <!-- Style Switcher -->
                <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                        data-bs-toggle="dropdown">
                        <i class='mdi mdi-24px'></i>
                    </a>

                </li>
                <!-- / Style Switcher-->


                <!-- navbar button: Start -->
                <li>
                    <a href="/admin/students"
                        class="btn btn-primary px-2 px-sm-4 px-lg-2 px-xl-4" ><span
                            class="tf-icons mdi mdi-account me-md-1"></span><span
                            class="d-none d-md-block">الرجوع الى لوحة التحكم</span></a>
                </li>
                <!-- navbar button: End -->
            </ul>
            <!-- Toolbar: End -->
        </div>
    </nav>
    <!-- Navbar: End -->


    <!-- Sections:Start -->


    <div data-bs-spy="scroll" class="scrollspy-example">
        <!-- Hero: Start -->
        <section id="landingHero" class="section-py landing-hero">
            <div class="container">

                <div class="card">
                    <div class="card-body">


                        <label > الصورة الرئيسية</label>
                        <form method="POST" action="{{ route('updateInfoFront.page') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="input-group">
                           <input type="hidden" name="id" value="0">
                            <input type="file" class="form-control" name="image" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                            <button class="btn btn-outline-primary" type="submit" id="inputGroupFileAddon04">حفظ</button>
                        </div>
                    </form>

                        <label > الصورة اضافية فوق الصورة الرئيسية</label>
                        <form method="POST" action="{{ route('updateInfoFront.page') }}" enctype="multipart/form-data">
                            @csrf
                        <div class="input-group">
                            <input type="hidden" name="id" value="1">
                            <input type="file" class="form-control" name="image" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                            <button class="btn btn-outline-primary" type="submit" id="inputGroupFileAddon04">حفظ</button>
                        </div>
                    </form>
                    </div>
                </div>

                    <div class="position-relative hero-animation-img">
                        <div class="hero-dashboard-img text-center">
                            <img src="{{ $information[0]->data}}"
                                alt="hero dashboard" class="animation-img" data-speed="2"
                               />
                        </div>
                        <div class="position-absolute hero-elements-img">
                            <img src="{{ $information[1]->data}}"
                                alt="hero elements" class="animation-img" data-speed="4"
                                 />
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <!-- Hero: End -->


        <!-- Useful features: Start alerts -->
        <section id="landingFeatures" class="section-py landing-features">
            <div class="container">

                <button type="button" class="custom-btn" data-bs-toggle="modal" data-bs-target="#addAlertModal">اضافة اشعار</button>
<br>
<br>
                @foreach ($alerts as $alert)

                <div class="alert alert-primary alert-dismissible mb-0" role="alert">
                    <h4 class="alert-heading d-flex align-items-center"><i class="mdi mdi-chat-alert-outline mdi-24px me-2"></i>{{$alert->title}}</h4>
                    <p class="mb-0">{{$alert->content}}</p>

                    <a href="/admin/front-page/delete/{{$alert->id}}" class="btn-close">
                    </a>

                    </div>
                <br>
                    @endforeach

            </div>
        </section>
        <!-- Useful features: End -->

        <!-- Real customers reviews: Start -->
        <section id="landingReviews" class="section-py bg-body landing-reviews pb-0">
            <div class="container">
                <div class="text-center fw-semibold d-flex justify-content-center align-items-center mb-4">
                    <img src="{{ asset('admin/assets/img/front-pages/icons/section-tilte-icon.png')}}" alt="section title icon"
                    class="me-2" />
                    <h3 class="text-center mb-2"><span class="fw-bold">احدث المحاضرات</span></h3>
                </div>

            </div>

           <center> <button type="button" class="custom-btn" data-bs-toggle="modal" data-bs-target="#addLectureModal">اضافة كورس</button>
            <br>
            <br></center>


            <div class="swiper-reviews-carousel overflow-hidden mb-5 pt-4">
                <div class="swiper" id="swiper-reviews">
                    <div class="swiper-wrapper">

                    @foreach ($lectures as $lecture)

                        <div class="swiper-slide">

                            <div class="card h-100">
                                <a href="/admin/front-page/delete/{{$lecture->id}}" class="btn-close"></a>
                                <img class="card-img-top" src="{{$lecture->image}}" alt="Card image cap" />

                                <div
                                    class="card-body text-body d-flex flex-column justify-content-between">

                                    <h5 class="card-title">{{$lecture->title}}</h5>

                                    <p class="card-text">
                                        {{$lecture->content}}
                                    </p>

                                </div>
                            </div>
                        </div>

                        @endforeach




                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>



        </section>
        <!-- Real customers reviews: End -->
        <!-- Fun facts: Start -->
        <section id="landingFunFacts" class="section-py landing-fun-facts">
            <div class="container">
                <div class="row gx-0 gy-5 gx-sm-5">
                    <div class="col-md-3 col-sm-6 text-center">
                        <span class="badge badge-center rounded-pill bg-label-hover-primary fun-facts-icon mb-4"><i
                                class="tf-icons mdi mdi-human-male-board mdi-36px"></i></span>
                        <h2 class="fw-bold mb-1">{{$lectures_count}}+</h2>
                        <p class="fw-medium mb-0">محاضرة</p>
                    </div>
                    <div class="col-md-3 col-sm-6 text-center">
                        <span class="badge badge-center rounded-pill bg-label-hover-success fun-facts-icon mb-4"><i
                                class="tf-icons mdi mdi-book-open-page-variant-outline mdi-36px"></i></span>
                        <h2 class="fw-bold mb-1">{{$lessons_count}}+</h2>
                        <p class="fw-medium mb-0">درس</p>
                    </div>
                    <div class="col-md-3 col-sm-6 text-center">
                        <span class="badge badge-center rounded-pill bg-label-hover-warning fun-facts-icon mb-4"><i
                                class="tf-icons mdi mdi-pencil-circle-outline mdi-36px"></i></span>
                        <h2 class="fw-bold mb-1">{{$exams_count}}+</h2>
                        <p class="fw-medium mb-0">امتحان</p>
                    </div>
                    <div class="col-md-3 col-sm-6 text-center">
                        <span class="badge badge-center rounded-pill bg-label-hover-info fun-facts-icon mb-4"><i
                                class="tf-icons mdi mdi-account mdi-36px"></i></span>
                        <h2 class="fw-bold mb-1">1000+</h2>
                        <p class="fw-medium mb-0">طالب</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Fun facts: End -->


        <section id="landingReviews2" class="section-py bg-body landing-reviews pb-0">
            <div class="container">
                <div class="text-center fw-semibold d-flex justify-content-center align-items-center mb-4">
                    <img src="{{ asset('admin/assets/img/front-pages/icons/section-tilte-icon.png')}}" alt="section title icon"
                    class="me-2" />
                    <h3 class="text-center mb-2"><span class="fw-bold">الباقات</span></h3>
                </div>

            </div>


            <center> <button type="button" class="custom-btn" data-bs-toggle="modal" data-bs-target="#addBaqatModal">اضافة باقة</button>
                <br>
                <br></center>

            <div class="swiper-reviews-carousel overflow-hidden mb-5 pt-4">
                <div class="swiper" id="swiper-reviews2">
                    <div class="swiper-wrapper">


                        @foreach ($baqat as $baqa)

                        <div class="swiper-slide">

                            <div class="card h-100">
                                <a href="/admin/front-page/delete/{{$baqa->id}}" class="btn-close"></a>
                                <img class="card-img-top" src="{{$baqa->image}}" alt="Card image cap" />

                                <div
                                    class="card-body text-body d-flex flex-column justify-content-between">

                                    <h5 class="card-title">{{$baqa->title}}</h5>

                                    <p class="card-text">
                                        {{$baqa->content}}
                                    </p>

                                </div>
                            </div>
                        </div>

                        @endforeach



                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>



        </section>


    </div>

    <!-- / Sections:End -->



    <!-- Footer: Start -->
    <footer class="landing-footer">
        <div class="footer-top">
            <div class="container">
                <div class="row gx-0 gy-4 g-md-5">
                    <div class="col-lg-5">
                        <a href="landing-page.html" class="app-brand-link mb-4">
                            <span class="app-brand-logo demo me-2">
                                <span style="color:#666cff;">
                                    <svg width="268" height="150" viewBox="0 0 38 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M30.0944 2.22569C29.0511 0.444187 26.7508 -0.172113 24.9566 0.849138C23.1623 1.87039 22.5536 4.14247 23.5969 5.92397L30.5368 17.7743C31.5801 19.5558 33.8804 20.1721 35.6746 19.1509C37.4689 18.1296 38.0776 15.8575 37.0343 14.076L30.0944 2.22569Z"
                                            fill="currentColor" />
                                        <path
                                            d="M30.171 2.22569C29.1277 0.444187 26.8274 -0.172113 25.0332 0.849138C23.2389 1.87039 22.6302 4.14247 23.6735 5.92397L30.6134 17.7743C31.6567 19.5558 33.957 20.1721 35.7512 19.1509C37.5455 18.1296 38.1542 15.8575 37.1109 14.076L30.171 2.22569Z"
                                            fill="url(#paint0_linear_2989_100980)" fill-opacity="0.4" />
                                        <path
                                            d="M22.9676 2.22569C24.0109 0.444187 26.3112 -0.172113 28.1054 0.849138C29.8996 1.87039 30.5084 4.14247 29.4651 5.92397L22.5251 17.7743C21.4818 19.5558 19.1816 20.1721 17.3873 19.1509C15.5931 18.1296 14.9843 15.8575 16.0276 14.076L22.9676 2.22569Z"
                                            fill="currentColor" />
                                        <path
                                            d="M14.9558 2.22569C13.9125 0.444187 11.6122 -0.172113 9.818 0.849138C8.02377 1.87039 7.41502 4.14247 8.45833 5.92397L15.3983 17.7743C16.4416 19.5558 18.7418 20.1721 20.5361 19.1509C22.3303 18.1296 22.9391 15.8575 21.8958 14.076L14.9558 2.22569Z"
                                            fill="currentColor" />
                                        <path
                                            d="M14.9558 2.22569C13.9125 0.444187 11.6122 -0.172113 9.818 0.849138C8.02377 1.87039 7.41502 4.14247 8.45833 5.92397L15.3983 17.7743C16.4416 19.5558 18.7418 20.1721 20.5361 19.1509C22.3303 18.1296 22.9391 15.8575 21.8958 14.076L14.9558 2.22569Z"
                                            fill="url(#paint1_linear_2989_100980)" fill-opacity="0.4" />
                                        <path
                                            d="M7.82901 2.22569C8.87231 0.444187 11.1726 -0.172113 12.9668 0.849138C14.7611 1.87039 15.3698 4.14247 14.3265 5.92397L7.38656 17.7743C6.34325 19.5558 4.04298 20.1721 2.24875 19.1509C0.454514 18.1296 -0.154233 15.8575 0.88907 14.076L7.82901 2.22569Z"
                                            fill="currentColor" />
                                        <defs>
                                            <linearGradient id="paint0_linear_2989_100980" x1="5.36642"
                                                y1="0.849138" x2="10.532" y2="24.104"
                                                gradientUnits="userSpaceOnUse">
                                                <stop offset="0" stop-opacity="1" />
                                                <stop offset="1" stop-opacity="0" />
                                            </linearGradient>
                                            <linearGradient id="paint1_linear_2989_100980" x1="5.19475"
                                                y1="0.849139" x2="10.3357" y2="24.1155"
                                                gradientUnits="userSpaceOnUse">
                                                <stop offset="0" stop-opacity="1" />
                                                <stop offset="1" stop-opacity="0" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </span>
                            </span>
                             </a>

                             <form method="POST" action="{{ route('updateInfoFront.page') }}" enctype="multipart/form-data">
                                @csrf
                            <div class="d-flex mt-2 gap-3">
                                <div class="form-floating form-floating-outline w-px-250">
                                    <input type="hidden" name="id" value="2">
                                    <input type="text" name = "data" class="form-control bg-transparent text-white"
                                        id="newsletter-1" placeholder="Your email" value="{{$information[2]->data}}"/>
                                    <label for="newsletter-1">رقم الهاتف</label>
                                </div>
                                <button type="submit" class="btn btn-primary">حفظ</button>
                            </div>
                        </form>

                        <form method="POST" action="{{ route('updateInfoFront.page') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="3">
                            <div class="d-flex mt-2 gap-3">
                                <div class="form-floating form-floating-outline w-px-250">
                                    <input type="text" name ="data" class="form-control bg-transparent text-white"
                                        id="newsletter-1" placeholder="رابط الفيسبوك" value="{{$information[3]->data}}"/>
                                    <label for="newsletter-1">رابط الفيسبوك</label>
                                </div>
                                <button type="submit" class="btn btn-primary">حفظ</button>
                            </div>
                        </form>



                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">

                        <ul class="list-unstyled mb-0">

                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-4 col-sm-6">

                        <ul class="list-unstyled mb-0">

                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-4">

                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom py-3">
            <div
                class="container d-flex flex-wrap justify-content-between flex-md-row flex-column text-center text-md-start">
                <div class="mb-2 mb-md-0">
                    <span class="footer-text">©
                        <script>
                            document.write(new Date().getFullYear());
                        </script>

                    </span>

                </div>
                <div>

                </div>
            </div>
        </div>
    </footer>
    <!-- Footer: End -->



    <!-- Modal -->
<div class="modal fade"  id="addAlertModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="POST" action="{{ route('updateNewsFront.page') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="type" value ="1" >
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel1">اضافة اشعار</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">


          <div class="row">
            <div class="col mb-4 mt-2">
              <div class="form-floating form-floating-outline">
                  <input type="text" name="title" class="form-control" >

                <label for="name">العنوان</label>
              </div>
            </div>
        </div>


        <div class="row">
            <div class="col mb-4 mt-2">
              <div class="form-floating form-floating-outline">

                  <textarea name="content" class="form-control"  cols="30" rows="15"></textarea>

                <label for="name">المختوى</label>
              </div>
            </div>
        </div>






          </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">الغاء</button>
          <button type="submit" class="btn btn-primary">حفظ</button>
        </div>
    </form>
      </div>
    </div>
  </div>


      <!-- Modal -->
<div class="modal fade"  id="addLectureModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="POST" action="{{ route('updateNewsFront.page') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="type" value ="2" >
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel1">اضافة محاضرة</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">


          <div class="row">
            <div class="col mb-4 mt-2">
              <div class="form-floating form-floating-outline">
                  <input type="text" name="title" class="form-control" >

                <label for="name">العنوان</label>
              </div>
            </div>
        </div>


        <div class="row">
            <div class="col mb-4 mt-2">
              <div class="form-floating form-floating-outline">

                  <textarea name="content" class="form-control"  cols="30" rows="15"></textarea>

                <label for="name">المختوى</label>
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col mb-4 mt-2">
            <div class="form-floating form-floating-outline">


                <div class="col-md">
                    <div class="card mb-3">
                      <div class="row g-0">

                        <div class="col-md-12">
                          <div class="card-body">
                            <input class="form-control"  name = "image" type="file" id="formFile">

                        </div>
                        </div>
                      </div>
                    </div>
                  </div>


           </div>
        </div>
    </div>




          </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">الغاء</button>
          <button type="submit" class="btn btn-primary">حفظ</button>
        </div>
    </form>
      </div>
    </div>
  </div>



      <!-- Modal -->
<div class="modal fade"  id="addBaqatModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form method="POST" action="{{ route('updateNewsFront.page') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="type" value ="3" >
        <div class="modal-header">
          <h4 class="modal-title" id="exampleModalLabel1">اضافة باقة</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">


          <div class="row">
            <div class="col mb-4 mt-2">
              <div class="form-floating form-floating-outline">
                  <input type="text" name="title" class="form-control" >

                <label for="name">العنوان</label>
              </div>
            </div>
        </div>


        <div class="row">
            <div class="col mb-4 mt-2">
              <div class="form-floating form-floating-outline">

                  <textarea name="content" class="form-control"  cols="30" rows="15"></textarea>

                <label for="name">المختوى</label>
              </div>
            </div>
        </div>

        <div class="row">
            <div class="col mb-4 mt-2">
            <div class="form-floating form-floating-outline">


                <div class="col-md">
                    <div class="card mb-3">
                      <div class="row g-0">

                        <div class="col-md-12">
                          <div class="card-body">
                            <input class="form-control"  name = "image" type="file" id="formFile">

                        </div>
                        </div>
                      </div>
                    </div>
                  </div>


           </div>
        </div>
    </div>




          </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">الغاء</button>
          <button type="submit" class="btn btn-primary">حفظ</button>
        </div>
    </form>
      </div>
    </div>
  </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/node-waves/node-waves.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('admin/assets/vendor/libs/nouislider/nouislider.js')}}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/swiper/swiper.js')}}"></script>

    <!-- Main JS -->
    <script src="{{ asset('admin/assets/js/front-main.js')}}"></script>


    <!-- Page JS -->
    <script src="{{ asset('admin/assets/js/front-page-landing.js')}}"></script>

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

</body>

</html>

<!-- beautify ignore:end -->

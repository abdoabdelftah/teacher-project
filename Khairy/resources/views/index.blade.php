<!DOCTYPE html>
<html lang="en" class="light-style layout-navbar-fixed layout-wide " data-theme="theme-default" dir="rtl"
    data-assets-path="{{ asset('admin/assets/') }}" data-template="front-pages">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>لوحة تحكم منصة الاستاذ خيرى</title>


    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="" />

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
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/rtl/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/demo.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/pages/front-page.css') }}" />
    <!-- Vendors CSS -->

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/nouislider/nouislider.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/swiper/swiper.css') }}" />

    <!-- Page CSS -->

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/pages/front-page-landing.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">


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
                <a href="/" class="app-brand-link">
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
                    <li class="nav-item">
                        <a class="nav-link fw-medium" aria-current="page" href="#landingHero">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="#landingFeatures">اشعارات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="#landingReviews">المحاضرات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium" href="#landingReviews2">الباقات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-medium text-nowrap" href="#landingContact">تواصل معنا
                        </a>
                    </li>

                </ul>
            </div>
            <div class="landing-menu-overlay d-lg-none"></div>
            <!-- Menu wrapper: End -->
            <!-- Toolbar: Start -->
            <ul class="navbar-nav flex-row align-items-center ms-auto">


                <!-- navbar button: Start -->
                <li>
                    <a href="/login" class="btn btn-primary px-2 px-sm-4 px-lg-2 px-xl-4" ><span
                            class="tf-icons mdi mdi-account me-md-1"></span><span class="d-none d-md-block">تسجيل
                            الدخول</span></a>
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

                <div class="position-relative hero-animation-img">
                    <div class="hero-dashboard-img text-center">
                        <img src="{{ $information[0]->data }}" alt="hero dashboard" class="animation-img"
                            data-speed="2" />
                    </div>
                    <div class="position-absolute hero-elements-img">
                        <img src="{{ $information[1]->data }}" alt="hero elements" class="animation-img"
                            data-speed="4" />
                    </div>
                    </a>
                </div>
            </div>
        </section>
        <!-- Hero: End -->

        <!-- Useful features: Start -->
        <section id="landingFeatures" class="section-py landing-features">
            <div class="container">

                @foreach ($alerts as $alert)
                    <div class="alert alert-primary alert-dismissible mb-0" role="alert">
                        <h4 class="alert-heading d-flex align-items-center"><i
                                class="mdi mdi-chat-alert-outline mdi-24px me-2"></i>{{ $alert->title }}</h4>
                        <p class="mb-0">{{ $alert->content }}</p>



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
                    <img src="{{ asset('admin/assets/img/front-pages/icons/section-tilte-icon.png') }}"
                        alt="section title icon" class="me-2" />
                    <h3 class="text-center mb-2"><span class="fw-bold">احدث المحاضرات</span></h3>
                </div>

            </div>




            <div class="swiper-reviews-carousel overflow-hidden mb-5 pt-4">
                <div class="swiper" id="swiper-reviews">
                    <div class="swiper-wrapper">



                        @foreach ($lectures as $lecture)
                            <div class="swiper-slide">

                                <div class="card h-100">
                                    <a href="https://api.whatsapp.com/send?phone={{$information[2]->data}}&text=حجز محاضرة {{$lecture->title}}" target="_blank">
                                    <img class="card-img-top" src="{{ $lecture->image }}" alt="Card image cap" />

                                    <div class="card-body text-body d-flex flex-column justify-content-between">

                                        <h5 class="card-title">{{ $lecture->title }}</h5>

                                        <p class="card-text">
                                            {{ $lecture->content }}
                                        </p>

                                    </div>
                                </a>
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
                        <h2 class="fw-bold mb-1">{{ $lectures_count }}+</h2>
                        <p class="fw-medium mb-0">محاضرة</p>
                    </div>
                    <div class="col-md-3 col-sm-6 text-center">
                        <span class="badge badge-center rounded-pill bg-label-hover-success fun-facts-icon mb-4"><i
                                class="tf-icons mdi mdi-book-open-page-variant-outline mdi-36px"></i></span>
                        <h2 class="fw-bold mb-1">{{ $lessons_count }}+</h2>
                        <p class="fw-medium mb-0">درس</p>
                    </div>
                    <div class="col-md-3 col-sm-6 text-center">
                        <span class="badge badge-center rounded-pill bg-label-hover-warning fun-facts-icon mb-4"><i
                                class="tf-icons mdi mdi-pencil-circle-outline mdi-36px"></i></span>
                        <h2 class="fw-bold mb-1">{{ $exams_count }}+</h2>
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
                    <img src="{{ asset('admin/assets/img/front-pages/icons/section-tilte-icon.png') }}"
                        alt="section title icon" class="me-2" />
                    <h3 class="text-center mb-2"><span class="fw-bold">الباقات</span></h3>
                </div>

            </div>




            <div class="swiper-reviews-carousel overflow-hidden mb-5 pt-4">
                <div class="swiper" id="swiper-reviews2">
                    <div class="swiper-wrapper">


                        @foreach ($baqat as $baqa)
                            <div class="swiper-slide">

                                <div class="card h-100">

                                    <a href="https://api.whatsapp.com/send?phone={{$information[2]->data}}&text=استفسار عن باقة {{$baqa->title}}" target="_blank">
                                    <img class="card-img-top" src="{{ $baqa->image }}" alt="Card image cap" />

                                    <div class="card-body text-body d-flex flex-column justify-content-between">

                                        <h5 class="card-title">{{ $baqa->title }}</h5>

                                        <p class="card-text">
                                            {{ $baqa->content }}
                                        </p>

                                    </div>
                                </a>
                                </div>
                            </div>
                        @endforeach


                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>



        </section>

        <!-- CTA: Start -->
        <section id="landingCTA" class="section-py border border-2 landing-cta p-lg-0 pb-0">
            <div class="container">
                <div class="row align-items-center gy-5 gy-lg-0">
                    <div class="col-lg-6 text-center text-lg-start">
                        <h6 class="h2 text-primary fw-bold mb-1">طالب جديد؟</h6>
                        <p class="fw-medium mb-4">تواصل مع الاستاذ محمد خيرى</p>
                        <a href="https://api.whatsapp.com/send?phone={{$information[2]->data}}&text=عايز استفسر عن الحجز" target="_blank" class="btn btn-primary">واتس اب<i
                                class="mdi mdi-arrow-right mdi-24px ms-3 scaleX-n1-rtl"></i></a>
                    </div>
                    <div class="col-lg-6 pt-lg-5">
                        <img src="{{ $information[0]->data }}" alt="cta dashboard" class="img-fluid" />
                    </div>
                </div>
            </div>
        </section>
        <!-- CTA: End -->

        <!-- Contact Us: Start -->
        <section id="landingContact" class="section-py bg-body landing-contact">
            <div class="container bg-icon-left">
                <h6 class="text-center fw-semibold d-flex justify-content-center align-items-center mb-4">
                    <img src="{{ asset('admin/assets/img/front-pages/icons/section-tilte-icon.png') }}"
                        alt="section title icon" class="me-2" />
                    <span class="text-uppercase">تواصل معنا</span>
                </h6>
                <div class="row gy-4">
                    <div class="col-lg-5">
                        <div class="card h-100">
                            <div class="bg-primary rounded text-white card-body">


                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="mb-4">للشكاوى والمقترحات</h5>
                                <form method="POST" action="{{ route('send.complaint') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" class="form-control"
                                                    id="basic-default-fullname" placeholder="الاسم بالكامل" name = "name" required/>
                                                <label for="basic-default-fullname">الاسم</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating form-floating-outline">
                                                <input type="text" class="form-control" id="basic-default-email"
                                                    placeholder="رقم الهاتف المحمول" name="phone_number" required/>
                                                <label for="basic-default-email">رقم الهاتف</label>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-floating form-floating-outline">
                                                <textarea class="form-control h-px-200" placeholder="الرسالة" name="message" aria-label="Message" id="basic-default-message"></textarea>
                                                <label for="basic-default-message">الرسالة</label>
                                            </div>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">ارسل</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Contact Us: End -->
    </div>

    <!-- / Sections:End -->



    <!-- Footer: Start -->

    <!-- Footer: Start -->
    <footer class="landing-footer">
        <div class="footer-top">
            <div class="container">
                <div class="row gx-0 gy-4 g-md-5">
                    <div class="col-lg-12S">
                        <a href="" class="app-brand-link mb-4">
                            <span class="app-brand-logo demo me-2">
                                <span style="color:#666cff;">

                                </span>
                            </span>
                        </a>


                        <div class="row">

                            <div class="col-6">

                                <h4> <span class="mdi mdi-phone-in-talk-outline  mdi-36px"></span>
                                    {{ $information[2]->data }}
                                </h4>
                            </div>

                            <div class="col-6">

                                <a href="{{ $information[3]->data }}" class="mdi mdi-facebook  mdi-36px"></a>
                            </div>
                        </div>

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
                        , تنفيذ <i class="tf-icons mdi mdi-heart text-danger"></i>
                    </span>
                    <a href="https://facebook.com/abdo.mohamed.16144" target="_blank"
                        class="footer-link fw-medium footer-theme-link">بشمهندس عبدالرحمن عبرالفتاج</a>
                </div>
                <div>

                </div>
            </div>
        </div>
    </footer>


    <!-- Footer: End -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/node-waves/node-waves.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('admin/assets/vendor/libs/nouislider/nouislider.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/swiper/swiper.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('admin/assets/js/front-main.js') }}"></script>


    <!-- Page JS -->
    <script src="{{ asset('admin/assets/js/front-page-landing.js') }}"></script>


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

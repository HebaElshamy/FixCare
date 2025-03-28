<html>
<head>
<title>FIX CARE</title>
<link rel="icon" href="{{ asset('assets_front/img/Picture3.jpg')}}">

<link rel="stylesheet" href="{{ asset('assets_front/CSS/all.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets_front/CSS/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets_front/CSS/styl.css')}}">
<link rel="stylesheet" href="{{ asset('assets_front/css/all.min.css')}}">

<link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q="
crossorigin="anonymous"
/>
<!--end::Fonts-->
<!--begin::Third Party Plugin(OverlayScrollbars)-->
<link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg="
crossorigin="anonymous"
/>
<!--end::Third Party Plugin(OverlayScrollbars)-->
<!--begin::Third Party Plugin(Bootstrap Icons)-->
<link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI="
crossorigin="anonymous"
/>
<!--end::Third Party Plugin(Bootstrap Icons)-->
<!--begin::Required Plugin(AdminLTE)-->
<link rel="stylesheet" href="{{ asset('assets/css/adminlte.css') }}" />

</head>

<body>
  <!-------HOME---------->


  {{-- <div id="HOME" class="back-ground min-vh-100">
    <nav class="navbar navbar-expand-lg bg-dark p-2 text-dark bg-opacity-50 navbar fixed-top shadow-lg my-3 py-2 start-0 end-0 mx-4 rounded-5 " id="fixcare">
      <div class="container ">
          <a class="navbar-brand px-5 ps-5 ms-5 text-white fw-semibold " href="#img">
            <img src="{{ asset('assets_front/img/Picture3.jpg')}}" alt="FIX CARE logo" width="60" height="60" class="rounded-3 fw-bolder">
            FIX CARE
          </a>
        </div>
      <div class="container-fluid me-5 pe-5">

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-white d-flex justify-content-between cursor-pointer align-items-center">
            <li class="nav-item">
              <a class="nav-link active d-flex justify-content-between cursor-pointer align-items-center" aria-current="page" href="#HOME">Home</a>
            </li>
            <li class="nav-item text-white">
              <a class="nav-link text-white " href="#ABOUT">About</a>
            </li>

            <li class="nav-item ">
              <a class="nav-link" href="#SERVICES">Services</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link text-decoration-none" href="{{ route('FAQ') }}" id="#Questions">FAQ</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#CONTACT">Contact</a>
            </li>

          </ul>
          <form class="d-flex px-5 " role="search">
            @if (Auth::user())
                @if (Auth::user()->role == 'admin')
                    <button class="btn btn-outline-info rounded-5 px-4 mx-2 text-nowrap" type="button" onclick="window.location.href='{{ route('admin.index') }}'">
                        {{ __('index.dashboard') }}
                    </button>
                @elseif (Auth::user()->role == 'client')
                <button class="btn btn-outline-info rounded-5 px-4 mx-2 text-nowrap" type="button" onclick="window.location.href='{{ route('client.index') }}'">
                    {{ __('index.dashboard') }}
                </button>
                @elseif (in_array(Auth::user()->role, ['expert', 'professional', 'trainee']))
                <button class="btn btn-outline-info rounded-5 px-4 mx-2 text-nowrap" type="button" onclick="window.location.href='{{ route('team.index') }}'">
                    {{ __('index.dashboard') }}
                </button>
            @endif

                @else


            <button class="btn btn-outline-info rounded-5 px-4 mx-2 text-nowrap" type="button" onclick="window.location.href='{{ route('login') }}'">
                {{ __('index.login') }}
            </button>




            <div class="dropdown">
                <button class="btn btn-outline-info rounded-5 px-4 py-2 dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    {{ __('index.register') }}
                </button>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end shadow rounded-4 border-0 text-info">
                    <li>
                        <a href="{{ route('register', ['role' => 'expert']) }}" class="dropdown-item py-2 text-info">
                            {{ __('index.expert') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('register', ['role' => 'professional']) }}" class="dropdown-item py-2 text-info">
                            {{ __('index.professional') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('register', ['role' => 'trainee']) }}" class="dropdown-item py-2 text-info">
                            {{ __('index.trainee') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('register', ['role' => 'client']) }}" class="dropdown-item py-2 text-info">
                            {{ __('index.client') }}
                        </a>
                    </li>
                </ul>
            </div>
            @endif

            <div class="dropdown">
                <button class="btn btn-outline-info rounded-5 pe-3 ps-3 mx-2 dropdown-toggle" type="button" data-bs-toggle="dropdown">
                    {{ app()->getLocale() == 'ar' ? 'عربي' : 'English' }}
                </button>
                <ul class="dropdown-menu dropdown-menu-end shadow rounded-4 border-0">
                    <li>
                        <a href="{{ route('changeLang', ['lang' => 'en']) }}" class="dropdown-item py-2 text-info">
                            English
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('changeLang', ['lang' => 'ar']) }}" class="dropdown-item py-2 text-info">
                            عربي
                        </a>
                    </li>
                </ul>
            </div>



          </form>
        </div>
      </div>
    </nav>
  </div> --}}
  <div id="HOME" class="back-ground min-vh-100">
    <nav class="navbar navbar-expand-lg bg-dark p-2 text-dark bg-opacity-50 fixed-top shadow-lg my-3 py-2 start-0 end-0 mx-4 rounded-5" id="fixcare">
        <div class="container-fluid">
            <a class="navbar-brand text-white fw-semibold d-flex align-items-center" href="#img">
                <img src="{{ asset('assets_front/img/Picture3.jpg') }}" alt="FIX CARE logo" width="60" height="60" class="rounded-3 me-2">
                FIX CARE
            </a>
            <!-- زر القائمة للهواتف -->
            <button class="navbar-toggler text-white border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-white d-flex align-items-center">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#HOME">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="#ABOUT">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#SERVICES">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-decoration-none" href="{{ route('FAQ') }}">FAQ</a>
                    </li>
                    <li class="nav-item">
                        {{-- <a class="nav-link" href="#CONTACT">Contact</a> --}}
                    </li>
                </ul>
                <div class="d-flex flex-column flex-lg-row align-items-center mt-3 mt-lg-0">
                    @if (Auth::user())
                        <button class="btn btn-outline-info rounded-5 px-4 mx-2 mb-2 mb-lg-0" type="button" onclick="window.location.href='{{ route(Auth::user()->role . '.index') }}'">
                            {{ __('index.dashboard') }}
                        </button>
                    @else
                        <button class="btn btn-outline-info rounded-5 px-4 mx-2 mb-2 mb-lg-0" type="button" onclick="window.location.href='{{ route('login') }}'">
                            {{ __('index.login') }}
                        </button>
                        <div class="dropdown mb-2 mb-lg-0">
                            <button class="btn btn-outline-info rounded-5 px-4 py-2 dropdown-toggle" type="button" data-bs-toggle="dropdown">
                                {{ __('index.register') }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow rounded-4 border-0 text-info">
                                <li><a href="{{ route('register', ['role' => 'expert']) }}" class="dropdown-item py-2 text-info">{{ __('index.expert') }}</a></li>
                                <li><a href="{{ route('register', ['role' => 'professional']) }}" class="dropdown-item py-2 text-info">{{ __('index.professional') }}</a></li>
                                <li><a href="{{ route('register', ['role' => 'trainee']) }}" class="dropdown-item py-2 text-info">{{ __('index.trainee') }}</a></li>
                                <li><a href="{{ route('register', ['role' => 'client']) }}" class="dropdown-item py-2 text-info">{{ __('index.client') }}</a></li>
                            </ul>
                        </div>
                    @endif
                    <div class="dropdown">
                        <button class="btn btn-outline-info rounded-5 px-3 mx-2 dropdown-toggle" type="button" data-bs-toggle="dropdown">
                            {{ app()->getLocale() == 'ar' ? 'عربي' : 'English' }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end shadow rounded-4 border-0">
                            <li><a href="{{ route('changeLang', ['lang' => 'en']) }}" class="dropdown-item py-2 text-info">English</a></li>
                            <li><a href="{{ route('changeLang', ['lang' => 'ar']) }}" class="dropdown-item py-2 text-info">عربي</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>


<!-------------about--------->
<section id="ABOUT">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <div class=" head m-5 py-4">

          <h1 class="fs-3 py-2">Get help in just a few clicks</h1>
          <div class="text fs-6 lh-lg ">
            <p>Fix Care is an innovative technical support platform designed to provide quick and efficient troubleshooting solutions. The platform offers AI-powered instant support for simple issues and direct communication with expert technicians for more complex problems through chat, voice calls, or video.
               Fix Care is built with user convenience in mind, offering an easy-to-use interface that works seamlessly like a mobile app. Whether you're a general user, a skilled technician, or a business in need of IT support, Fix Care is your go-to solution for fast and reliable technical assistance.</p>
          </div>

        </div>
      </div>

      <div class="col-lg-6">
        <div class="pic ">
          <img src="{{ asset('assets_front/img/ai-learning-future-cooperation-02-2.webp')}} " class="w-75 m-5 py-4 px-3" alt="AI">
        </div>
      </div>
    </div>

  </div>
</section>
 <!----------Services----->

 <section id="SERVICES">
  <h1 class="text-center m-5 ">Quick Technical support solutions</h1>

  <div class="container w-75">

<div class="row">
    <div class=" card1 col-lg-6 shadow-lg p-5 mb-5 bg-white rounded  ">
      <div class=" m-4 ps-5  ">
        <img src="{{ asset('assets_front/img/cute-chat-bot-robot-with-yellow-laptop_1157984-247.avif')}}" class=" w-75  " alt="AI2">
      </div>
        <div class="text2">
          <h3>Quick AI assistance</h3>
          <p>Get instant AI support for your tech issues and save time.
            we prioritize your time by offering immediate support for simple issues through our AI and ChatGPT system.
             This smart technology efficiently analyzes your problem and provides you with instant solutions.
             Enjoy effortless tech support with Fix ker, making it easy to solve everyday issues quickly.
          </p>
        </div>
    </div>

    <div class=" card2 col-lg-6 shadow-lg p-5 mb-5 bg-white rounded ">
      <div class=" m-4 ps-5">
        <img src="{{ asset('assets_front/img/organic-flat-customer-support-illustration_23-2148899174.jpg')}}" class="w-100" alt="ai3">
      </div>
      <div class="text3">
        <h3>Human technician connection</h3>
        <p>Connect with a technician for personalized support when needed.
          Fix Care connects you with skilled support technicians.
          Our professionals are ready to assist you, providing tailored solutions to your specific problems.
          Are you ready to resolve your complexities with care and precision.
        </p>
      </div>
  </div>
   </div>
  </div>
 </section>

 <!------------contact--------------->
 {{-- <section id="CONTACT">
  <div class="head mt-5 pt-5">
    <h1 class="pt-4 text-center mb-5 fw-bold fs-1 position-relative">
      Contact Us

    </h1>
  </div>
  <div class="container w-75">
    <div class="row text-center mt-5 pt-5 d-flex justify-content-center align-items-center">
      <div class="col-lg-4">
        <i class="fa-solid fa-location-arrow fs-4 rounded-circle border p-4 bg-light"></i>
        <h5 class="pt-3">Address</h5>
        <p class="text-black-50 fs-5">Saudi Arabia, Riyadh, Al-Izdihar District - Othman Bin Affan Street
        </p>

      </div>
      <div class="col-lg-4">
        <i class="fa-solid fa-envelope fs-4 border rounded-circle p-4 bg-light"></i>
          <h5 class="pt-3">Emaill</h5>
        <p class="text-black-50 fs-5">Support@website.com
        </p>
      </div>

      <div class="col-lg-4 ">
        <i class="fa-solid fa-phone fs-4 border rounded-circle p-4 bg-light"></i>
          <h5 class="pt-3">phone</h5>
        <p class="text-black-50 fs-5">+966 55 084 4407

        </p>
      </div>
      <div class="col-lg-6 mt-5">
        <input type="email" class="form-control bg-light" id="formControlInput" placeholder="Name">
                </div>
                <div class="col-lg-6 mt-5 ">
                  <input type="email" class="form-control bg-light" id="formControlInput" placeholder="Email" >
                          </div>
                          <div class="col-lg-12 mt-4 pb-5 d-flex justify-content-center align-items-center">
                            <input type="email" class="form-control bg-light pb-5" id="formControlInput" placeholder="Message" >

                          </div>
                          <div class="col-lg-12 ">
                            <button type="button" class="btn btn-light text-center d-flex justify-content-center align-items-center btn-outline-dark p-2 fw-bold ps-4 pe-4">Submit</button>
                          </div>
              </div>
            </div>
 </section> --}}
 <footer class="text-center bg-dark mt-5 pb-3 " >
  <p class="text-white-50  pt-4 fs-6 fw-lighter" >Copy Right 2025-2026 © By FIX CARE All Rights Reserved</p>
    </footer>




    <script
    src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/browser/overlayscrollbars.browser.es6.min.js"
    integrity="sha256-dghWARbRe2eLlIJ56wNB+b760ywulqK3DzZYEpsg2fQ="
    crossorigin="anonymous"
  ></script>
  <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
  <script
    src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"
  ></script>
  <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"
  ></script>
  <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
  <script src="{{ asset('assets/js/adminlte.js')}}"></script>
  <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
  <script>
    const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
    const Default = {
      scrollbarTheme: 'os-theme-light',
      scrollbarAutoHide: 'leave',
      scrollbarClickScroll: true,
    };
    document.addEventListener('DOMContentLoaded', function () {
      const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
      if (sidebarWrapper && typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== 'undefined') {
        OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
          scrollbars: {
            theme: Default.scrollbarTheme,
            autoHide: Default.scrollbarAutoHide,
            clickScroll: Default.scrollbarClickScroll,
          },
        });
      }
    });
  </script>
<script src="{{ asset('assets_front/JS/main.js')}}"></script>
</body>


</html>

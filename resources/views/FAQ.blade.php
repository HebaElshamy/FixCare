<html>
<head>
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

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/css/adminlte.min.css')}}">
<!--end::Third Party Plugin(Bootstrap Icons)-->
<!--begin::Required Plugin(AdminLTE)-->
<style>
    #accordion {
    margin-top: 120px; /* زودي الرقم إذا كان لا يزال قريبًا */
    padding-top: 20px; /* إضافة مسافة داخلية لمزيد من التباعد */
}

</style>
</head>
<body>
     <!----------FAQ-------->

     <div class=" overflow-hidden" id="Questions">
        <div>
            <nav class="navbar navbar-expand-lg bg-dark p-2 text-dark bg-opacity-50 fixed-top shadow-lg my-3 py-2 start-0 end-0 mx-4 rounded-5" id="fixcare">
                <div class="container-fluid">
                    <!-- شعار الموقع -->
                    <a class="navbar-brand text-white fw-semibold d-flex align-items-center" href="#img">
                        <img src="{{ asset('assets_front/img/Picture3.jpg') }}" alt="FIX CARE logo" width="60" height="60" class="rounded-3 me-2">
                        FIX CARE
                    </a>

                    <!-- زر القائمة للهواتف -->
                    <button class="navbar-toggler text-white border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
                        <!-- روابط القائمة -->
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-white d-flex align-items-center">
                            <li class="nav-item">
                                <a class="nav-link active" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-decoration-none" href="{{ route('FAQ') }}">FAQ</a>
                            </li>
                        </ul>

                        <!-- أزرار تسجيل الدخول والتسجيل -->
                        <div class="d-flex flex-column flex-lg-row align-items-center mt-3 mt-lg-0">
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

                            <!-- زر تغيير اللغة -->
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

    <section class="content">
        <div class="row">



            <div class="container d-flex justify-content-center">
                <div class="col-12 col-md-9 col-lg-8 mt-10 pt-5" id="accordion">

                @foreach ($faqs as $faq)
                    @php
                        $collapseId = 'collapse' . $faq->id;
                    @endphp
                    <div class="card card-info card-outline">
                        <div class="card-header d-flex align-items-center">
                            <a class="d-block w-100 text-decoration-none text-info" data-toggle="collapse" href="#{{ $collapseId }}">
                                <h4 class="card-title m-0">
                                    {{ App::currentLocale() == 'en' ? $faq->question_en : $faq->question_ar }}
                                </h4>
                            </a>

                        </div>
                        <div id="{{ $collapseId }}" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                {{-- {{ App::currentLocale() == 'en' ? $faq->answer_en : $faq->answer_ar }} --}}
                                {!! App::currentLocale() == 'en' ? $faq->answer_en : $faq->answer_ar !!}

                            </div>
                        </div>
                    </div>
                @endforeach








            </div>
            </div>
        </div>


    </section>
    </div>

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
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/js/demo.js')}}"></script>
</body>



</html>

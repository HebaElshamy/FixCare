<!doctype html>
<html lang="en">
  <!--begin::Head-->
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>FixCare | {{ __('index.register') }}</title>
    <link rel="icon" href="{{ asset('assets/img/fixcare/Screenshot 2025-03-12 002215.png') }}" type="image/icon type">
    <!--begin::Primary Meta Tags-->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="AdminLTE 4 | Register Page" />
    <meta name="author" content="ColorlibHQ" />
    <meta
      name="description"
      content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS."
    />
    <meta
      name="keywords"
      content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard"
    />
    <!--end::Primary Meta Tags-->
    <!--begin::Fonts-->
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
    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.css')}}" />
    <!--end::Required Plugin(AdminLTE)-->
  </head>
  <!--end::Head-->
  <!--begin::Body-->
  <body class="register-page bg-body-secondary">
    <div class="register-box w-50">
      <div class="register-logo">
        <a href="{{ url('/') }}"><b>Fix</b>Care</a>
      </div>
      <!-- /.register-logo -->
      <div class="card ">
        <div class="card-body register-card-body">
          <p class="register-box-msg">{{ __('index.new_member') }}</p>

          <form action="{{ url('register') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-5">
                <div class="mb-3">
                    <input type="text"  hidden class="form-control" id="role" name="role" value="{{ $role }}">
                </div>
            </div>
            <div class="row">

                <div class=" col-sm-12 col-lg-6">
                    <div class="input-group mb-3">
                        <input type="text" id="name" class="form-control"  name="name" value="{{ old('name') }}" placeholder="{{ __('index.name') }}" required autofocus autocomplete="name" />
                        <div class="input-group-text"><span class="bi bi-person"></span></div>
                      </div>
                      <div class="error-message" id="name-error"></div>
                </div>
                <div class=" col-sm-12 col-lg-6">
                    <div class="input-group mb-3">
                        <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="{{ __('index.email') }}" />
                        <div class="input-group-text"><span class="bi bi-envelope"></span></div>

                      </div>
                      <div class="error-message" id="email-error"></div>
                </div>
                 <div class=" col-sm-12 col-lg-6">
                    <div class="input-group mb-3">
                        <input type="password" id="password" class="form-control" placeholder="{{ __('index.password') }}" name="password"
                        required autocomplete="new-password" />

                        <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                      </div>

                      <div class="error-message" id="password-error"></div>
                </div>
                 <div class=" col-sm-12 col-lg-6">
                    <div class="input-group mb-3">
                        <input type="password" id="password_confirmation" class="form-control" placeholder="{{ __('index.password_confirmation') }}"  name="password_confirmation" required autocomplete="new-password" />
                        <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>

                      </div>
                      <div class="error-message " id="password_confirmation-error"></div>
                </div>
                @if ($role != 'client')
                 <div class=" col-sm-12 col-lg-6">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" placeholder="{{ __('index.phone') }}">
                    </div>
                    <div class="error-message" id="phone-error"></div>
                </div>
                 <div class=" col-sm-12 col-lg-6">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" id="company_name" name="company_name" value="{{ old('company_name') }}" placeholder="{{ __('index.company_name') }}">
                    </div>
                    <div class="error-message" id="company_name-error"></div>
                </div>
                 <div class=" col-sm-12 col-lg-6">
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" id="experience_years" name="experience_years" value="{{ old('experience_years') }}" placeholder="{{ __('index.experience_years') }}">
                    </div>
                    <div class="error-message" id="experience_years-error"></div>
                </div>
                 <div class=" col-sm-12 col-lg-6">
                    <div class="input-group mb-3">
                        <input type="number" class="form-control" id="consultation_fee" name="consultation_fee" step="0.01" value="{{ old('consultation_fee') }}" placeholder="{{ __('index.consultation_fee') }}">
                    </div>
                    <div class="error-message" id="consultation_fee-error"></div>
                </div>
                 <div class=" col-sm-12 col-lg-6">
                    <div class="input-group mb-3">
                        <label for="cv_path" class="form-label ">{{ __('index.cv_path') }}</label> <br>
                        <div>
                            <input type="file" class="form-control" id="cv_path" name="cv_path">
                        </div>
                    </div>
                    <div class="error-message" id="cv_path-error"></div>
                </div>
                @endif
            </div>
            <!--begin::Row-->
            <div class="row">
              {{-- <div class="col-8">

              </div> --}}
              <!-- /.col -->
              <div class="col-6">
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-primary">{{ __('index.sign_up') }}</button>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!--end::Row-->
          </form>

          <p class="mt-1 mb-0">
            <a href="{{ route('login') }}" class="text-center"> {{ __('index.member') }} </a>
          </p>
        </div>
        <!-- /.register-card-body -->
      </div>
    </div>
    <!-- /.register-box -->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
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
    <!-- Add jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Add jQuery Validation -->
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>



<script>
    var validationMessages = @json(trans('auth'));
</script>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $("form").validate({
            rules: {
                name: {
                    required: true,
                    maxlength: 255
                },
                email: {
                    required: true,
                    email: true,
                    maxlength: 255,
                    remote: {
                        url: "/check-email", // تحقق من البريد الإلكتروني
                        type: "post",
                        data: {
                            email: function() {
                                return $("#email").val();
                            }
                        },
                        // في حال كانت هناك مشكلة، الرسالة سيتم إرجاعها من هنا
                        dataFilter: function(data) {
                            // هنا يتم التعامل مع رد الخادم للتحقق من وجود البريد الإلكتروني
                            var jsonData = JSON.parse(data);
                            return jsonData ? 'true' : 'false'; // إذا كان موجودًا، رجع false
                        }
                    }
                },
                password: {
                    required: true,
                    minlength: 8
                },
                password_confirmation: {
                    required: true,
                    equalTo: "#password"
                },
                phone: {
                    required: true,
                    maxlength: 15
                },
                company_name: {
                    required: true,
                    maxlength: 255
                },
                experience_years: {
                    required: true,
                    min: 0
                },
                consultation_fee: {
                    required: true,
                    min: 0
                },
                cv_path: {
                    required: true,
                    extension: "pdf|doc|docx"
                }
            },
            // messages: {
            //     name: {
            //         required: "الاسم مطلوب",
            //         maxlength: "الاسم يجب ألا يتجاوز 255 حرفًا"
            //     },
            //     email: {
            //         required: "البريد الإلكتروني مطلوب",
            //         email: "يرجى إدخال بريد إلكتروني صحيح",
            //         maxlength: "البريد الإلكتروني يجب ألا يتجاوز 255 حرفًا",
            //         remote: "البريد الإلكتروني موجود بالفعل"
            //     },
            //     password: {
            //         required: "كلمة المرور مطلوبة",
            //         minlength: "كلمة المرور يجب أن تكون على الأقل 8 أحرف"
            //     },
            //     password_confirmation: {
            //         required: "تأكيد كلمة المرور مطلوب",
            //         equalTo: "كلمة المرور لا تتطابق"
            //     },
            //     phone: {
            //         required: "رقم الهاتف مطلوب",
            //         maxlength: "رقم الهاتف يجب ألا يتجاوز 15 حرفًا"
            //     },
            //     company_name: {
            //         required: "اسم الشركة مطلوب",
            //         maxlength: "اسم الشركة يجب ألا يتجاوز 255 حرفًا"
            //     },
            //     experience_years: {
            //         required: "سنوات الخبرة مطلوبة",
            //         min: "يجب أن تكون سنوات الخبرة أكبر من أو تساوي 0"
            //     },
            //     consultation_fee: {
            //         required: "رسوم الاستشارة مطلوبة",
            //         min: "رسوم الاستشارة يجب أن تكون أكبر من أو تساوي 0"
            //     },
            //     cv_path: {
            //         required: "يرجى تحميل السيرة الذاتية",
            //         extension: "يجب أن تكون السيرة الذاتية بصيغة PDF أو DOC أو DOCX"
            //     }
            // },
            messages: {
                name: validationMessages.name,
                email: validationMessages.email,
                password: validationMessages.password,
                password_confirmation: validationMessages.password_confirmation,
                phone: validationMessages.phone,
                company_name: validationMessages.company_name,
                experience_years: validationMessages.experience_years,
                consultation_fee: validationMessages.consultation_fee,
                cv_path: validationMessages.cv_path
            },
            errorPlacement: function(error, element) {
                var errorMessageId = '#' + element.attr('id') + '-error';
                $(errorMessageId).html(error);
                $(errorMessageId).html(error).css('color', 'red');
                $(errorMessageId).html(error).css('font-size', '13px');

            },


            submitHandler: function(form) {
                form.submit();
            }
        });
    });
</script>


    <!--end::OverlayScrollbars Configure-->
    <!--end::Script-->
  </body>
  <!--end::Body-->
</html>

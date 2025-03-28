@extends('admin.layouts.app')
@section('title')

@endsection

@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6 d-flex">

            </div>
            <div class="col-md-6 d-flex mb-5">
                <a href="{{ route('admin.add_faq') }}"  class="btn btn-primary ms-auto" >
                    {{ __('index.add_faq') }}
                </a>
            </div>


            <div class="col-12" id="accordion">

                @foreach ($faqs as $faq)
                @php
                    $collapseId = 'collapse' . $faq->id;
                @endphp
                <div class="card card-primary card-outline">
                    <div class="card-header d-flex align-items-center">
                        <a class="d-block w-100 text-decoration-none" data-toggle="collapse" href="#{{ $collapseId }}">
                            <h4 class="card-title m-0">
                                {{ App::currentLocale() == 'en' ? $faq->question_en : $faq->question_ar }}
                            </h4>
                        </a>
                        <div class="ms-auto d-flex gap-2">
                            {{-- <a href="{{ route('admin.faq.edit', $faq->id) }}" class="btn btn-warning btn-sm">تعديل</a> --}}
                            <form action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">{{ __('index.delete') }}</button>
                            </form>
                        </div>
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

   
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- jQuery -->
<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('assets/js/demo.js')}}"></script>

@endsection



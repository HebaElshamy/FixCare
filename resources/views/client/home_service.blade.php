@extends('client.layouts.app')
@section('title')
{{ __('index.home_service') }}
@endsection

@section('content')
<div class="col-md-12">
    <!--begin::Quick Example-->
    <div class="card card-primary card-outline mb-4">
      <!--begin::Header-->
      <div class="card-header"><div class="card-title">{{ __('index.home_service') }}</div></div>
      <!--end::Header-->
      <!--begin::Form-->
      <form action="{{ route('client.save.home.service') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!--begin::Body-->
        <div class="card-body">

          <div class="mb-3">
            <label  class="form-label">{{ __('index.phone') }}</label>
            <input type="text" class="form-control" name="phone" />
          </div>
          <div class="mb-3">
            <label  class="form-label">{{ __('index.location') }}</label>
            <input type="text" class="form-control" name="location" />
          </div>
          <div class="mb-3">
            <label  class="form-label">{{ __('index.consultation_topic') }}</label>
            <input type="text" class="form-control" name="consultation_topic" />
          </div>
          <div class="mb-3">
            <div class="form-group">
                <label class="form-label">{{ __('index.write_consultation') }}</label>
                <textarea class="form-control" rows="3" placeholder=" {{ __('index.write_here') }} ..." name="original_consultation"></textarea>
              </div>
          </div>
          <div class="input-group mb-3">
            <input type="file" class="form-control" name="image" />
          </div>

        </div>
        <!--end::Body-->
        <!--begin::Footer-->
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">{{ __('index.send') }}</button>
        </div>
        <!--end::Footer-->
      </form>
      <!--end::Form-->
    </div>
    <!--end::Quick Example-->
</div>

@endsection

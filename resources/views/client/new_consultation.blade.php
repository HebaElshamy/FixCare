@extends('client.layouts.app')
@section('title')
{{ __('index.new_consultation') }}
@endsection

@section('content')
<div class="col-md-12">
    <!--begin::Quick Example-->
    <div class="card card-primary card-outline mb-4">
      <!--begin::Header-->
      <div class="card-header"><div class="card-title">{{ __('index.new_consultation') }}</div></div>
      <!--end::Header-->
      <!--begin::Form-->
      <form action="{{ route('client.save_consultation') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <!--begin::Body-->
        <div class="card-body">
          <div class="mb-3">
            <div class="form-group" data-select2-id="29">
                <label>{{ __('index.select_consultant') }}</label>
                <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" name="team_id" data-select2-id="1" tabindex="-1" aria-hidden="true">

                  <option selected="selected" disabled>{{ __('index.select') }}</option>
                  @foreach ($Consultants as $Consultant )
                  <option value="{{ $Consultant->id }}" >{{ $Consultant->name }} - {{ $Consultant->role }} - {{ $Consultant->consultation_fee }} {{ "/hr" }}</option>
                  @endforeach
                </select>
              </div>
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

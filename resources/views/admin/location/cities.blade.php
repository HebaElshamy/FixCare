@extends('admin.layouts.app')
@section('title')
{{ __('index.zones') }}
@endsection
@section('dashboard')
{{ __('index.zones') }}
@endsection
@section('style')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection
@section('content')
<div class="col-md-12">
    <!--begin::Quick Example-->
    <div class="card card-primary card-outline mb-4">
        <!--begin::Form-->
        <form action="{{ route('admin.add_zone') }}" method="POST">
            @csrf
          <!--begin::Body-->
          <div class="card-body">

            <div class="mb-3">
              <label class="form-label">{{ __('index.zone') }}</label>
              <input
                type="text"
                class="form-control"
                name="city"

                aria-describedby="emailHelp"
              />
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
<div class="col-md-12">
    <!--begin::Quick Example-->
    <div class="card card-primary card-outline mb-4">
      <!--begin::Header-->

      <!--end::Header-->
      <!--begin::Form-->
      <form>
        <!--begin::Body-->
        <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0">
                <thead>
                  <tr>
                    <th>{{ '#' }}</th>
                    <th>{{ __('index.zone') }}</th>

                  </tr>
                </thead>
                <tbody>

                  @foreach($locations as $key => $location)
                    <tr>

                        <td>
                             @if ($location->id != 1)
                        {{ $key }}
                        </td>
                        <td>{{ $location->city }}</td>
                        
                        @endif

                        <td>
                            <form action="{{ route('posts.destroy', $location->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                @if ($location->id == 1)
                                    hidden
                                @endif
                                class="btn btn-danger"> {{ __('index.delete') }}</button>
                            </form>
                        </td>



                    </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
        <!--end::Body-->

      </form>
      <!--end::Form-->
    </div>
    <!--end::Quick Example-->

  </div>

@endsection

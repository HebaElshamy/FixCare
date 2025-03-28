@extends('admin.layouts.app')
@section('title')
{{ __('index.location') }}
@endsection
@section('dashboard')
{{ __('index.location') }}
@endsection
@section('style')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection
@section('content')
<div class="col-md-12">
    <!--begin::Quick Example-->
    <div class="card card-primary card-outline mb-4">
        <!--begin::Form-->
        <form action="{{ route('admin.add_location') }}" method="POST">
            @csrf
          <!--begin::Body-->
          <div class="card-body">

            <div class="mb-3">
              <label class="form-label">{{ __('index.location') }}</label>

              <select class="form-select" name="city_id" required="">
                <option selected="" disabled="" value="">Choose...</option>
                @foreach($cities as $key => $city)

                <option value="{{$city->id}}">{{ $city->city }}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
                <label class="form-label">{{ __('index.location') }}</label>
                <input
                  type="text"
                  class="form-control"
                  name="location"
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
                    <th>{{ __('index.location') }}</th>

                  </tr>
                </thead>
                <tbody>

                  @foreach($locations as $key => $location)
                    <tr>
                        @if ($location->city_id != 1)
                        <td>

                        {{ $key }}
                        </td>
                        <td>{{ $location->city->city }}</td>
                        <td><a href="https://www.google.com/maps?q={{ $location->latitude }},{{ $location->longitude }}" target="_blank">
                            https://www.google.com/maps?q={{ $location->latitude }},{{ $location->longitude }}
                        </a>
                        </td>
                        @endif
                        <td>
                            <form action="{{ route('location.destroy', $location->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                @if ($location->city_id == 1)
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

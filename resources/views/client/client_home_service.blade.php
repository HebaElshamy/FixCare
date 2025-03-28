@extends('client.layouts.app')
@section('title')

@endsection

@section('content')

<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{ __('index.my_consultations') }}</h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
          <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
          <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
        </button>

      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table m-0">
          <thead>
            <tr>
              <th>{{ __('index.consultation_number') }}</th>
              <th>{{ __('index.consultation_topic') }}</th>
              <th>{{ __('index.status') }}</th>
              <th>{{ __('index.creation_date') }}</th>
            </tr>
          </thead>
          <tbody>

            @foreach($home_services as $home_service)
            <tr>
                <td>
                  <a
                  href="{{ route('client.show_home_service', ['id' => $home_service->id]) }}"
                    class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                    >{{ $home_service->consultation_number }}</a
                  >
                </td>
                <td>{{ $home_service->consultation_topic }}</td>
                @if ($home_service->status == 'pending')
                    <td><span class="badge text-bg-warning">{{ __('index.pending') }}</span></td>
                @elseif ($home_service->status == 'rejected')
                <td><span class="badge text-bg-danger"> {{ __('index.rejected') }} </span></td>
                @elseif ($home_service->status == 'completed')
                <td><span class="badge text-bg-success"> {{ __('index.completed') }} </span></td>
                @elseif ($home_service->status == 'approval')
                <td><span class="badge text-bg-info"> {{ __('index.approval') }} </span></td>
                @endif
                <td><div">{{ $home_service->created_at->format('Y-m-d H:i') }}</div></td>
              </tr>
        @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <a href="{{ (route('client.home.service')) }}" class="btn btn-sm btn-primary float-start">
        {{ __('index.new_home_service') }}
      </a>

    </div>
    <!-- /.card-footer -->
</div>
@endsection

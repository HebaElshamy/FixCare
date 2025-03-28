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
              <th>{{ __('index.consultation_manager') }}</th>
              <th>{{ __('index.creation_date') }}</th>
              <th>{{ __('index.submission_date') }}</th>
            </tr>
          </thead>
          <tbody>

            @foreach($consultations as $consultation)
            <tr>
                <td>
                  <a
                  href="{{ route('client.show_consultation', ['id' => $consultation->id]) }}"
                    class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                    >{{ $consultation->consultation_number }}</a
                  >
                </td>
                <td>{{ $consultation->consultation_topic }}</td>
                @if ($consultation->status == 'pending')
                    <td><span class="badge text-bg-warning">{{ __('index.pending') }}</span></td>
                @elseif ($consultation->status == 'rejected')
                <td><span class="badge text-bg-danger"> {{ __('index.rejected') }} </span></td>
                @elseif ($consultation->status == 'completed')
                <td><span class="badge text-bg-success"> {{ __('index.completed') }} </span></td>
                @elseif ($consultation->status == 'closed')
                <td><span class="badge text-bg-dark"> {{ __('index.closed') }} </span></td>
                @elseif ($consultation->status == 'waiting_client')
                <td><span class="badge text-bg-info"> {{ __('index.waiting_client') }} </span></td>
                @elseif ($consultation->status == 'waiting_team')
                <td><span class="badge text-bg-primary"> {{ __('index.waiting_team') }} </span></td>
                @endif

                <td><div">{{ $consultation->team->name ?? 'غير محدد' }}</div></td>
                <td><div">{{ $consultation->created_at->format('Y-m-d H:i') }}</div></td>
              </tr>
        @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
    <div class="card-footer clearfix">
      <a href="{{ (route('client.new_consultation')) }}" class="btn btn-sm btn-primary float-start">
        {{ __('index.new_consultation') }}
      </a>

    </div>
    <!-- /.card-footer -->
</div>
@endsection

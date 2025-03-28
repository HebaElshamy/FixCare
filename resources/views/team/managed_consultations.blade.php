@extends('team.layouts.app')
@section('title')
{{ __('index.managed_consultations') }}
@endsection

@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{ __('index.new_consultations') }}</h3>
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
              <th style="width: 150px">{{ __('index.action') }}</th>
            </tr>
          </thead>
          <tbody>

            @foreach($consultations as $consultation)
            <tr>
                <td>
                  <a
                  href="{{ route('team.show_consultation', ['id' => $consultation->id]) }}"
                    class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"
                    >{{ $consultation->consultation_number }}</a
                  >
                </td>
                <td>{{ $consultation->consultation_topic }}</td>

                <td>
                    <span id="status-badge-{{ $consultation->id }}" class="badge
                        @if ($consultation->status == 'pending') text-bg-warning
                        @elseif ($consultation->status == 'rejected') text-bg-danger
                        @elseif ($consultation->status == 'completed') text-bg-success
                        @elseif ($consultation->status == 'closed') text-bg-dark
                        @elseif ($consultation->status == 'waiting_client') text-bg-info
                        @elseif ($consultation->status == 'waiting_team') text-bg-primary
                        @endif">
                        {{ __('index.' . $consultation->status) }}
                    </span>
                </td>


                <td><div">{{ $consultation->created_at->format('Y-m-d H:i') }}</div></td>
                <td style="width: 200px">
                    <select class="form-select status-select" data-id="{{ $consultation->id }}">
                        @foreach(['waiting_team', 'waiting_client', 'closed', 'completed'] as $status)
                            <option value="{{ $status }}" {{ $consultation->status == $status ? 'selected' : '' }}>
                                {{ ucfirst(str_replace('_', ' ', $status)) }}
                            </option>
                        @endforeach
                    </select>
                </td>


              </tr>
        @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->

    <!-- /.card-footer -->
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    $(".status-select").change(function () {
        let consultationId = $(this).data("id");
        let newStatus = $(this).val();
        let selectElement = $(this); // حفظ العنصر المحدد قبل التغيير

        $.ajax({
            url: "/client/change_status/" + consultationId + "/" + newStatus, // استدعاء نفس الـ Route
            type: "GET", // لا داعي لاستخدام POST لأن الـ Route الحالي يستخدم GET
            success: function (response) {
                if (response.success) {
                    location.reload();
                    // alert("تم تحديث الحالة بنجاح!");
                } else {
                    location.reload();
                    // alert("حدث خطأ، حاول مرة أخرى.");
                }
            },
            error: function () {

                selectElement.val(selectElement.data("old")); // استعادة القيمة السابقة عند الخطأ
            }
        });
    });
});
</script>


@endsection

@extends('admin.layouts.app')
@section('title')
{{ __('index.home_service') }}
@endsection

@section('content')

<div class="card">
    <div class="card-header">
      <h3 class="card-title">{{ __('index.home_service') }}</h3>
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

            @foreach($home_services as $home_service)
            <tr>
                <td>
                  <a
                  href="{{ route('admin.show_home_service', ['id' => $home_service->id]) }}"
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
                <td style="width: 200px">
                    <select class="form-select status-select" data-id="{{ $home_service->id }}">
                        @foreach(['pending', 'approval', 'rejected', 'completed'] as $status)
                            <option value="{{ $status }}" {{ $home_service->status == $status ? 'selected' : '' }}>
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
            url: "/admin/change_status/" + consultationId + "/" + newStatus, // استدعاء نفس الـ Route
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

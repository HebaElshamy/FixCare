@extends('admin.layouts.app')
@section('title')
{{ __('index.client') }}
@endsection

@section('content')
<div class="col-md-12">
    <div class="card mb-4">

      <!-- /.card-header -->
      <div class="card-body">

        <table class="table table-bordered">
          <thead>
              <tr>
                  <th style="width: 10px">#</th>
                  <th>{{ __('index.name') }}</th>
                  <th>{{ __('index.email') }}</th>
                  {{-- <th>{{ __('index.role') }}</th> --}}
                  <th>{{ __('index.consultations') }}</th>
                  <th style="width: 150px">{{ __('index.action') }}</th>
              </tr>
          </thead>
          <tbody>
              @forelse ($users as $index => $user )
              <tr class="align-middle">
                  <td>{{ $index + 1 }}.</td>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>

                    <span class="badge text-bg-success">{{ $user->clientConsultations()->count() }}</span>
                  </td>
                  <td>
                      <div class="d-flex gap-1">

                          <form action="{{ route('admin.client.delete', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger btn-sm">{{ __('index.delete') }}</button>
                          </form>
                      </div>
                  </td>
              </tr>
              @empty

              @endforelse

          </tbody>
      </table>

      </div>
      <!-- /.card-body -->

    </div>
  </div>

@endsection

@extends('admin.layouts.app')
@section('title')

@endsection

@section('content')

<div class="col-md-12">
    <div class="card mb-4">
      <div class="card-header"><h3 class="card-title">Bordered Table</h3></div>
      <!-- /.card-header -->
      <div class="card-body">
        {{-- <table class="table table-bordered">
          <thead>
            <tr>
              <th style="width: 10px">#</th>
              <th>{{ __('index.name') }}</th>
              <th>{{ __('index.role') }}</th>
              <th>{{ __('index.consultations') }}</th>
              <th style="width: 40px">{{ __('index.action') }}</th>
            </tr>
          </thead>
          <tbody>
            <tr class="align-middle">
              <td>1.</td>
              <td>Update software</td>
              <td>
                <div class="progress progress-xs">
                  <div
                    class="progress-bar progress-bar-danger"
                    style="width: 55%"
                  ></div>
                </div>
              </td>
              <td><span class="badge text-bg-danger">55%</span></td>
              <td>

                  <a href="view-url" class="btn btn-info btn-sm">View</a>
                  <a href="edit-url" class="btn btn-warning btn-sm">Edit</a>
                  <form action="delete-url" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                  </form>
              </td>

            </tr>

          </tbody>
        </table> --}}
        <table class="table table-bordered">
          <thead>
              <tr>
                  <th style="width: 10px">#</th>
                  <th>{{ __('index.name') }}</th>
                  <th>{{ __('index.role') }}</th>
                  <th>{{ __('index.consultations') }}</th>
                  <th style="width: 150px">{{ __('index.action') }}</th>
              </tr>
          </thead>
          <tbody>
              @forelse ($users as $index => $user )
              <tr class="align-middle">
                  <td>{{ $index + 1 }}.</td>
                  <td>{{ $user->name }}</td>
                  @if ($user->role == 'trainee')
                  <td> {{ __('index.trainee') }} </td>
                  @elseif ($user->role == 'professional')
                  <td> {{ __('index.professional')  }}</td>
                  @elseif ($user->role == 'expert')
                  <td> {{ __('index.expert') }} </td>
                  @endif

                  <td>

                      <span class="badge text-bg-success">{{ $user->teamConsultations()->count() }}</span>
                  </td>
                  <td>
                      <div class="d-flex gap-1">
                        <a href="view-url" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#{{ $user->id }}">{{ __('index.view') }}</a>
                        <!-- Modal -->
                       <div class="modal fade" id="{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog">
                           <div class="modal-content">
                               <div class="modal-header">
                               <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $user->name }}</h1>
                               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                               </div>
                               <div class="modal-body">

                                   <div class="card-body">


                                       <strong><i class="fas fa-pencil-alt mr-1"></i> {{ __('index.info') }}</strong>
                                       <p class="text-muted">
                                       <li class="tag tag-danger">{{ __('index.role') }} :  {{ $user->role }}</li>
                                       <li class="tag tag-danger">{{ __('index.experience_years') }} :  {{ $user->experience_years }}</li>
                                       <li class="tag tag-danger">{{ __('index.phone') }} :  {{ $user->phone }}</li>
                                       <li class="tag tag-danger">{{ __('index.company_name') }} :  {{ $user->company_name }}</li>
                                       <li class="tag tag-danger">{{ __('index.consultation_fee') }} :  {{ $user->consultation_fee }}</li>
                                       <li class="tag tag-danger">{{ __('index.cv') }} :   <a href="{{asset($user->cv_path)}}" target="_blank"> {{ $user->name }}-{{ __('index.cv') }}</a></li>
                                       </p>

                                   </div>
                               </div>
                               <div class="modal-footer">
                               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                               </div>
                           </div>
                           </div>
                       </div>
                          {{-- <a href="edit-url" class="btn btn-warning btn-sm">Edit</a> --}}
                          <form action="{{ route('admin.team.delete', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
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

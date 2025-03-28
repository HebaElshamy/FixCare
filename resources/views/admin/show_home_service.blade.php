@extends('client.layouts.app')
@section('title')
{{ __('index.consultation_number') }} - {{ $home_service->consultation_number }}
@endsection
@section('dashboard')
{{ __('index.consultation_number') }} - {{ $home_service->consultation_number }}
@endsection
@section('style')
<style>
.post {
    border-bottom: 1px solid #adb5bd;
    color: #666;
    margin-bottom: 15px;
    padding-bottom: 15px;
}

.user-block{
    float: left;
    margin-bottom: 15px;
    width: 100%;
    position: relative;
}
.user-block .description {
    color: #6c757d;
    font-size: 13px;
    margin-top: -3px;
}
.user-block .username {
    font-size: 16px;
    font-weight: 600;
    margin-top: -1px;
    /* display: block; */
    margin-left: 20px;
}
.user-block img {
    float: left;
    height: 40px;
    width: 40px;
}
.user-block .btn-tool {
    position: absolute;
    right: 0;
    top: 0;
    color: #dc3545; /* لون الأحمر لعلامة X */

}

.img-fluid {
    max-width: 100%;
    height: auto;
}
.img-fluid img {
    vertical-align: middle;
    border-style: none;
}
.consultation-topic {
    font-weight: bold;
    color: #007bff; /* لون أزرق يمكن تغييره حسب التصميم */
}
</style>




@endsection

@section('content')

<div class="post clearfix">
    <div class="user-block">
      <img class="direct-chat-img" width="50px" src="{{asset('assets/img/fixcare/default-avatar-profile-icon-of-social-media-user-vector.jpg')}}" alt="User Image">
        <span class="consultation-topic text-bold username ">
            {{ $home_service->consultation_topic }}
        </span> <br>
        <span class="username">
             <a href="{{ route('client.index') }}">{{ $home_service->client->name }}</a>
        </span>
        <span class="description">{{ __('index.created_consultation') }}- {{ $home_service->created_at->diffForHumans() }}</span> <br>
        <span class="description">{{ __('index.status') }} :
            @if ($home_service->status == 'pending')
            <td><span class="badge text-bg-warning">{{ __('index.pending') }}</span></td>
            @elseif ($home_service->status == 'rejected')
            <td><span class="badge text-bg-danger"> {{ __('index.rejected') }} </span></td>
            @elseif ($home_service->status == 'completed')
            <td><span class="badge text-bg-success"> {{ __('index.completed') }} </span></td>
            @elseif ($home_service->status == 'approval')
            <td><span class="badge text-bg-info"> {{ __('index.approval') }} </span></td>

            @endif
        </span>

        <span class="float-end">
            <a href="#"
                class=""
                title="">

             </a>

        </span>

    </div>
    <!-- /.user-block -->
    <p>
        {{ $home_service->original_consultation }}
    </p>
    @if ($home_service->image)
    <div>
        <img class="img-fluid" width="500px" src="{{asset($home_service->image)}}" alt="Photo">
    </div>
    @endif

  </div>

@endsection

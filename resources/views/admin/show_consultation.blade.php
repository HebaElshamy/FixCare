@extends('client.layouts.app')
@section('title')
{{ __('index.consultation_number') }} - {{ $consultation->consultation_number }}
@endsection
@section('dashboard')
{{ __('index.consultation_number') }} - {{ $consultation->consultation_number }}
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

  <!-- include libraries(jQuery, bootstrap) -->
  <script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- include summernote css/js-->
<link href="{{asset('assets/plugins/summernote/summernote-bs5.css')}}" rel="stylesheet">
<script src="{{asset('assets/plugins/summernote/summernote-bs5.js')}}"></script>
@endsection

@section('content')

<div class="post clearfix">
    <div class="user-block">
      <img class="direct-chat-img" width="50px" src="{{asset('assets/img/fixcare/default-avatar-profile-icon-of-social-media-user-vector.jpg')}}" alt="User Image">
        <span class="consultation-topic text-bold username ">
            {{ $consultation->consultation_topic }}
        </span> <br>
        <span class="username">
             <a href="{{ route('client.index') }}">{{ $consultation->client->name }}</a>
        </span>
        <span class="description">{{ __('index.created_consultation') }}- {{ $consultation->created_at->diffForHumans() }}</span> <br>
        <span class="description">{{ __('index.status') }} :
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
        </span>

        <span class="float-end">
            <a href="{{ route('client.change.status', ['id' => $consultation->id , 'status' => 'closed']) }}" class="btn-tool" title="{{ __('index.closed') }}">
                <i class="fas fa-times"></i>
            </a>
        </span>

    </div>
    <!-- /.user-block -->
    <p>
        {{ $consultation->original_consultation }}
    </p>
    @if ($consultation->image)
    <div>
        <img class="img-fluid" width="500px" src="{{asset($consultation->image)}}" alt="Photo">
    </div>
    @endif

  </div>


  @foreach ($consultation_responses as  $response)



  <div class="post clearfix">
    <div class="user-block">
        <img class="direct-chat-img" width="50px" src="{{asset('assets/img/fixcare/default-avatar-profile-icon-of-social-media-user-vector.jpg')}}" alt="User Image">
           <br>
          <span class="username">
            <a href="#">{{ $response->user->name}}</a>
          </span>
          <span class="description">{{ __('index.replied') }}- {{$response->created_at->diffForHumans() }}</span> <br>


      </div>
      <!-- /.user-block -->
      <p> {!! $response->response !!}</p>
  </div>
  @endforeach





<!-- تفعيل Summernote -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
    // تفعيل Summernote
    $('#summernote1, #summernote2').summernote({
        height: 300,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture']]
            ],
            callbacks: {
                onImageUpload: function(files) {
                    uploadImage(files[0]);
                }
            }
    });

    function uploadImage(file) {
            let data = new FormData();
            data.append("image", file);
            data.append("_token", "{{ csrf_token() }}");

            $.ajax({
                url: "{{ route('client.image.upload') }}",
                type: "POST",
                data: data,
                contentType: false,
                processData: false,
                success: function(url) {
                    console.log(url)
                    // $('#image').val(url);
                    // $('#summernote1').summernote("insertImage", url);
                    $('#summernote1').summernote("insertImage", url, function ($image) {
                    $image.css('width', '500px'); // ضبط العرض إلى 500 بكسل
                    $image.css('height', 'auto'); // الحفاظ على نسبة الأبعاد
                });
                },
                error: function(data) {
                    console.log("Upload error:", data);
                }
            });
        }
    });
    // التحقق من الفورم عند الإرسال
    $('#responseForm').submit(function(event) {
        let isValid = true;

        // إعادة تعيين رسائل الخطأ
        $('.error-message').text('');




        if ($('#summernote1').summernote('isEmpty')) {
            $('#error_answer_en').text('Please enter the English answer.');
            isValid = false;
        }


        // إذا كان هناك خطأ، منع إرسال النموذج
        if (!isValid) {
            event.preventDefault();
        }
    });

</script>


















@endsection

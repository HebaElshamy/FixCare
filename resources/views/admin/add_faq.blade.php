

@extends('admin.layouts.app')
@section('title')

@endsection
@section('style')
  <!-- include libraries(jQuery, bootstrap) -->
  <script type="text/javascript" src="//code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- include summernote css/js-->
<link href="{{asset('assets/plugins/summernote/summernote-bs5.css')}}" rel="stylesheet">
<script src="{{asset('assets/plugins/summernote/summernote-bs5.js')}}"></script>
@endsection
@section('content')




<form action="{{ route('admin.sort_faq') }}" method="POST" id="faqForm">
    @csrf
    <div class="row">
        <!-- English Question -->
        <div class="col-md-6">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header"><div class="card-title">English Question</div></div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="question_en" class="form-label">Question (EN)</label>
                        <input type="text" class="form-control" name="question_en" id="question_en"/>
                        <div class="error-message text-danger" id="error_question_en"></div>
                    </div>
                    <div class="mb-3">
                        <label for="answer_en" class="form-label">Answer (EN)</label>
                        <textarea id="summernote1" name="answer_en"></textarea>
                        <div class="error-message text-danger" id="error_answer_en"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Arabic Question -->
        <div class="col-md-6">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header"><div class="card-title">Arabic Question</div></div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="question_ar" class="form-label">Question (AR)</label>
                        <input type="text" class="form-control" name="question_ar" id="question_ar"/>
                        <div class="error-message text-danger" id="error_question_ar"></div>
                    </div>
                    <div class="mb-3">
                        <label for="answer_ar" class="form-label">Answer (AR)</label>
                        <textarea id="summernote2" name="answer_ar"></textarea>
                        <div class="error-message text-danger" id="error_answer_ar"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- زر الإرسال -->
    <div class="col-md-12">
        <div class="card-footer text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>


<!-- تفعيل Summernote -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
    // تفعيل Summernote
    $('#summernote1, #summernote2').summernote({
        height: 200,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture']]
        ]
    });

    // التحقق من الفورم عند الإرسال
    $('#faqForm').submit(function(event) {
        let isValid = true;

        // إعادة تعيين رسائل الخطأ
        $('.error-message').text('');

        // التحقق من كل إدخال
        if ($('#question_en').val().trim() === '') {
            $('#error_question_en').text('Please enter the English question.');
            isValid = false;
        }
        if ($('#question_ar').val().trim() === '') {
            $('#error_question_ar').text('يرجى إدخال السؤال بالعربية.');
            isValid = false;
        }

        if ($('#summernote1').summernote('isEmpty')) {
            $('#error_answer_en').text('Please enter the English answer.');
            isValid = false;
        }
        if ($('#summernote2').summernote('isEmpty')) {
            $('#error_answer_ar').text('يرجى إدخال الإجابة بالعربية.');
            isValid = false;
        }

        // إذا كان هناك خطأ، منع إرسال النموذج
        if (!isValid) {
            event.preventDefault();
        }
    });
});
</script>







@endsection


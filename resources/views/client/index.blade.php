@extends('client.layouts.app')
@section('title')
{{ __('index.instan_assistance') }}
@endsection
@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
@section('content')

<div class="card direct-chat direct-chat-primary mb-4">
    <div class="card-header">
      <h2 class="card-title">{{ __('index.instan_assistance') }}</h2>
      <div class="card-tools">
        {{-- <span title="3 New Messages" class="badge text-bg-primary"> 3 </span> --}}
        <button type="button" class="btn btn-tool" data-lte-toggle="card-collapse">
          <i data-lte-icon="expand" class="bi bi-plus-lg"></i>
          <i data-lte-icon="collapse" class="bi bi-dash-lg"></i>
        </button>
        <button
          type="button"
          class="btn btn-tool"
          title="Contacts" >
          <i class="bi bi-chat-text-fill"></i>
        </button>

      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="direct-chat-msg">
            <div class="direct-chat-infos clearfix">
                <span class="direct-chat-name float-start">{{ "ChatGPT" }}</span>
                <span class="direct-chat-timestamp float-end"></span>
            </div>
            <img class="direct-chat-img" src="assets/img/fixcare/ChatGPT_logo.webp" alt="ChatGPT Image">
            <div class="direct-chat-text">{{ __('index.help_you') }}</div>
        </div>
        <div class="direct-chat-messages" id="chatBox">

        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <form id="chatForm">
            <div class="input-group">
                <input type="text" value="{{ __('index.you') }}" hidden id="you">
                <input type="text" id="message" name="message" placeholder="{{ __('index.write_msg') }}" class="form-control" required>
                <span class="input-group-append">
                    <button type="submit" class="btn btn-primary">{{ __('index.send') }}</button>
                </span>
            </div>
        </form>
    </div>
    <!-- /.card-footer-->
  </div>
  <!-- /.direct-chat -->
  <script>
    $(document).ready(function () {
        function getCurrentTime() {
            let now = new Date();
            return now.getHours() + ":" + ("0" + now.getMinutes()).slice(-2);
        }

        $('#chatForm').submit(function (e) {
            e.preventDefault();
            var message = $('#message').val();
            var time = getCurrentTime();

           var you = $('#you').val();
            $('#chatBox').append(`
                <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                        <span class="direct-chat-name float-end">${you}</span>
                        <span class="direct-chat-timestamp float-start">${time}</span>
                    </div>
                    <img class="direct-chat-img" src="assets/img/fixcare/default-avatar-profile-icon-of-social-media-user-vector.jpg" alt="User Image">
                    <div class="direct-chat-text">${message}</div>
                </div>
            `);

            $.ajax({
                url: "/chat",
                type: "POST",
                data: { message: message, _token: "{{ csrf_token() }}" },
                success: function (data) {
                    let botTime = getCurrentTime();
                    $('#chatBox').append(`
                        <div class="direct-chat-msg">
                            <div class="direct-chat-infos clearfix">
                                <span class="direct-chat-name float-start">ChatGPT</span>
                                <span class="direct-chat-timestamp float-end">${botTime}</span>
                            </div>
                            <img class="direct-chat-img" src="assets/img/fixcare/ChatGPT_logo.webp" alt="ChatGPT Image">
                            <div class="direct-chat-text">${data.response}</div>
                        </div>
                    `);
                    $('#message').val('');
                },
                error: function (xhr) {
                    alert("خطأ: " + xhr.responseText);
                }
            });
        });
    });
</script>
@endsection


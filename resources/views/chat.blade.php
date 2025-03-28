<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat with OpenRouter</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h1>تجربة الدردشة باستخدام OpenRouter</h1>

    <form id="chatForm">
        <textarea id="message" name="message" placeholder="اكتب رسالتك هنا..." required></textarea>
        <button type="submit">إرسال</button>
    </form>

    <div id="response"></div>

    <script>
        $(document).ready(function () {
            $('#chatForm').submit(function (e) {
                e.preventDefault();
                var message = $('#message').val();

                $.ajax({
                    url: "/chat",
                    type: "POST",
                    data: { message: message, _token: "{{ csrf_token() }}" },
                    success: function (data) {
                        $('#response').append("<p><strong>أنت:</strong> " + message + "</p>");
                        $('#response').append("<p><strong>ChatGPT:</strong> " + data.response + "</p>");
                        $('#message').val('');
                    },
                    error: function (xhr) {
                        alert("خطأ: " + xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>
</html>

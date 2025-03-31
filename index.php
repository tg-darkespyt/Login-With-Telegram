<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login with Telegram</title>
</head>
<body>
    <h2>Login with Telegram</h2>
    <script async src="https://telegram.org/js/telegram-widget.js?7"
        data-telegram-login="YOUR_BOT_USERNAME"
        data-size="large"
        data-auth-url="callback.php"
        data-request-access="write">
    </script>
</body>
</html>

<?php
session_start();

// Function to validate Telegram login data
function validateTelegramLogin($auth_data) {
    $bot_token = 'YOUR_BOT_TOKEN';
    $check_hash = $auth_data['hash'];
    unset($auth_data['hash']);

    // Sort data
    ksort($auth_data);
    $data_check_string = '';
    foreach ($auth_data as $key => $value) {
        $data_check_string .= "$key=$value\n";
    }
    $data_check_string = trim($data_check_string);

    // Generate hash
    $secret_key = hash_hmac('sha256', $bot_token, 'WebAppData', true);
    $hash = hash_hmac('sha256', $data_check_string, $secret_key);

    return hash_equals($hash, $check_hash);
}

// Check if Telegram login data exists
if (!empty($_GET) && validateTelegramLogin($_GET)) {
    $_SESSION['user'] = [
        'id' => $_GET['id'],
        'first_name' => $_GET['first_name'],
        'last_name' => $_GET['last_name'] ?? '',
        'username' => $_GET['username'] ?? '',
        'photo_url' => $_GET['photo_url'] ?? '',
    ];

    header("Location: dashboard.php");
    exit;
} else {
    echo "Invalid login attempt.";
}
?>

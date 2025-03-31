<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($user['first_name']); ?>!</h2>
    <p>ID: <?php echo $user['id']; ?></p>
    <p>Username: @<?php echo htmlspecialchars($user['username']); ?></p>
    <img src="<?php echo htmlspecialchars($user['photo_url']); ?>" alt="Profile Picture" width="100">
    <br><br>
    <a href="logout.php">Logout</a>
</body>
</html>

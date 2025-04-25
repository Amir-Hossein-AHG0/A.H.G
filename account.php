<?php
session_start();

if (!isset($_SESSION['username'])) {
    echo "لطفاً وارد حساب کاربری خود شوید.";
    exit;
}

// اتصال به دیتابیس
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "goli_db"; // نام دیتابیس شما

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("اتصال به دیتابیس با خطا مواجه شد: " . $conn->connect_error);
}

$user = $_SESSION['username']; // دریافت نام کاربری از سشن
$sql = "SELECT * FROM users WHERE username = '$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    echo "<h1>اطلاعات حساب کاربری</h1>";
    echo "<p>نام کاربری: " . $user['username'] . "</p>";
    echo "<p>ایمیل: " . $user['email'] . "</p>";
} else {
    echo "اطلاعات کاربری یافت نشد.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حساب کاربری | Goli</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>اطلاعات حساب کاربری</h1>
        <p>خوش آمدید، <?php echo $_SESSION['username']; ?>!</p>
        <a href="logout.php">خروج</a>
    </div>
</body>
</html>

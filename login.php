<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // اتصال به دیتابیس
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "goli_db"; // نام دیتابیس شما

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("اتصال به دیتابیس با خطا مواجه شد: " . $conn->connect_error);
    }

    $user = $_POST['username'];
    $pass = $_POST['password'];

    // بررسی ورود اطلاعات کاربر
    $sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $user; // ذخیره نام کاربری در سشن
        echo "ورود موفقیت‌آمیز. در حال هدایت به صفحه حساب کاربری...";
        header("Location: account.php"); // هدایت به صفحه حساب کاربری
    } else {
        echo "نام کاربری یا رمز عبور اشتباه است.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ورود | Goli</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>ورود به حساب کاربری</h1>
        <form method="POST" action="login.php">
            <label for="username">نام کاربری:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">رمز عبور:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">ورود</button>
        </form>
    </div>
</body>
</html>

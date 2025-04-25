<?php
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

    // دریافت داده‌ها از فرم
    $user = $_POST['username'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // بررسی وجود نام کاربری در دیتابیس
    $sql = "SELECT * FROM users WHERE username = '$user'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "نام کاربری قبلاً استفاده شده است.";
    } else {
        // ثبت نام کاربر در دیتابیس
        $sql = "INSERT INTO users (username, email, password, role) VALUES ('$user', '$email', '$pass', 'user')";
        if ($conn->query($sql) === TRUE) {
            echo "ثبت‌نام موفقیت‌آمیز بود!";
            header("Location: login.php"); // هدایت به صفحه ورود پس از ثبت‌نام
        } else {
            echo "خطا در ثبت‌نام: " . $conn->error;
        }
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت‌نام | Goli</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>فرم ثبت‌نام</h1>
        <form method="POST" action="signup.php">
            <label for="username">نام کاربری:</label>
            <input type="text" id="username" name="username" required>

            <label for="email">ایمیل:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">رمز عبور:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">ثبت‌نام</button>
        </form>
    </div>
</body>
</html>

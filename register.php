<?php
// اگر فرم ارسال شده است
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // دریافت داده‌ها از فرم
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = "user"; // پیش‌فرض: کاربر عادی

    // بررسی ایمیل برای تعیین نقش کاربری
    if ($email == "admin@example.com") {  // در اینجا ایمیل مدیر را بررسی می‌کنیم
        $role = "admin";
    }

    // اتصال به دیتابیس
    $conn = new mysqli("localhost", "root", "", "goli_db");

    if ($conn->connect_error) {
        die("اتصال به دیتابیس با خطا مواجه شد: " . $conn->connect_error);
    }

    // رمزنگاری پسورد برای امنیت بیشتر
    $password = password_hash($password, PASSWORD_DEFAULT);

    // دستور SQL برای درج کاربر جدید
    $sql = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "ثبت‌نام با موفقیت انجام شد!";
        header("Location: login.php"); // پس از ثبت‌نام به صفحه ورود هدایت می‌شود
    } else {
        echo "خطا در ثبت‌نام: " . $conn->error;
    }

    // بستن اتصال به دیتابیس
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
        <form method="POST" action="register.php">
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

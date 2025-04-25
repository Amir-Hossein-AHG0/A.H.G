<?php
// شروع سشن
session_start();

// بررسی اینکه آیا کاربر وارد شده و نقش آن "admin" است یا خیر
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php"); // اگر کاربر مدیر نیست، به صفحه ورود هدایت می‌شود
    exit();
}

// در اینجا می‌توانید محتوای مخصوص بخش مدیریت را اضافه کنید
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مدیریت | Goli</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>بخش مدیریت</h1>
        <p>خوش آمدید، مدیر گرامی!</p>
        <!-- سایر محتوای مربوط به مدیریت -->
        <nav>
            <a href="admin_users.php">مدیریت کاربران</a>
            <a href="admin_comments.php">مدیریت نظرات</a>
            <a href="logout.php">خروج</a>
        </nav>
    </div>
</body>
</html>

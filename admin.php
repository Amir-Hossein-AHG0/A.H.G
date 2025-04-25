<?php
// مدیریت سایت
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: register.php");
    exit();
}
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
        <header>
            <h1>پنل مدیریت</h1>
        </header>

        <section>
            <h2>دستورات مدیریت:</h2>
            <ul>
                <li><a href="manage_posts.php">مدیریت پست‌ها</a></li>
                <li><a href="manage_users.php">مدیریت کاربران</a></li>
                <li><a href="manage_comments.php">مدیریت نظرات</a></li>
            </ul>
        </section>
    </div>
</body>
</html>

<?php
// اطلاعات کاربری
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: register.php");
    exit();
}

$username = $_SESSION['username'];
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
        <header>
            <h1>حساب کاربری: <?php echo $username; ?></h1>
        </header>

        <section>
            <p>ایمیل: <?php echo $_SESSION['email']; ?></p>
            <a href="logout.php">خروج</a>
        </section>
    </div>
</body>
</html>

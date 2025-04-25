<?php
// ثبت‌نام کاربر
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    // اتصال به دیتابیس و ذخیره اطلاعات کاربر (برای تست، به دیتابیس واقعی وصل نشوید)
    $conn = new mysqli("localhost", "root", "", "goli_db");
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "ثبت‌نام موفقیت‌آمیز بود!";
    } else {
        echo "خطا: " . $sql . "<br>" . $conn->error;
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
        <header>
            <h1>ثبت‌نام در Goli.com</h1>
        </header>

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

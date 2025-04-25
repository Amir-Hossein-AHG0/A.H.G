<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $conn = new mysqli("localhost", "root", "", "goli");
  if ($conn->connect_error) {
    die("اتصال به پایگاه داده ناموفق: " . $conn->connect_error);
  }

  $sql = "SELECT * FROM users WHERE email='$email'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
      $_SESSION['user_id'] = $row['id'];
      header("Location: forum.html");
      exit();
    } else {
      echo "رمز عبور اشتباه است.";
    }
  } else {
    echo "کاربری با این ایمیل یافت نشد.";
  }
  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ورود - Goli</title>
  <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  <header>
    <nav>
      <ul>
        <li><a href="index.html" class="logo">Goli</a></li>
        <li><a href="register.php">ثبت‌نام</a></li>
        <li><a href="login.php" class="active">ورود</a></li>
        <li><a href="forum.html">انجمن</a></li>
      </ul>

::contentReference[oaicite:2]{index=2}
 

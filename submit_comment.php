<?php
// ارسال نظر
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $comment = $_POST["comment"];

    // اتصال به دیتابیس و ذخیره نظر
    $conn = new mysqli("localhost", "root", "", "goli_db");
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO comments (comment) VALUES ('$comment')";
    if ($conn->query($sql) === TRUE) {
        echo "نظر با موفقیت ارسال شد!";
    } else {
        echo "خطا: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

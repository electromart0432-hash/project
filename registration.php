<?php
$conn = new mysqli("localhost","root","","electromart");
if ($conn->connect_error) die("DB error");

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $fullname = trim($_POST['fullname']);
    $email    = strtolower(trim($_POST['email']));
    $phone    = trim($_POST['phone']);
    $address  = trim($_POST['address']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare(
        "INSERT INTO users (fullname,email,phone,address,password)
         VALUES (?,?,?,?,?)"
    );
    $stmt->bind_param("sssss",$fullname,$email,$phone,$address,$password);

    if ($stmt->execute()) {
        echo "<script>alert('Registration successful'); window.location='login.html';</script>";
    } else {
        echo "<script>alert('Insert failed');</script>";
    }
}
$conn->close();
?>
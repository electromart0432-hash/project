<?php
session_start();

/* ---------- Database Connection ---------- */
$conn = new mysqli("localhost", "root", "", "electromart");

if ($conn->connect_error) {
    die("Database connection failed");
}

/* ---------- Form Submit Check ---------- */
if ($_SERVER["REQUEST_METHOD"] === "POST") {

   $email    = strtolower(trim($_POST['email']));
$password = $_POST['password'];
    /* ---------- Email Check ---------- */
    $stmt = $conn->prepare(
        "SELECT id, fullname, email, password 
         FROM users WHERE email = ?"
         
    );
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    /* ---------- User Found ---------- */
    if ($result->num_rows === 1) {

        $user = $result->fetch_assoc();

        /* ---------- Password Verify ---------- */
        if (password_verify($password, $user['password'])) {

            // Session set
            $_SESSION['user_id']    = $user['id'];
            $_SESSION['user_name']  = $user['fullname'];
            $_SESSION['user_email'] = $user['email'];

            // Redirect after login
            header("Location: product.html");
            exit;

        } else {
            // ❌ Wrong password
            echo "<script>
                    alert('Incorrect password');
                    window.location.href='login.html';
                  </script>";
            exit;
        }

    } else {
        // ❌ Email not found
        echo "<script>
                alert('Email not found. Please register first.');
                window.location.href='login.html';
              </script>";
        exit;
    }
}

$conn->close();
?>
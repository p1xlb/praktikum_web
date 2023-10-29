<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $hostname = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'POSTTEST';

    $conn = mysqli_connect($hostname, $dbUsername, $dbPassword, $dbName);

    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    $checkUsernameQuery = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($conn, $checkUsernameQuery);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username is already in use, please use another username.');
        window.location.href = 'register_page.html'</script>";
    } else {
        $insertQuery = "INSERT INTO user (username, user_password, userType) VALUES ('$username', '$hashedPassword', 'client')";

        if (mysqli_query($conn, $insertQuery)) {
            echo "<script>alert('Account Registration Successful, you may Login now.');
                window.location.href = 'login_page.html'</script>";
        } else {
            echo "<script>alert('Registration failed. Please try again.');
        window.location.href = 'register_page.html'</script>";
        }
    }

    mysqli_close($conn);
}
?>

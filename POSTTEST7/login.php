<!-- admin cred = admin1 , 1234 -->

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $hostname = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'POSTTEST';

    $conn = mysqli_connect($hostname, $dbUsername, $dbPassword, $dbName);

    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    // Retrieve the hashed password from the database
    $query = "SELECT user_password, userType FROM user WHERE username='$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hashedPassword = $row['user_password'];
        $userType = $row['userType'];

        // Verify the provided password against the hashed password
        if (password_verify($password, $hashedPassword)) {
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['userType'] = $userType;

            // Redirect to the dashboard or home page after successful login
            header('Location: index.php');
            exit;
        } else {
            echo "<script>alert('entered Username or Password is incorrect, please try again.');
        window.location.href = 'login_page.html'</script>";
        }
    } else {
        echo "<script>alert('entered Username or Password is incorrect, please try again.');
        window.location.href = 'login_page.html'</script>";
    }

    mysqli_close($conn);
}
?>

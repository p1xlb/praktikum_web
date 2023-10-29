<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login_page.html');
    exit;
}

if ($_SESSION['userType'] !== 'admin') {
    echo "<script>alert('You are not authorized to access this page.');
        window.location.href = 'available_airplanes.php'</script>";
    exit;
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "POSTTEST";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM available WHERE airplane_id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Aircraft data has been successfully deleted.');
        window.location.href = 'available_airplanes.php'</script>";
    } else {
        echo "Error deleting aircraft entry: " . $conn->error;
    }
}

$conn->close();
?>
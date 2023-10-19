<?php
// Database connection setup (replace with your credentials).
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "POSTTEST";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the ID parameter is set and valid.
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];
    // Perform the deletion query.
    $sql = "DELETE FROM available WHERE airplane_id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Aircraft data has been successfully deleted.');
        window.location.href = 'available_airplanes.php'</script>";
    } else {
        echo "Error deleting aircraft entry: " . $conn->error;
    }
}

// Close the database connection.
$conn->close();
?>
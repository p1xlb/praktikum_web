<?php
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
    $sql = "DELETE FROM Contact WHERE inquiry_id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Message has been deleted.');
        window.location.href = 'contacts_list.php'</script>";
    } else {
        echo "Error deleting aircraft entry: " . $conn->error;
    }
}

$conn->close();
?>
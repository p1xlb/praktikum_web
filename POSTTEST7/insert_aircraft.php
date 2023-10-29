<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $servername = "localhost"; 
    $username = "root";
    $password = "";
    $dbname = "POSTTEST";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $airplane = $_POST["airplane"];
    $airplane_type = $_POST["airplane_type"];
    $capacity = $_POST["capacity"];
    $availability = $_POST["availability"];

    $sql = "INSERT INTO available (airplane, airplane_type, capacity, availability) 
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssis", $airplane, $airplane_type, $capacity, $availability);

    if ($stmt->execute()) {
        echo "<script>
        alert('Aircraft data has been successfully saved.');
        window.location.href = 'available_airplanes.php';
      </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "<p>No data submitted.</p>";
}
?>
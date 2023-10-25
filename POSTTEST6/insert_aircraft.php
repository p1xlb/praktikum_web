<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Database connection information
    $servername = "localhost"; // Change this to your database server name
    $username = "root";
    $password = "";
    $dbname = "POSTTEST";

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $airplane = $_POST["airplane"];
    $airplane_type = $_POST["airplane_type"];
    $capacity = $_POST["capacity"];
    $availability = $_POST["availability"];

    // SQL query to insert data into the "available" table
    $sql = "INSERT INTO available (airplane, airplane_type, capacity, availability) 
            VALUES (?, ?, ?, ?)";

    // Prepare and bind the SQL statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssis", $airplane, $airplane_type, $capacity, $availability);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<script>
        alert('Aircraft data has been successfully saved.');
        window.location.href = 'available_airplanes.php';
      </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    echo "<p>No data submitted.</p>";
}
?>
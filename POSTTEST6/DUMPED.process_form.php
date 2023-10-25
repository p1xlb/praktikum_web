<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>National Charters - Plane Charter Services</title>
    <script src="styles.js"></script>
    <link rel="stylesheet" href="process_form.css">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
</head>
<body>
    <header>
        
        <div>
            <h1>National Charters</h1>
            <p>All Needs  Aircraft Chartering</p>    
        </div>
        <div>
            <img class="logo" src="national.png" alt="logo">
        </div>
    </header>
    
    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li class="services"><a href="#">Services</a></li>
            <li class="fleet"><a href="available_airplanes.php">Fleet</a></li>
            <li><a href="about.html">About</a></li>
            <li><a href="contact.html">Contact</a></li>
            <li><button id="theme-button">THEME</button></li>
        </ul>
    </nav>

    <!-- Inside the .container div, replace the "About Me" section with the contact form -->
<div class="container">
    <h1>Your Message to Us</h1>
    <br>

<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        // Database connection information
    $servername = "localhost"; // Change this to your database server name
    $username = "your_username";
    $password = "your_password";
    $dbname = "POSTTEST";

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
        // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $aircraft = $_POST["aircraft"];
    $services = isset($_POST["services"]) ? implode(', ', $_POST["services"]) : "None selected";
    $passengers = $_POST["passengers"];
    
            // Display submitted data
        echo "<p><strong>Name:</strong> $name</p>";
        echo "<p><strong>Email Address:</strong> $email</p>";
        echo "<p><strong>Type of Aircraft:</strong> $aircraft</p>";
        echo "<p><strong>Types of Services:</strong> $services</p>";
        echo "<p><strong>Number of Passengers:</strong> $passengers</p>";
        echo "<br><p>Our team will reach out to you by email with aircraft and scheduling options as soon as possible.</p>";


    // SQL query to insert data into the Contact table
    $sql = "INSERT INTO Contact (name, email, aircraft_type, services, num_of_pax) 
            VALUES (?, ?, ?, ?, ?)";
    
    // Prepare and bind the SQL statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $name, $email, $aircraft, $services, $passengers);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<p>Data has been successfully saved to the database.</p>";
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
</div>

    <footer>
    &copy; 2023 National Charters | All Rights Reserved
</footer>
</body>

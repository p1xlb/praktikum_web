<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>National Charters - Plane Charter Services</title>
    <script src="styles.js"></script>
    <link rel="stylesheet" href="contact_p_style.css">
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
            <li class="contact"><a href="contact.html">Contact</a></li>
            <li><button id="theme-button">THEME</button></li>
        </ul>
    </nav>

    <div class="container">
<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'POSTTEST';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $aircraftType = $_POST['aircraft-type'];
    $numOfPassengers = $_POST['passengers'];
    $specialRequests = $_POST['special-requests'];

    $imagePath = ''; 
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/'; 
        $originalFileName = basename($_FILES['image']['name']);
        $extension = pathinfo($originalFileName, PATHINFO_EXTENSION);

        $newFileName = date("Y-m-d") . ' ' . $originalFileName;
        $uploadedFile = $uploadDir . $newFileName;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFile)) {
            $imagePath = $uploadedFile;
            }
        }

    $sql = "INSERT INTO Contact (name, email, aircraft_type, num_of_pax, requests, image_path) 
            VALUES ('$name', '$email', '$aircraftType', $numOfPassengers, '$specialRequests', '$imagePath')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>Your Message to us</h2>";
        echo "<p><strong>Name:</strong> $name</p>";
        echo "<p><strong>Email Address:</strong> $email</p>";
        echo "<p><strong>Type of Aircraft:</strong> $aircraftType</p>";
        echo "<p><strong>Number of Passengers:</strong> $numOfPassengers</p>";
        echo "<p><strong>Special Requests:</strong> $specialRequests</p><br>";
        echo "<p>Your Requests has been sent, our team will be in touch with you via email as soon as possible.<p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    echo "<p><a href='index.html'>Back to Home</a></p>";
        

    $conn->close();
}
?>

</div>

<footer>
&copy; 2023 National Charters | All Rights Reserved
</footer>
</body>
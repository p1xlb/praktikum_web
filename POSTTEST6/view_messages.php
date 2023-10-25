<?php
if (isset($_GET['id'])) {
    $contactId = $_GET['id'];
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "POSTTEST";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM Contact WHERE inquiry_id = $contactId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
        $aircraftType = $row['aircraft_type'];
        $numOfPax = $row['num_of_pax'];
        $specialRequests = $row['requests'];
        $imagePath = $row['image_path'];
    } else {
        echo "Contact not found.";
        exit();
    }
    
    $conn->close();
} else {
    echo "Contact ID not provided.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Details</title>
    <link rel="stylesheet" href="view_style.css">
    <script src="styles.js"></script>
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
        <h2>Contact Information</h2>
        <p><strong>Name:</strong> <?php echo $name; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>Aircraft Type:</strong> <?php echo $aircraftType; ?></p>
        <p><strong>Number of Passengers:</strong> <?php echo $numOfPax; ?></p>
        <p><strong>Special Requests:</strong> <?php echo $specialRequests; ?></p>
        <?php if (!empty($imagePath)) { ?>
            <p><strong>Image:</strong></p>
            <img src="<?php echo $imagePath; ?>" alt="Contact Image">
        <?php } ?>
    </div>

    <footer>
        &copy; 2023 National Charters | All Rights Reserved
    </footer>
</body>
</html>

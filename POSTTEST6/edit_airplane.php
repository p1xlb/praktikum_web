<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "POSTTEST";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$airplane_id = $airplane = $airplane_type = $capacity = $availability = "";

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM available WHERE airplane_id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $airplane_id = $row['airplane_id'];
        $airplane = $row['airplane'];
        $airplane_type = $row['airplane_type'];
        $capacity = $row['capacity'];
        $availability = $row['availability'];
    } else {
        echo "Aircraft entry not found.";
    }
} else {
    echo "Invalid aircraft ID.";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $airplane_id = $_POST["airplane_id"];
    $airplane = $_POST["airplane"];
    $airplane_type = $_POST["airplane_type"];
    $capacity = $_POST["capacity"];
    $availability = $_POST["availability"];

    $sql = "UPDATE available SET 
            airplane = '$airplane', 
            airplane_type = '$airplane_type', 
            capacity = '$capacity', 
            availability = '$availability' 
            WHERE airplane_id = $airplane_id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
        alert('Aircraft data has been successfully updates.');
        window.location.href = 'available_airplanes.php';
        </script>";
    } else {
        echo "Error updating aircraft entry: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>National Charters - Plane Charter Services</title>
    <link rel="stylesheet" href="edit_style.css">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <script src="styles.js"></script>
</head>
<body>
    <header>
        <div>
            <h1>National Charters</h1>
            <p>All Needs  Aircraft Chartering</p>    
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

<div class="container">
<h2>Edit Aircraft Entry</h2>
    <form method="post" action="edit_airplane.php?id=<?php echo $airplane_id; ?>">
        <label for="airplane">Aircraft Name:</label>
        <input type="text" id="airplane" name="airplane" value="<?php echo $airplane; ?>"><br><br>

        <label for="airplane_type">Aircraft Type:</label>
        <input type="text" id="airplane_type" name="airplane_type" value="<?php echo $airplane_type; ?>"><br><br>

        <label for="capacity">Capacity:</label>
        <input type="text" id="capacity" name="capacity" value="<?php echo $capacity; ?>"><br><br>

        <label for="availability">Availability:</label>
        <input type="text" id="availability" name="availability" value="<?php echo $availability; ?>"><br><br>

        <input type="hidden" name="airplane_id" value="<?php echo $airplane_id; ?>">
        <button type="submit" value="Update Entry">Update Aircraft</button>
    </form>
</div>

<footer>
        &copy; 2023 National Charters | All Rights Reserved
    </footer>
</body>
</html>

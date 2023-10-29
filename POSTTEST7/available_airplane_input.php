<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login_page.html');
    exit;
}

// Check if the user is an admin
if ($_SESSION['userType'] !== 'admin') {
    echo "<script>alert('You are not authorized to access this page.');
        window.location.href = 'available_airplanes.php'</script>";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>National Charters - Plane Charter Services</title>
    <link rel="stylesheet" href="input_style.css">
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
            <li><a href="index.php">Home</a></li>
            <li class="services"><a href="#">Services</a></li>
            <li class="fleet"><a href="available_airplanes.php">Fleet</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><button id="theme-button">THEME</button></li>
        </ul>
    </nav>

<div class="container">
    <h2>Add Aircraft</h2>
    <form method="post" action="insert_aircraft.php">
        <div class="form-group">
            <label for="airplane">Airplane:</label>
            <input type="text" name="airplane" id="airplane" required>
        </div>

        <div class="form-group">
            <label for="airplane_type">Airplane Type:</label>
            <select name="airplane_type" id="airplane_type" required>
                <option value="Luxury Jet">Luxury Jet</option>
                <option value="Ultra Long Range Jet">Ultra Long Range Jet</option>
                <option value="Turboprop">Turboprop</option>
                <option value="Helicopter">Helicopter</option>
            </select>
        </div>

        <div class="form-group">
            <label for="capacity">Capacity:</label>
            <input type="number" name="capacity" id="capacity" required>
        </div>

        <div class="form-group">
            <label for="availability">Availability:</label>
            <input type="date" name="availability" id="availability" required>
        </div>

        <button type="submit" value="Add Aircraft">Add Aircraft</button>
    </form>
</div>

<footer>
        &copy; 2023 National Charters | All Rights Reserved
    </footer>
</body>
</html>

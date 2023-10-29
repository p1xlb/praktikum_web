<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login_page.html');
    exit;
}

if ($_SESSION['userType'] !== 'admin') {
    echo "Access denied. This page is only accessible to administrators.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>National Charters - Plane Charter Services</title>
    <script src="styles.js"></script>
    <link rel="stylesheet" href="available_style.css">
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
            <li><a href="index.php">Home</a></li>
            <li class="services"><a href="#">Services</a></li>
            <li class="fleet"><a href="available_airplanes.php">Fleet</a></li>
            <li><a href="about.php">About</a></li>
            <li class="contact"><a href="contact.html">Contact</a></li>
            <li><button id="theme-button">THEME</button></li>
        </ul>
    </nav>

    <div class="container">
    <h2>All Contacts</h2>
    <div id="datetime-info"></div>
    <table class="styled-table">
        <tr class="header-row">
            <th>Inquiry ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Aircraft Type</th>
            <th>Number of Passengers</th>
            <th>Actions</th>
        </tr>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "POSTTEST";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT inquiry_id, name, email, aircraft_type, num_of_pax FROM Contact";
        $result = $conn->query($sql);

        $rowNumber = 1;
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['inquiry_id'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['aircraft_type'] . '</td>';
                echo '<td>' . $row['num_of_pax'] . '</td>';
                echo '<td>';
                echo '<a href="view_messages.php?id=' . $row['inquiry_id'] . '">View</a>';
                echo ' | ';
                echo '<a href="contact_delete.php?id=' . $row['inquiry_id'] . '">Delete</a>';                
                echo '</td>';
                echo '</tr>';
                $rowNumber++;
            }
        } else {
            echo '<tr><td colspan="6">No contacts available.</td></tr>';
        }
        $conn->close();
        ?>
    </table>
</div>


    <footer>
    &copy; 2023 National Charters | All Rights Reserved
</footer>
</body>
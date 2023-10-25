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
            <li><a href="index.html">Home</a></li>
            <li class="services"><a href="#">Services</a></li>
            <li class="fleet"><a href="#">Fleet</a></li>
            <li><a href="about.html">About</a></li>
            <li class="contact"><a href="contact.html">Contact</a></li>
            <li><button id="theme-button">THEME</button></li>
        </ul>
    </nav>

    <div class="container">
    <h2>Available Airplanes</h2>
    <button class="add-button">Add Available Airplane</button><br>
    <div id="datetime-info"></div>
    <table class="styled-table">
        <tr class="header-row">
            <th>Number</th>
            <th>Airplane</th>
            <th>Airplane Type</th>
            <th>Capacity</th>
            <th>Available Until</th>
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

            $sql = "SELECT * FROM available";
            $result = $conn->query($sql);

            $rowNumber = 1;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $rowNumber . '</td>';
                    echo '<td>' . $row['airplane'] . '</td>';
                    echo '<td>' . $row['airplane_type'] . '</td>';
                    echo '<td>' . $row['capacity'] . '</td>';
                    echo '<td>' . $row['availability'] . '</td>';
                    echo '<td>';
                    echo '<a href="edit_airplane.php?id=' . $row['airplane_id'] . '">Edit</a>';
                    echo ' | ';
                    echo '<a href="delete_airplane.php?id=' . $row['airplane_id'] . '">Delete</a>';
                    echo '</td>';
                    echo '</tr>';
                    $rowNumber++;
                }
            } else {
                echo '<tr><td colspan="6">No airplanes available.</td></tr>';
            }
            $conn->close();
            ?>
                </table>
        </div>
    </div>

    <footer>
    &copy; 2023 National Charters | All Rights Reserved
</footer>
</body>
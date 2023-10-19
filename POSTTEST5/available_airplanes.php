<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>National Charters - Plane Charter Services</title>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
    const themeButton = document.getElementById("theme-button");
    const container = document.querySelector(".container");
    const cards = document.querySelectorAll(".card");
    const services = document.querySelector(".services")
    const hc1 = document.querySelector(".HC1")
    const hc2 = document.querySelector(".HC2")
    const hc3 = document.querySelector(".HC3")
    const hc4 = document.querySelector(".HC4")
    const pc1 = document.querySelector(".PC1")
    const pc2 = document.querySelector(".PC2")
    const pc3 = document.querySelector(".PC3")
    const pc4 = document.querySelector(".PC4")
    const profileImage = document.getElementById("profile-image");
    const add_button = document.querySelector(".add-button");
    const body = document.body;

    themeButton.addEventListener("click", function () {
        container.classList.toggle("dark-theme-container");
        for (var card of cards) {
            card.classList.toggle("dark-theme-card");            
        }
    });

    services.addEventListener("click", function(){
        alert("Feature is not available at the moment. Coming soon...");
    });

    if(hc1)
    hc1.addEventListener("click", function(){
        if(pc1.style.display == "none"){
            pc1.style.display = "block";
        }
        else{
            pc1.style.display = "none"
        }
        
    })

    if(hc2)
    hc2.addEventListener("click", function(){
        if(pc2.style.display == "none"){
            pc2.style.display = "block";
        }
        else{
            pc2.style.display = "none"
        }
        
    })

    if(hc3)
    hc3.addEventListener("click", function(){
        if(pc3.style.display == "none"){
            pc3.style.display = "block";
        }
        else{
            pc3.style.display = "none"
        }
        
    })

    if(hc4)
    hc4.addEventListener("click", function(){
        if(pc4.style.display == "none"){
            pc4.style.display = "block";
        }
        else{
            pc4.style.display = "none"
        }
        
    })

    if(profileImage)
    profileImage.addEventListener("click", function(){
        if (body.style.backgroundImage === 'url("global-express.jpg")') {
            body.style.backgroundImage = 'url("bombardier-global-7500.jpg")';
        } else {
            body.style.backgroundImage = 'url("global-express.jpg")';
        }


    });

    if(add_button)
    add_button.addEventListener("click", function(){
        window.location.href = "available_airplane_input.html";
    });
});
    </script>
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
            <li class="contact"><a href="#">Contact</a></li>
            <li><button id="theme-button">THEME</button></li>
        </ul>
    </nav>

    <div class="container">
    <h2>Available Airplanes</h2>
    <button class="add-button">Add Available Airplane</button>
    <table class="styled-table">
        <tr class="header-row">
            <th>Number</th>
            <th>Airplane</th>
            <th>Airplane Type</th>
            <th>Capacity</th>
            <th>Available Until</th>
            <th>Actions</th>
        </tr>
        <!-- Here, you'll populate the table with data from your database using server-side scripting. -->
        <?php
            // Database connection setup (you need to replace these with your own credentials).
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "POSTTEST";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Query the database to retrieve airplane data.
            $sql = "SELECT * FROM available";
            $result = $conn->query($sql);

            // Generate HTML table rows with data.
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
            // Close the database connection.
            $conn->close();
            ?>
                </table>
        </div>
    </div>

    <footer>
    &copy; 2023 National Charters | All Rights Reserved
</footer>
</body>
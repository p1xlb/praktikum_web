<?php
// Database connection setup (replace with your credentials).
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "POSTTEST";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables to store aircraft data
$airplane_id = $airplane = $airplane_type = $capacity = $availability = "";

// Check if the ID parameter is set and valid.
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the aircraft entry from the database.
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
        // Handle the case where the ID parameter does not match any entry.
        echo "Aircraft entry not found.";
    }
} else {
    // Handle the case where the ID parameter is not valid.
    echo "Invalid aircraft ID.";
}

// Handle form submission for updating the aircraft entry.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $airplane_id = $_POST["airplane_id"];
    $airplane = $_POST["airplane"];
    $airplane_type = $_POST["airplane_type"];
    $capacity = $_POST["capacity"];
    $availability = $_POST["availability"];

    // Perform the update query.
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

// Close the database connection.
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
    const body = document.body;

    if(themeButton)
    themeButton.addEventListener("click", function () {
        container.classList.toggle("dark-theme-container");
        for (var card of cards) {
            card.classList.toggle("dark-theme-card");            
        }
    });

    if(services)
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
});

    </script>
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

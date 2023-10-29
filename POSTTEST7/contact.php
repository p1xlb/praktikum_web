<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>National Charters - Plane Charter Services</title>
    <script src="styles.js"></script>
    <link rel="stylesheet" href="contact_style.css">
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
            <li class="fleet"><a href="#">Fleet</a></li>
            <li><a href="about.php">About</a></li>
            <li class="contact"><a href="#">Contact</a></li>
            <li><button id="theme-button">THEME</button></li>
        </ul>
    </nav>

    <div class="container">
    <h2>Contact Us</h2>

<form id="contact-form" method="post" enctype="multipart/form-data" action = "contact_process.php">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="aircraft-type">Aircraft Type:</label>
    <select id="aircraft-type" name="aircraft-type">
        <option value="Luxury Jet">Luxury Jet</option>
        <option value="Turboprop">Turboprop</option>
        <option value="Helicopter">Helicopter</option>
        <option value="Ultra Long Range Jet">Ultra Long Range Jet</option>
    </select>

    <label for="passengers">Number of Passengers:</label>
    <input type="number" id="passengers" name="passengers" required>

    <label for="special-requests">Special Requests:</label>
    <textarea id="special-requests" name="special-requests"></textarea>

    <label for="image">Upload Image:</label>
    <input type="file" id="image" name="image">
    <br>
    <br>
    <button type="submit">Submit</button>
</form>
    </div>

    <footer>
    &copy; 2023 National Charters | All Rights Reserved
</footer>
</body>
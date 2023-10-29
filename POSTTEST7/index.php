<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>National Charters - Plane Charter Services</title>
    <script src="styles.js"></script>
    <link rel="stylesheet" href="style.css">
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
            <li><a href="#">Home</a></li>
            <li class="services"><a href="#">Services</a></li>
            <li><a href="available_airplanes.php">Fleet</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li id="login-logout-button"></li>
            <li><button id="theme-button">THEME</button></li>
            <script>
                const loginLogoutButton = document.getElementById("login-logout-button");

                const isLoggedIn = <?php echo isset($_SESSION['username']) ? 'true' : 'false' ?>;
                
                function toggleLoginLogoutButton() {
                    if (isLoggedIn) {
                        loginLogoutButton.innerHTML = '<a href="logout.php">Logout</a>';
                    } else {
                        loginLogoutButton.innerHTML = '<a href="login_page.html">Login</a>';
                    }
                }
                
                toggleLoginLogoutButton();
            </script>
        </ul>
    </nav>

    <div class="container">
        <h2>National Charters, a charter airline you can depend on.</h2>
        <p class="texttop">Experience luxury travel like never before with National Charters. We provide private plane charter services that are tailored to your needs. Whether it's a business trip or a leisurely getaway, we have the perfect aircraft for you. We pride ourselves in our Award Winning service, guaranteeing you a pleasurable, comfortable, and unforgettable journey to your destination.</p>

        <h2>Our Services</h2>
        <p>Our services include:</p>
        <ul class="containerlist">
            <li>Private Jet Charters</li>
            <li>Aircraft Management</li>
            <li>Customized Flight Plans</li>
            <li>Excellent Inflight Service</li>
            <li>World Class Inflight Catering</li>
            <li>24/7 Customer Support</li>
        </ul>

        <h2>Our Fleet</h2>
        <p>We maintain a diverse fleet of aircraft, including:</p>
        <div class="card-container">
        <!-- Card 1 -->
           <div class="card">
            <img class="HC1" src="luxury_jet.jpg" alt="Luxury Jet">
            <h3>Luxury Jet</h3>
            <p class="PC1" style="display: none;">Experience the epitome of luxury and comfort with our high-end luxury jets. Perfect for VIP travel and executive flights.</p>
        </div>

        <!-- Card 2 -->
        <div class="card">
            <img class="HC2" src="turboprop.jpg" alt="Turboprop">
            <h3>Turboprop</h3>
            <p class="PC2" style="display: none;">Efficient and versatile, our turboprop aircraft are ideal for short to medium-haul flights and regional travel.</p>
        </div>

        <!-- Card 3 -->
        <div class="card">
            <img class="HC3" src="helicopter.jpg" alt="Helicopter">
            <h3>Helicopter</h3>
            <p class="PC3" style="display: none;">For quick and convenient transportation, our helicopters provide access to remote locations and city centers.</p>
        </div>

        <!-- Card 4 -->
        <div class="card">
            <img class="HC4" src="ultra_long_range_jet.jpg" alt="Ultra Long-Range Jet">
            <h3>Ultra Long-Range Jet</h3>
            <p class="PC4" style="display: none;">Travel the world in style with our ultra long-range jets, offering non-stop flights to far-reaching destinations.</p>
            </div>
        </div>
    </div>

    <footer>
        &copy; 2023 National Charters | All Rights Reserved
    </footer>
</body>
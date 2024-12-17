<?php
session_start();
$isSignedIn = isset($_SESSION['user_id']) && $_SESSION['user_id'] !== '';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="About Us page for GizmoGalaxy, an e-commerce platform for devices and accessories.">
    <title>About Us | Gizmo Galaxy</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="img/logo.png">

    <style>
        /* Importing Google Fonts */
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap");

        /* General body styling */
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5eded;
        }

        /* Navbar styles */
        .navbar-logo {
            height: 26px;
            width: auto;
        }

        .site-header {
            background-color: rgba(0, 0, 0, .85);
            backdrop-filter: saturate(180%) blur(20px);
            padding: 5px 0;
        }

        .site-header a {
            color: #80ccbb;
            margin: 0 15px;
            text-decoration: none;
            transition: color .15s ease-in-out;
        }

        .site-header a:hover {
            color: #fff;
        }

        /* About Us Section Styling */
        header {
            text-align: center;
            margin: 20px 0;
        }

        header h1 {
            font-size: 2.5rem;
            color: #333;
        }

        section {
            padding: 2rem;
            max-width: 900px;
            margin: 0 auto;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            color: #333;
            margin-bottom: 1rem;
        }

        p {
            line-height: 1.6;
            color: #555;
        }

        /* Team Section */
        .team {
            margin: 2rem 0;
        }

        .team-member {
            margin-bottom: 1rem;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 1.5rem;
            background-color: #333;
            color: #fff;
        }

        footer a {
            color: #80ccbb;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
            color: #fff;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="site-header sticky-top py-1">
        <div class="container d-flex flex-column flex-md-row justify-content-between">
            <a class="py-2" href="index.php" aria-label="Home">
                <img src="img/logo.png" alt="Logo" class="navbar-logo">
            </a>
            <a class="py-2 d-none d-md-inline-block" href="index.php">Home</a>
            <a class="py-2 d-none d-md-inline-block" href="shop.php">Shop</a>
            <a class="py-2 d-none d-md-inline-block" href="about.php">About Us</a>
            <a class="py-2 d-none d-md-inline-block" href="trade in.php">Trade-in</a>
            <?php if ($isSignedIn): ?>
                <a class="py-2 d-none d-md-inline-block" href="profile.php">Profile</a>
            <?php else: ?>
                <a class="py-2 d-none d-md-inline-block" href="sign in.php">Sign In</a>
            <?php endif; ?>
            <a class="py-2 d-none d-md-inline-block" href="cart.php">Cart</a>
        </div>
    </nav>

    <!-- About Us Section -->
    <header>
        <h1>About Us</h1>
    </header>

    <section>
        <h2>What We Do</h2>
        <p>Welcome to GizmoGalaxy, your trusted online destination for the latest devices and accessories. We specialize in offering top-quality smartphones, devices, chargers, cables, and more at competitive prices. Whether you're looking to upgrade your device, trade in your old phone, or find the perfect accessory, we’ve got you covered.</p>

        <h2>Meet Our Team</h2>
        <div class="team">
            <div class="team-member">
                <strong>Iftakhar Manna</strong> - Developer <br>
                Email: <a href="mailto:gn9634@wayne.edu">gn9634@wayne.edu</a>
            </div>
            <div class="team-member">
                <strong>Abdullah Ashraf</strong> - Developer <br>
                Email: <a href="mailto:ha6113@wayne.edu">ha6113@wayne.edu</a>
            </div>
            <div class="team-member">
                <strong>Kirsten Osborne</strong> - Developer <br>
                Email: <a href="mailto:hf3984@wayne.edu">hf3984@wayne.edu</a>
            </div>
            <div class="team-member">
                <strong>Tahmid Islam</strong> - Developer <br>
                Email: <a href="mailto:hg5280@wayne.edu">hg5280@wayne.edu</a>
            </div>
        </div>

        <h2>Our Location</h2>
        <p>
            42 W Warren Ave <br>
            Detroit, MI 48202 <br>
            Phone: (123) 456-7890 <br>
            Email: <a href="mailto:GizmoGalaxy@gmail.com">GizmoGalaxy@gmail.com</a>
        </p>

        <h2>Privacy and Terms</h2>
        <p>We value your privacy and are committed to protecting your personal information. When you shop with us, we collect only the information necessary to process your order, such as your name, contact details, and payment information. We do not share your information with third parties, except when required to complete a transaction or by law.</p>
        <p>By using our website, you agree to our terms and conditions, including how we handle and store your data. For more details, please review our full <a href="terms.pdf" target="_blank">Terms and Conditions</a>.</p>
    </section>

    <footer>
        <p>&copy; 2024 Gizmo Galaxy. All rights reserved. | <a href="terms.pdf" target="_blank">Terms and Conditions</a></p>
    </footer>

</body>
</html>
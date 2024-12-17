<?php
include 'db.php';
session_start();

// Check if user_id is set AND has a value in the session
$isSignedIn = isset($_SESSION['user_id']) && $_SESSION['user_id'] !== '';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.72.0">

    <title>Gizmo Galaxy</title>
    <link rel="icon" href="img/logo.png">
    <link rel="canonical" href="https://v5.getbootstrap.com/docs/5.0/examples/product/">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"
        integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <!-- Link to external stylesheet -->
    <link rel="stylesheet" href="styles.css"> 
</head>

<body>

    <nav class="site-header sticky-top py-1">
        <div class="container d-flex flex-column flex-md-row justify-content-between">
            <a class="py-2" href="#" aria-label="Product">
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

    <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center header-background">
        <div class="col-md-5 p-lg-5 ml-auto my-5 ">
            <h1 class="display-4 font-weight-normal text-white">Gizmo Galaxy X</h1>
            <p class="text-white">Redefine the Future Today.</p>
            <p class="lead font-weight-normal text-white">The Gizmo Galaxy X isn't just a smartphone. It's a revolution in your pocket. Seamlessly blending cutting-edge 
                technology with sleek, minimalist design, the Gizmo Galaxy X delivers power that feels effortless.</p>
            <a class="btn btn-outline-secondary" href="shop.php">Shop Now</a>
        </div>
    </div>

    <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
        <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
            <div class="my-3 py-3">
                <h2 class="display-5">Gizmo Watch</h2>
                <p class="lead">Time Flies. You Control It.</p>
            </div>
            <div class="mx-auto custom-image2-container"></div>
        </div>
        <div class="custom-color2 mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 p-3">
                <h2 class="display-5">Gizmo Tablet</h2>
                <p class="lead">Power of a PC. Simplicity of a Tablet.</p>
            </div>
            <div class="mx-auto custom-image3-container"></div>
        </div>
    </div>

    <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
        <div class="custom-color3 mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 p-3">
                <h2 class="display-5">Gizmo Headphones</h2>
                <p class="lead">Hear Every Detail. Feel Every Beat.</p>
            </div>
            <div class="mx-auto custom-image4-container"></div>
        </div>
        <div class="bg-secondary mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
            <div class="my-3 py-3">
                <h2 class="display-5">Gizmo Buds</h2>
                <p class="lead">Big Sound. Small Package.</p>
            </div>
            <div class="mx-auto custom-image5-container"></div>
        </div>
    </div>

    <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
        <div class="custom-color5 mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
            <div class="my-3 p-3">
                <h2 class="display-5">Gizmo TV</h2>
                <p class="lead">More Than Just TV. It’s an Experience.</p>
            </div>
            <div class="mx-auto custom-image8-container"></div>
        </div>
    </div>

    <footer class="container py-5">
        <div class="row justify-content-between align-items-center">
            <!-- Copyright Section -->
            <div class="col-md-6 text-center text-md-left">
                <small class="text-muted">&copy; Copyright Gizmo Galaxy 2024</small>
            </div>
            
            <!-- Contact Section -->
            <div class="col-md-6 text-center text-md-right">
                <h5 class="contact-title">Contact Us</h5>
                <div class="contact-icons">
                    <a href="mailto:contact@gismosgalaxy.com" target="_blank">
                        <img src="img/mail.png" alt="Email" class="contact-icon">
                    </a>
                    <a href="https://www.instagram.com/gismosgalaxy" target="_blank">
                        <img src="img/ig.png" alt="Instagram" class="contact-icon">
                    </a>
                    <a href="https://www.facebook.com/gismosgalaxy" target="_blank">
                        <img src="img/fb.png" alt="Facebook" class="contact-icon">
                    </a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>

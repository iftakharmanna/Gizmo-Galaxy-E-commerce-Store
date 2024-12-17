<?php
session_start();
$isSignedIn = isset($_SESSION['user_id']) && $_SESSION['user_id'] !== '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.72.0">

    <title>Shop | Gizmo Galaxy</title>
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
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Shopping Page</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to bottom, #ffffff, #f1eded);
            background-position-x: center;
        }

        .navbar-logo {
            height: 26px;
            width: auto;
            display: block;
            margin: 0 auto;
        }

        .navbar-logo:hover {
            opacity: 0.8;
        }

        h1 {
            text-align: center;
            margin-top: 10px;
            letter-spacing: 2px;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .product {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            width: 250px;
            margin: 15px;
            padding: 20px;
            text-align: center;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .product img {
            width: 200px;
            height: 200px;
            object-fit: cover;
        }

        .product h3 {
            margin: 10px 0;
        }

        .product p {
            font-size: 14px;
            color: #666;
        }

        .product button {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .product button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
 <!-- Navbar -->
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

    <!-- Product Section -->
    <div class="container py-5">
        <h1 class="text-center mb-5">Our Products</h1>
        <div class="row" id="products-container">
            <!-- Products will be loaded here dynamically -->
        </div>
    </div>

    <!-- Footer -->
    <footer class="container py-5">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-6 text-center text-md-left">
                <small class="text-muted">&copy; Copyright Gizmo Galaxy 2024</small>
            </div>
            <div class="col-md-6 text-center text-md-right">
                <h5 class="contact-title">Contact Us</h5>
                <div class="contact-icons">
                    <a href="mailto:contact@gismosgalaxy.com" target="_blank">
                        <img src="img/mail.png" alt="Email" class="contact-icon">
                    </a>
                    <a href="https://www.instagram.com/gismosgalaxy" target="_blank" rel="noopener noreferrer">
                        <img src="img/ig.png" alt="Instagram" class="contact-icon">
                    </a>
                    <a href="https://www.facebook.com/gismosgalaxy" target="_blank" rel="noopener noreferrer">
                        <img src="img/fb.png" alt="Facebook" class="contact-icon">
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Load products dynamically -->
    <script>
    $(document).ready(function() {
        // Load products
        $.ajax({
            url: 'get_products.php',
            method: 'GET',
            success: function(products) {
                const container = $('#products-container');
                products.forEach(function(product) {
                    const productHtml = `
                        <div class="col-md-4 mb-4">
                            <div class="product">
                                <img src="${product.image_url}" class="card-img-top" alt="${product.name}">
                                <div class="card-body">
                                    <h5 class="card-title">${product.name}</h5>
                                    <p class="card-text">$${parseFloat(product.price).toFixed(2)}</p>
                                    <button class="btn btn-primary add-to-cart" data-product-id="${product.product_id}">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;
                    container.append(productHtml);
                });

                // Add to cart functionality
                $('.add-to-cart').click(function() {
                    const productId = $(this).data('product-id');
                    const button = $(this);
                    button.prop('disabled', true);
                    $.ajax({
                        url: 'add_to_cart.php',
                        method: 'POST',
                        data: { product_id: productId },
                        success: function(response) {
                            const data = JSON.parse(response);
                            if (data.success) {
                                button.text('Added to Cart!');
                                setTimeout(() => {
                                    button.text('Add to Cart');
                                    button.prop('disabled', false);
                                }, 2000);
                            }
                        },
                        error: function() {
                            button.prop('disabled', false);
                            alert('Error adding item to cart');
                        }
                    });
                });
            },
            error: function() {
                $('#products-container').html('<p class="text-center">Error loading products. Please try again later.</p>');
            }
        });
    });
    </script>
</body>
</html>

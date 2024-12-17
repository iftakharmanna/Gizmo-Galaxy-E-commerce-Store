<?php
session_start();
include 'db.php';
$user_id = $_SESSION['user_id'];
$isSignedIn = isset($_SESSION['user_id']) && $_SESSION['user_id'] !== '';
if (!$isSignedIn) {
    header("Location: sign in.php");
    exit();
}
$userName = $userEmail = $userDescription = '';

// Handle the logout request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'logout') {
    // Destroy the session to log out the user
    $_SESSION = []; // Clear the session data
    session_destroy(); // Destroy the session

    // Clear the session cookie to make sure it's deleted in the user's browser
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 3600, '/'); // Expire the session cookie
    }

    // Redirect after logging out
    header("Location: sign in.php"); // Redirect to sign-in page after logging out
    exit();
}


// If the user is signed in, fetch profile details
if ($isSignedIn) {
    $userId = $_SESSION['user_id'];

    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'tables');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
}
    // Handle profile updates
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['name'], $_POST['description'])) {
        $newName = $_POST['name'] ?? '';
        $newDescription = $_POST['description'] ?? '';

        // Update the database
        $updateSql = "UPDATE users SET full_name = ?, description = ? WHERE user_id = ?";
        $updateStmt = $conn->prepare($updateSql);
        $updateStmt->bind_param("ssi", $newName, $newDescription, $userId);

        if ($updateStmt->execute()) {
            $message = "Profile updated successfully!";
        } else {
            $message = "Error updating profile: " . $conn->error;
        }

        $updateStmt->close();
    }

    // Retrieve user profile details
    $sql = "SELECT full_name, email, description FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $stmt->bind_result($userName, $userEmail, $userDescription);
    $stmt->fetch();
    $stmt->close();
    
// Retrieve order history
$orderQuery = "SELECT o.order_id, o.order_date, o.total_amount, 
               GROUP_CONCAT(CONCAT(p.name, ' x', oi.quantity) SEPARATOR ', ') AS items
               FROM orders o
               JOIN order_items oi ON o.order_id = oi.order_id
               JOIN products p ON oi.product_id = p.product_id
               WHERE o.user_id = ?
               GROUP BY o.order_id
               ORDER BY o.order_date DESC";

$stmt = $conn->prepare($orderQuery);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='order'>";
        echo "<p><strong>Order ID:</strong> " . htmlspecialchars($row['order_id']) . "</p>";
        echo "<p><strong>Order Date:</strong> " . htmlspecialchars($row['order_date']) . "</p>";
        echo "<p><strong>Items:</strong> " . htmlspecialchars($row['items']) . "</p>";
        echo "<p><strong>Total Amount:</strong> $" . htmlspecialchars($row['total_amount']) . "</p>";
        echo "</div><hr>";
    }
} else {
    echo "";
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Gizmo Galaxy</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"
        integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="profile.css">

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

    <!-- Profile Section -->
    <div class="profile-container container my-5">
        <div class="row">
            <div class="col-md-6 profile-section">
                <h2>User Profile</h2>
                <div class="profile-picture mb-3">
                    <img id="profile-img" src="img/default-avatar.png" alt="Default Profile Picture" class="img-thumbnail" style="width:150px; height:150px;">
                </div>
                <?php if (isset($message)): ?>
                    <div class="alert alert-info"><?= htmlspecialchars($message) ?></div>
                <?php endif; ?>
                <form method="post" action="profile.php">
                    <div class="profile-info">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name:</label>
                            <input type="text" name="name" id="name" value="<?= htmlspecialchars($userName) ?>" placeholder="Enter your name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" value="<?= htmlspecialchars($userEmail) ?>" placeholder="Enter your email" class="form-control" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description:</label>
                            <textarea name="description" id="description" placeholder="Write something about yourself..." class="form-control" rows="4"><?= htmlspecialchars($userDescription) ?></textarea>
                        </div>
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Save Profile</button>
                            <button type="submit" name="action" value="logout" class="btn btn-danger">Sign Out</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-6 item-history-section">
                <h3>Order History</h3>
                <?php if (empty($orderHistory)): ?>
        <p></p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Date</th>
                    <th>Total Amount</th>
                    <th>Products</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orderHistory as $order): ?>
                    <tr>
                        <td><?= htmlspecialchars($order['order_id']) ?></td>
                        <td><?= htmlspecialchars(date('F j, Y', strtotime($order['order_date']))) ?></td>
                        <td><?= "$" . number_format($order['total_amount'], 2) ?></td>
                        <td><?= htmlspecialchars($order['products']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>



    <script>
        // Function to handle sign out without reloading page (optional)
        function signOut() {
            fetch('profile.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ action: 'logout' })
            })
            .then(response => {
                if (response.ok) {
                    window.location.href = "sign in.php"; // Redirect to the sign-in page after logout
                } else {
                    alert("Error signing out. Please try again.");
                }
            })
            .catch(error => alert("Error signing out: " + error.message));
        }
    </script>

</body>
</html>
<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> IT Supposrt Dashboard</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background-color: #f4f7f6; padding: 40px; }
        .card { background: white; padding: 20px; border-radius: 10px; box-shadow: o 4px 8px rgba(0,0,0,0,1); max-width: 600px; margin: auto;}
        .role-badge { background-color: #007bff; color: white; padding: 5px 10px; border-radius: 5px; font-size: 0.8em; }
    </style>
</head>
<body>
    <div class="card">
        <h1>Welcome, to the Red & Blue Dashboard</h1>
        <p>Hello, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong></p>
        <p>Your current access level is: <span class="role-badge"><?php echo strtoupper($_SESSION['role']) ?></span></p>
        <hr>
        <p>This is a secure area for IT Support staff only.</p>
        <a href=" ../logout.php">Logout</a>
    </div>
</body>
</html>
<?php
session_start();
require_once '../db_connect.php'; 

$mensaje = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $user = $_POST['username'];
    $pass = $_POST['password'];

    
    $sql = "SELECT * FROM usuarios WHERE username = '$user' AND password = '$pass'";
    
    
    $result = $pdo->query($sql);
    $row = $result->fetch();
   if ($row) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role'];

            header("Location: ../dashboard.php");
            exit();
        }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Vulnerable Login - Red Mode</title>
    <style>
        body { font-family: sans-serif; background-color: #ffe6e6; display: flex; justify-content: center; align-items: center; height: 100vh; flex-direction: column; }
        .login-box { background: white; padding: 40px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); border-top: 5px solid #e74c3c; width: 300px; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #e74c3c; color: white; border: none; cursor: pointer; font-weight: bold; }
        button:hover { background: #c0392b; }
        .back { margin-top: 20px; text-decoration: none; color: #333; }
    </style>
</head>
<body>

    <div class="login-box">
        <h2 style="text-align:center; color: #c0392b;">Red Login</h2>
        <p style="text-align:center; font-size: 12px;">Introduce your credentials</p>
        
        <?php echo $mensaje; ?>

        <form method="POST">
            <input type="text" name="username" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">login</button>
        </form>
    </div>

    <a href="../index.php" class="back">⬅ Back to Menu</a>

</body>
</html>
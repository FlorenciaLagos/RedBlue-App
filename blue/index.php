<?php
session_start();
require_once '../db_connect.php';

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    
  
    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE username = ?");
    $stmt->execute([$user]);
    $userData = $stmt->fetch();
    

    if ($userData && password_verify($pass, $userData['password'])) {
        
        $_SESSION['user_id'] = $userData['id'];
        $_SESSION['username'] = $userData['username'];
        $_SESSION['role'] = $userData['role'];
        header("Location: ../dashboard.php");
        exit();
    } else {
        $mensaje = "<div style='background:#3498db; color:white; padding:10px;'> Denied access (Attack neutralized or incorrect credentials).</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Safe login - Blue Mode</title>
    <style>
        body { font-family: sans-serif; background-color: #e6f7ff; display: flex; justify-content: center; align-items: center; height: 100vh; flex-direction: column; margin: 0;}
        .login-box { background: white; padding: 40px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); border-top: 5px solid #3498db; width: 300px; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #3498db; color: white; border: none; cursor: pointer; font-weight: bold; }
        button:hover { background: #2980b9; }
        .back { margin-top: 20px; text-decoration: none; color: #333; }
    </style>
</head>
<body>

    <div class="login-box">
        <h2 style="text-align:center; color: #2980b9;"> Blue Login</h2>
        <p style="text-align:center; font-size: 12px;">Protected Environment with PDO and Hashing</p>
        
        <?php echo $mensaje; ?>

        <form method="POST">
            <input type="text" name="username" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Safe login</button>
        </form>
    </div>

    <a href="../index.php" class="back">⬅ Back to Menu</a>

</body>
</html>
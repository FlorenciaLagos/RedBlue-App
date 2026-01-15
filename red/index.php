<?php
// red/index.php
session_start();
require_once '../core/db_connect.php'; // Conectamos a la base de datos

$mensaje = "";

// Si el usuario envió el formulario...
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // 🚨 EL FALLO DE SEGURIDAD ESTÁ AQUÍ ABAJO 🚨
    // Estamos pegando el texto del usuario directamente en la consulta.
    // Esto permite que el usuario "rompa" la frase SQL.
    $sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
    
    // Ejecutamos la consulta tal cual (¡Peligro!)
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $mensaje = "<div style='background:green; color:white; padding:10px;'>🔓 ¡ACCESO CONCEDIDO! Bienvenido, " . $row['username'] . "</div>";
    } else {
        $mensaje = "<div style='background:red; color:white; padding:10px;'>❌ Usuario o contraseña incorrectos.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login Vulnerable (Red Mode)</title>
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
        <h2 style="text-align:center; color: #c0392b;">🔴 Red Login</h2>
        <p style="text-align:center; font-size: 12px;">Introduce tus credenciales</p>
        
        <?php echo $mensaje; ?>

        <form method="POST">
            <input type="text" name="username" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>

    <a href="../index.php" class="back">⬅ Volver al menú</a>

</body>
</html>
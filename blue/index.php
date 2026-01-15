<?php
// blue/index.php
session_start();
require_once '../core/db_connect.php';

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // 🛡️ DEFENSA BLUE TEAM: Sentencias Preparadas (Prepared Statements)
    // En lugar de pegar las variables directamente, ponemos signos de interrogación (?)
    // Esto le dice a la base de datos: "Aquí irán datos, pero NO los ejecutes como código".
    $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
    
    // Preparamos la consulta
    $stmt = $conn->prepare($sql);
    
    // Vinculamos los parámetros ("ss" significa que son 2 Strings)
    $stmt->bind_param("ss", $user, $pass);
    
    // Ejecutamos
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $mensaje = "<div style='background:green; color:white; padding:10px;'>🛡️ ACCESO SEGURO CONCEDIDO. Bienvenido, " . htmlspecialchars($row['username']) . "</div>";
    } else {
        $mensaje = "<div style='background:#3498db; color:white; padding:10px;'>🔒 Acceso denegado (Ataque neutralizado).</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login Seguro (Blue Mode)</title>
    <style>
        body { font-family: sans-serif; background-color: #e6f7ff; display: flex; justify-content: center; align-items: center; height: 100vh; flex-direction: column; }
        .login-box { background: white; padding: 40px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); border-top: 5px solid #3498db; width: 300px; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; box-sizing: border-box; }
        button { width: 100%; padding: 10px; background: #3498db; color: white; border: none; cursor: pointer; font-weight: bold; }
        button:hover { background: #2980b9; }
        .back { margin-top: 20px; text-decoration: none; color: #333; }
    </style>
</head>
<body>

    <div class="login-box">
        <h2 style="text-align:center; color: #2980b9;">🔵 Blue Login</h2>
        <p style="text-align:center; font-size: 12px;">Entorno protegido contra SQL Injection</p>
        
        <?php echo $mensaje; ?>

        <form method="POST">
            <input type="text" name="username" placeholder="Usuario" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <button type="submit">Iniciar Sesión Segura</button>
        </form>
    </div>

    <a href="../index.php" class="back">⬅ Volver al menú</a>

</body>
</html>

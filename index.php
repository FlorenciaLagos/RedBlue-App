<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>RedBlue App - Portafolio DevSecOps</title>
    <style>
        body { font-family: sans-serif; text-align: center; padding: 50px; background-color: #f4f4f4; }
        .container { display: flex; justify-content: center; gap: 50px; margin-top: 30px; }
        .card { border: 1px solid #ccc; padding: 20px; width: 300px; background: white; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .btn { display: block; padding: 10px; margin-top: 15px; text-decoration: none; color: white; font-weight: bold; border-radius: 5px; }
        
        /* Estilos Rojo vs Azul */
        .red { border-top: 5px solid #e74c3c; }
        .btn-red { background-color: #e74c3c; }
        .btn-red:hover { background-color: #c0392b; }

        .blue { border-top: 5px solid #3498db; }
        .btn-blue { background-color: #3498db; }
        .btn-blue:hover { background-color: #2980b9; }
    </style>
</head>
<body>

    <h1>🛡️ RedBlue Security Lab</h1>
    <p>Elige un entorno para comenzar la simulación.</p>

    <div class="container">
        <div class="card red">
            <h2>🔴 Red Mode</h2>
            <p>Entorno <strong>Vulnerable</strong>.</p>
            <p><small>Contiene fallos OWASP Top 10 intencionales (SQLi, XSS, etc) para practicar explotación.</small></p>
            <a href="red/index.php" class="btn btn-red">Entrar al caos</a>
        </div>

        <div class="card blue">
            <h2>🔵 Blue Mode</h2>
            <p>Entorno <strong>Securizado</strong>.</p>
            <p><small>Código parcheado con buenas prácticas de desarrollo seguro y validaciones.</small></p>
            <a href="blue/index.php" class="btn btn-blue">Entrar a lo seguro</a>
        </div>
    </div>

</body>
</html>

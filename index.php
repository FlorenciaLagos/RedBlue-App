<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cybersecurity Lab - Red vs Blue</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Verdana, sans-serif;
            background-color: #1a1a1a;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        h1 { margin-bottom: 40px; text-transform: uppercase; letter-spacing: 2px; }
        .container { display: flex; gap: 30px; }
        .card {
            padding: 30px;
            border-radius: 15px;
            text-align: center;
            width: 250px;
            text-decoration: none;
            color: white;
            transition: transform 0.3s, box-shadow 0.3s;
            border: 2px solid transparent;
        }
        .red-team { background-color: #721c24; border-color: #f5c6cb; }
        .blue-team { background-color: #004085; border-color: #b8daff; }
        .card:hover { transform: scale(1.05); box-shadow: 0 0 20px rgba(255,255,255,0.2); }
        .card h2 { margin-top: 0; }
        .card p { font-size: 0.9em; opacity: 0.8; }
    </style>
</head>
<body>

    <h1>Cybersecurity Learning Lab</h1>

    <div class="container">
        <a href="red/index.php" class="card red-team">
            <h2>RED TEAM</h2>
            <p>Entorno Vulnerable<br>(SQL Injection Demo)</p>
        </a>

        <a href="blue/index.php" class="card blue-team">
            <h2>BLUE TEAM</h2>
            <p>Entorno Seguro<br>(PDO & Prepared Statements)</p>
        </a>
    </div>

</body>
</html>

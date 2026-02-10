# 🛡️ RedBlue App - Entorno de Laboratorio DevSecOps

> Una aplicación web Full-Stack diseñada para demostrar, explotar y mitigar vulnerabilidades críticas de seguridad web (OWASP Top 10).

![Estado](https://img.shields.io/badge/Estado-En_Desarrollo-yellow)
![PHP](https://img.shields.io/badge/Backend-PHP-blue)
![Seguridad](https://img.shields.io/badge/Enfoque-Ciberseguridad-red)

## 📖 Sobre el Proyecto

**RedBlue App** es un entorno de pruebas controlado que simula escenarios reales de ciberseguridad. El proyecto se divide en dos modos operativos para ilustrar la diferencia entre un código funcional pero inseguro, y un código robusto:

* 🔴 **Red Mode (Vulnerable):** Implementación intencionalmente insegura que permite realizar ataques como SQL Injection. Utilizado para prácticas de Pentesting y explotación.
* 🔵 **Blue Mode (Securizado):** La misma funcionalidad reescrita siguiendo las mejores prácticas de **Secure Coding**, neutralizando los vectores de ataque del modo rojo.

## 🛠️ Tecnologías

* **Lenguaje:** PHP 8.x (Nativo, sin frameworks para control total).
* **Base de Datos:** MySQL / MariaDB.
* **Servidor:** Apache (XAMPP).
* **Frontend:** HTML5 / CSS3.

## ⚔️ Análisis de Vulnerabilidades (Write-up)

### 1. SQL Injection (SQLi) - Authentication Bypass

En el módulo de Login, se demuestra cómo la falta de saneamiento de inputs permite el acceso no autorizado.

#### 🔴 Código Vulnerable (Red Team)
El input del usuario se concatena directamente a la consulta, permitiendo la inyección de comandos SQL.
```php
// Vulnerable a: ' OR 1=1 -- -
$sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
$result = $conn->query($sql);

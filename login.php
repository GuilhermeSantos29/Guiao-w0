<?php
session_start();
if(isset($_SESSION['user_id'])) {
    header("Location: index1.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" type="text/css" href="./Guiao-w0/styles/main.css">
  <style>
    body {
        width: 100%;
        height: 100%;
        margin: 0 auto;
    }

    ul {
        padding: 0px;
    }
    
    main, .content {
        margin: 0 auto;
        width: 980px;
        position: relative;
    }
    
    main h2 {
        text-align: center;
    }
   

    main form {
        max-width: 400px;
        margin: 0 auto;
    }

    .logo {
        float: left;
        width: 70%;
    }

    .header-2 {
        background-color: #ffffff;
        width: 980px;
        margin: 0 auto;
        padding: 16px;
    }

    .menu-urls {
        height: 80px;
        border-bottom: 3px solid #efefef;
    }

    .menu ul li {
        display: inline-block;
        color: #8b8b8b;
        margin-left: 15px;
        height: 50px;
    }

    .menu ul li:hover {
        border-bottom: 3px solid #00bac6;
    }

    .menu ul li a:hover {
        color: #00bac6;
    }

    .menu ul li a {
        color: #8b8b8b;
        text-decoration: none;
        font-size: 18px;
        text-transform: uppercase;
    }

    .menu {
        width: 70%;
        float: left;
    }
    
    .menu-principal {
        width: 100%;
        background-color: #252323;
        height: 120px;
    }

    .col-100 {
        width: 100%;
        float: left;
        position: relative;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        margin-bottom: 5px;
    }

    .form-group input {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
    }
    
    .footer {
        color: #ffffff;
    }

    button {
        background-color: #00bac6;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
    }

    button:hover {
        background-color: #009aa6;
    }
  </style>
</head>
<body>
<header class="menu-principal">
    <main>
        <div class="header-1">
            <div class="logo">
                <img src="images/3.png"/>
            </div>
        </div>
    </main>
</header>
<main class="col-100 menu-urls">
    <div class="header-2">
        <div class="menu">
            <ul>
                <li><a href="index1.php">Home</a></li>
                <li><a href="tickets.php">Bilhetes</a></li>
                <li><a href="register.php">Registar</a></li>
            </ul>
        </div>      
    </div>
    <form id="loginForm" method="post" action="verificar_login.php">
      <div class="form-group">
        <label for="email">Email:</label>   
        <input type="email" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>
      </div>
      <button type="submit">Login</button>
    </form>
    <p>Não tem uma conta? <a href="register.php">Registre-se aqui</a></p>
    <footer>
    <div class="col-100">
        <div class="content">
            <p><b>Qualquer problema, não hesite em nos contactar:</b></p>
            <p><strong>Número telefónico:</strong> +351 911000172</p>
            <p><strong>Email:</strong> GFTickets@gmail.com</p>
        </div>
    </div>
    </footer>
</main>
<script type="text/javascript" src="./scripts/login.js"></script>
</body>
</html>

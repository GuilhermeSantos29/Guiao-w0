<?php
session_start();
include('gftickets_connection.php');
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./Guiao-w0/styles/main.css">
    <title>GFTickets</title>
    <style>
    body {
            width: 100%;
            height: 100%;
            margin: 0 auto;
        }

        ul {
            padding: 0px;
        }

        .menu-principal {
            width: 100%;
            background-color: #252323;
            height: 120px;
        }

        main, .content {
            margin: 0 auto;
            width: 980px;
            position: relative;
        }

        .logo {
            float: left;
            width: 100%;
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

        .col-100 {
            width: 100%;
            float: left;
            position: relative;
        }
        
        .imagem-background{
            background-image: url();
            height: 300px;
            border: 1px solid #c5c5c5;
            padding-top: 15px;
            padding-bottom: 15px;
            margin-left: 10px;
        	
        }

        .texto-destaque {
            text-align: center;
        }

        .texto-destaque strong {
            color: #646464;
        }

        .texto-destaque h1 {
            text-transform: uppercase;
            font-size: 30px;
            color: #818181;
        }

        .texto-destaque p {
            font-size: 15px;
            color: #9a9a9a;
        }

        .col-3 {
            text-align: center;
            padding-left: 15px;
            padding-right: 15px;
            width: 29%;
            float: left;
            position: relative;
        }

        .bloco-imagem img {
            margin: 0 auto;
            width: 100%;
            height: auto;
        }

        .bloco-imagem {
            height: 300px;
            border: 1px solid #c5c5c5;
            padding-top: 15px;
            padding-bottom: 15px;
            margin-left: 10px;
        }

        .bloco-imagem b, p {
            text-align: left;
        }

        .bloco-texto {
            margin-top: 3em;
        }

        .bloco-imagens-texto {
            background-color: #eeeeee;
        }

        .bloco-imagens-texto:before {
            width: 100%;
            display: inline-block;
            content: '';
            height: 52px;
            background: #ffffff;
            background-position: center;
        }

        .bloco-imagens-texto:after {
            width: 100%;
            display: inline-block;
            content: '';
            height: 70px;
            background: #eeeeee;
        }
        
        .footer {
            color: #ffffff;
        }

        .footer p {
            width: 90%;
            text-align: left;
        }
    </style>
</head>
<body>
    <header class="menu-principal">
        <main>
            <div class="header-1">
                <div class="logo">
                    <img src="images/3.png">
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
                    <?php if(isset($_SESSION['user_id'])): ?>
                        <?php if($_SESSION['is_admin']): ?>
                            <li><a href="admin.php">Admin</a></li>
                        <?php endif; ?>
                        <li><a href="logout.php">Logout</a></li>
                    <?php else: ?>
                        <li><a href="login.php">Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </main>
    <div class="col-100">
        <div class="imagem-background">
            <div class="content texto-destaque">
                <h1>Seja Bem-Vindo à GFTickets, adquira aqui o bilhete para o seu concerto de sonho!!!!</h1>
            </div>
        </div>
    </div>
    <div class="col-100 bloco-imagens-texto">
        <div class="content" style="margin-left: 14%; float: left;">
            <?php
            $sql = "SELECT event_name, event_date, venue, image FROM tickets";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="col-3 bloco-texto bloco-imagem">';
                    echo '<img src="' . $row["image"] . '">';
                    echo '<b>' . $row["event_name"] . '</b>';
                    echo '<p>Data: ' . $row["event_date"] . ', local: ' . $row["venue"] . '</p>';
                    echo '</div>';
                }
            } else {
                echo "0 results";
            }
            ?>
        </div>
    </div>
    <footer>
        <div class="col-100">
            <div class="content">
                <p><b>Qualquer problema, não hesite em nos contactar:</b></p>
                <p><strong>Número telefónico:</strong> +351 911000172</p>
                <p><strong>Email:</strong> GFTickets@gmail.com</p>
            </div>
        </div>
    </footer>
    <script type="text/javascript" src="./js/main.js"></script>
</body>
</html>

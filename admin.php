<?php
session_start();
if(!isset($_SESSION['user_id']) || !$_SESSION['is_admin']) {
    header("Location: index1.php");
    exit();
}

include('gftickets_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $venue = $_POST['venue'];
    $price = $_POST['price'];

    // Upload image
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $sql = "INSERT INTO tickets (event_name, event_date, venue, price, image) VALUES ('$event_name', '$event_date', '$venue', '$price', '$target_file')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New ticket added successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin - Adicionar Bilhete</title>
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

.busca {
    text-align: center;
    width: 30%;
    float: right;
}

.busca input {
    height: 36px;
    padding: 8px;
    width: 190px;
    margin-top: 10px;
    border: 1px solid #d6d6d6;
}

.col-100 {
    width: 100%;
    float: left;
    position: relative;
}

.imagem-background {
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

/* Estilos adicionais para a página de admin */
.admin-form {
}

.form-group {
    margin-left: 500px;
    margin-bottom: 15px;
    max-width: 500px;
    }

.form-group label {
    display: block;
    margin-bottom: 5px;
}

.form-group input,
.form-group select {
    width: 80%;
    padding: 8px;
    box-sizing: border-box;
}

button {
    background-color: #00bac6;
    color: white;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    margin-left: 500px;
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
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <form style="margin-top:100px" method="post" action="admin.php" enctype="multipart/form-data">
      <div class="form-group">
        <label for="event_name">Nome do Evento:</label>
        <input type="text" id="event_name" name="event_name" required>
      </div>
      <div class="form-group">
        <label for="event_date">Data do Evento:</label>
        <input type="date" id="event_date" name="event_date" required>
      </div>
      <div class="form-group">
        <label for="venue">Local:</label>
        <input type="text" id="venue" name="venue" required>
      </div>
      <div class="form-group">
        <label for="price">Preço:</label>
        <input type="number" id="price" name="price" required>
      </div>
      <div class="form-group">
        <label for="image">Imagem:</label>
        <input type="file" id="image" name="image" accept="image/*" required>
      </div>
      <button type="submit">Adicionar Bilhete</button>
    </form>
</main>
<script src="./Guiao-w0/scripts/main.js"></script>
</body>
</html>

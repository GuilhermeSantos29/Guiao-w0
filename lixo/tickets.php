<!DOCTYPE html>
<html lang="pt">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comprar Bilhete</title>
  <link rel="stylesheet" href="css/styles.css">
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

    .footer {
        color: #ffffff;
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

    main form {
        max-width: 400px;
        margin: 0 auto;
    }
  </style>
  <script>
    function calc_total() {
      let quant_ele = document.getElementById("quantity");
      let quant_val = quant_ele.value;
      let quant = parseInt(quant_val);

      let preco_ele = document.getElementById("preco");
      let preco_val = preco_ele.innerHTML;
      let preco = parseFloat(preco_val);

      let total = preco * quant;
      let total_ele = document.getElementById("total");
      total_ele.value = total;
    }

    function update_price() {
      let event_ele = document.getElementById("event");
      let preco_ele = document.getElementById("preco");
      let available_tickets_ele = document.getElementById("available_tickets");

      let event_details = {
        "Travis Scott": { price: 100, tickets: 50 },
        "MEO Marés Vivas": { price: 80, tickets: 100 },
        "Matue": { price: 70, tickets: 150 },
        "Taylor Swift": { price: 120, tickets: 30 },
        "Van Zee": { price: 60, tickets: 200 },
        "The Weeknd": { price: 150, tickets: 20 }
      };

      let selected_event = event_ele.value;
      let selected_details = event_details[selected_event];
      preco_ele.innerHTML = selected_details.price;
      available_tickets_ele.innerHTML = selected_details.tickets;

      calc_total();
    }

    window.onload = function() {
      update_price();
    };
  </script>
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
          <li>
            <a href="index1.html">Home</a>
          </li>
          <li>
            <a href="tickets.php">Bilhetes</a>
          </li>
          <li>
            <a href="login.html">Login</a>
          </li>
        </ul>
      </div>
      <div class="busca">
        <input placeholder="Search Something" type="text">
      </div>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $evento = htmlspecialchars($_POST['event']);
      $quantidade = intval($_POST['quantity']);
      $total = floatval($_POST['total']);

      echo "<div class='content'>";
      echo "<h2>Resumo da Compra</h2>";
      echo "<p>Evento: $evento</p>";
      echo "<p>Quantidade: $quantidade</p>";
      echo "<p>Total: $total €</p>";
      echo "</div>";
    }
    ?>

    <form id="purchaseForm" method="post" action="tickets.php">
      <div class="form-group">
        <label for="event">Evento:</label>
        <select id="event" name="event" onchange="update_price()">
          <option>Travis Scott</option>
          <option>MEO Marés Vivas</option>
          <option>Matue</option>
          <option>Taylor Swift</option>
          <option>Van Zee</option>
          <option>The Weeknd</option>
        </select>
      </div>
      <div class="form-group">
        <label for="preco">Preço:</label>
        <span id="preco">100</span> 
      </div>
      <div class="form-group">
        <label for="available_tickets">Bilhetes Disponíveis:</label>
        <span id="available_tickets">50</span>
      </div>
      <div class="form-group">
        <label for="quantity">Quantidade:</label>
        <input type="number" id="quantity" name="quantity" min="1" required oninput="calc_total()">
      </div>
      <div class="form-group">
        <label for="total">Total:</label>
        <input type="text" id="total" name="total" readonly>
      </div>
      <button type="submit">Comprar</button>
    </form>
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
  <script src="js/main.js"></script>
</body>
</html>




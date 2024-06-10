<?php
session_start();
include('gftickets_connection.php');
?>

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
    function updatePrice() {
      let eventSelect = document.getElementById("event");
      let selectedOption = eventSelect.options[eventSelect.selectedIndex];
      let price = selectedOption.getAttribute("data-price");
      document.getElementById("preco").innerHTML = price;
      calc_total();
    }

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
    
    <form id="purchaseForm" method="post" action="verificar_compra.php">
      <div class="form-group">
        <label for="event">Evento:</label>
        <select id="event" name="event" onchange="updatePrice()">
          <?php
          $sql = "SELECT id, event_name, price FROM tickets";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                  echo '<option value="' . $row["id"] . '" data-price="' . $row["price"] . '">' . $row["event_name"] . '</option>';
              }
          } else {
              echo '<option>No events available</option>';
          }
          ?>
        </select>
      </div>
      <div class="form-group">
        <label for="preco">Preço:</label>
        <span id="preco"></span> 
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
</body>
</html>

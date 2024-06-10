<?php
session_start();
include('gftickets_connection.php');

// Verifique se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    echo "Erro: Usuário não logado.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $ticket_id = $_POST['event'];
    $quantity = $_POST['quantity'];

    // Verifique se o ticket_id é válido e obtenha o preço
    $sql = "SELECT price FROM tickets WHERE id='$ticket_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $price = $row['price'];
        $total_price = $price * $quantity;

        // Verifique se o user_id é válido
        $sql = "SELECT id FROM users WHERE id='$user_id'";
        $user_result = $conn->query($sql);

        if ($user_result->num_rows > 0) {
            // Insira na tabela de compras
            $sql = "INSERT INTO purchases (user_id, ticket_id, quantity, total_price) VALUES ('$user_id', '$ticket_id', '$quantity', '$total_price')";
            
            if ($conn->query($sql) === TRUE) {
                echo "Compra realizada com sucesso!";
                header("Location: tickets.php");
            } else {
                echo "Erro: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Erro: Usuário inválido.";
        }
    } else {
        echo "Bilhete Inválido.";
    }
}
?>

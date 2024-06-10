<?php
session_start();
include('gftickets_connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id'];
    $ticket_id = $_POST['event'];
    $quantity = $_POST['quantity'];

    $sql = "SELECT price FROM tickets WHERE id='$ticket_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $price = $row['price'];
        $total_price = $price * $quantity;

        $sql = "INSERT INTO purchases (user_id, ticket_id, quantity, total_price) VALUES ('$user_id', '$ticket_id', '$quantity', '$total_price')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Purchase successful!";
            header("Location: tickets.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Invalid ticket.";
    }
}
?>

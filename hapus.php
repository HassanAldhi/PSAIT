<?php
include('koneksi.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $id = $_GET['id'];
    
    $query = $conn->query("DELETE FROM mobil WHERE id = $id");

    header("Location: index.php");
    exit();
}
?>

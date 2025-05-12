<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "clients_db");
if (!$conn) {
    die("Ошибка подключения: " . mysqli_connect_error());
}
?>
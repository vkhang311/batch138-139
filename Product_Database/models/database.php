<?php
    $dsn = 'mysql:host=localhost;dbname=myproducts';
    $username = 'root';
    $password = '';

    $db = new PDO($dsn, $username, $password);

    $conn = mysqli_connect('localhost', 'root', '', 'myproducts');
?>
<?php

$server="localhost";
$user="root";
$password="";
$db="todo_app";

$koneksi = mysqli_connect($server , $user, $password, $db) or die(mysqli_error($koneksi));

?>
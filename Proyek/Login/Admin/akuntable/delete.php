<?php
$host = "localhost";
$port = "5432";
$db = "salondte";
$user = "postgres";
$password = "";
$pg_options = "--client_encoding=UTF8";

$connection_string = "host={$host} port={$port} dbname={$db} user={$user} password={$password} options='{$pg_options}'";
$koneksi = pg_connect($connection_string);

$id = $_GET['id'];
 
$result = pg_query($koneksi, "DELETE FROM akun WHERE id = '$id'");
 
header("Location:http://localhost/proyek/Login/Admin/akuntable/akuntable.php");
?>
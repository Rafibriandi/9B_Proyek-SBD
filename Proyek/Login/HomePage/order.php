<?php
$host = "localhost";
$port = "5432";
$db = "salondte";
$user = "postgres";
$password = "";
$pg_options = "--client_encoding=UTF8";

$connection_string = "host={$host} port={$port} dbname={$db} user={$user} password={$password} options='{$pg_options}'";
$koneksi = pg_connect($connection_string);
$post = $_POST;

if(!$koneksi){
    echo "Gagal terhubung ke dalam database:(\n";
} else { 
if(isset($_POST['nme']) || isset($_POST['tgl']) ||isset($_POST['svc'])){ 
session_start();
$name = $_SESSION["useruid"];
$tggl = $_POST['tgl'];
$serv = $_POST['svc'];


$postgre = "INSERT INTO seatorder (nama, tanggal, services) 
VALUES ('".$name."','".$tggl."','".$serv."')" ;

$data = pg_query($koneksi, $postgre);  
$check = pg_num_rows($data);
       } 
   }
?>
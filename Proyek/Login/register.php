<?php
$host = "localhost";
$port = "5432";
$db = "salondte";
$user = "postgres";
$password = "";
$pg_options = "--client_encoding=UTF8";

$connection_string = "host={$host} port={$port} dbname={$db} user={$user} password={$password} options='{$pg_options}'";
$koneksi = pg_connect($connection_string);

if(!$koneksi){
    echo "Gagal terhubung ke dalam database:(\n";
} else { 
if(isset($_POST['submit'])&&!empty($_POST['submit'])){
    session_start();
    $name = $_POST['idregis'];
    $password = $_POST['pssword'];
    $query = "INSERT INTO akun (nama, kata_sandi) values 
            ('$name', '$password')";
    $data = pg_query($koneksi, $query); 
    $result = @pg_query($koneksi, $query);

    $check = pg_num_rows($data);
    if($check > 0){ 
        header("Location: hlmn-login.php?error=Incorect User name or password");
    }else{
        header("Location: hlmn-login.php?error=Register Berhasil");
        exit();
        }
    }
    
}
    pg_close($koneksi);
?>
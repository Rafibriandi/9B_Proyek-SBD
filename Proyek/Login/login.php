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
    $password = $_POST['loginPassword'];
    $postgre ="select * from akun where nama = '".($_POST['loginUser'])."' and kata_Sandi ='".$password."'";
    $data = pg_query($koneksi, $postgre); 
    $check = pg_num_rows($data);
    $cekAdmin = 'admin';

    if($check > 0){ 
        $_SESSION['useruid'] = $_POST['loginUser'];
        if ($_SESSION["useruid"] == $cekAdmin){
        header("location: Admin/index.html");
        }

        else{
        header("location: HomePage/index.php");
        }
        }
    else{ header("Location: hlmn-login.php?error=Incorect User name or password");
            }
        }
    }
?>
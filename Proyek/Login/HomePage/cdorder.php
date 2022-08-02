<?php
session_start();
?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

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
 $loginUser = $_SESSION["useruid"];
 $sql = "SELECT * FROM seatorder WHERE nama LIKE '$loginUser' ORDER BY id ASC";
 $query = pg_query($koneksi, $sql) or die("error");
}
?>

<div class="u-custom-menu u-nav-container">
<ul class="u-nav u-spacing-20 u-unstyled u-nav-1"><li class="u-nav-item"><a class="u-border-active-palette-1-base u-border-hover-palette-1-base u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-palette-2-base" href="index.php" style="padding: 10px;">Home</a>
</li><li class="u-nav-item"><a class="u-border-active-palette-1-base u-border-hover-palette-1-base u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-palette-2-base" href="lihatorder.php" style="padding: 10px;">See Order Queue</a>
</li><li class="u-nav-item"><a class="u-border-active-palette-1-base u-border-hover-palette-1-base u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-palette-2-base" href="Order-Seat.html" style="padding: 10px;">Order Seat</a>
</li></ul>

<table border= "1px" cellpadding="4" cellspacing="0" width = "30%" style="margin-right:auto; margin-left:auto; text-align:center;" >
 <tr>
 <th>ID</th>
 <th>Nama</th>
 <th>Tanggal Datang</th>
 <th>Jenis Service</th>
 </tr>

<tr>
<?php 
while($row = pg_fetch_row($query)){ 
  
    echo "<tr>";
        echo "<td>". $row[0] . "</td>";
        echo "<td>". $row[1] . "</td>";
        echo "<td>". $row[2] . "</td>";
        echo "<td>". $row[3] . "</td>";
    echo "</tr>";
}  
?>
</tr>
</table>

<form class = "box" method="POST">
<input type ="text" name="id" placeholder="Nomor ID">       
<input type="submit" value="enter">
</form>

<?php
if(isset($_POST['id'])){
$id = $_POST['id'];  
$querry = pg_query($koneksi, "DELETE FROM seatorder WHERE id ='$id' and nama = '$loginUser'");
    if(!$querry){
        echo 'Nomor ID yang dimasukkan SALAH';
    }
}
?>



<?php
$host = "localhost";
$port = "5432";
$db = "salondte";
$user = "postgres";
$password = "";
$pg_options = "--client_encoding=UTF8";

$connection_string = "host={$host} port={$port} dbname={$db} user={$user} password={$password} options='{$pg_options}'";
$koneksi = pg_connect($connection_string);
 
$postgre = "SELECT * FROM akun ORDER BY id ASC";
$result = pg_query($koneksi, $postgre);
?>
 
<html>
<head>    
    <title>Selamat Datang di Tabel Akun</title>
</head>
 
<body>
</li><li class="u-nav-item"><a class="u-border-active-palette-1-base u-border-hover-palette-1-base u-button-style u-nav-link u-text-active-palette-1-base u-text-grey-90 u-text-hover-palette-2-base" href="http://localhost/proyek/Login/Admin/" style="padding: 10px;">Menu Utama</a>
<a href="add.php">Tambah Baris Baru</a><br/><br/>
 
    <table width='80%' border=1>
 
    <tr>
        <th>id</th> <th>nama</th> <th>password</th> <th>hapus</th>
    </tr>
    <?php  
    while($user_data = pg_fetch_array($result)) {         
        echo "<tr>";
        echo "<td>".$user_data['id']."</td>";
        echo "<td>".$user_data['nama']."</td>";
        echo "<td>".$user_data['kata_sandi']."</td>";  
        echo "<td><a href='delete.php?id=$user_data[id]'>Delete</a></td></tr>";        
    }
    ?>
    </table>
</body>
</html>
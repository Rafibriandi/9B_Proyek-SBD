<html>
<head>
	<title>Add Users</title>
</head>
 
<body>
	<a href="http://localhost/proyek/Login/Admin/ordertable/ordertable.php">Kembali</a>
	<br/><br/>
 
	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>id</td>
				<td><input type="text" name="id"></td>
			</tr>
			<tr> 
				<td>nama</td>
				<td><input type="text" name="nama"></td>
			</tr>
			<tr> 
				<td>tanggal</td>
				<td><input type="text" name="tanggal"></td>
			</tr>
			<tr>
				<td>Servis</td>
				<td><input type="text" name="servis"></td>
			</tr>
			<tr>  
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	
	<?php
 
	if(isset($_POST['Submit'])) {
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$tanggal = $_POST['tanggal'];
		$servis = $_POST['servis'];
		
		$host = "localhost";
		$port = "5432";
		$db = "salondte";
		$user = "postgres";
		$password = "";
		$pg_options = "--client_encoding=UTF8";
		
		$connection_string = "host={$host} port={$port} dbname={$db} user={$user} password={$password} options='{$pg_options}'";
		$koneksi = pg_connect($connection_string);
				
		$sql = "INSERT INTO seatorder (id,nama,tanggal,services) VALUES('$id','$nama','$tanggal', '$servis')";
		$result = pg_query($koneksi, $sql);
		
		// Show message when user added
		echo "Berhasil di Tambahkan!. <a href='http://localhost/proyek/Login/Admin/ordertable/ordertable.php'>Kembali melihat</a>";
	}
	?>
</body>
</html>
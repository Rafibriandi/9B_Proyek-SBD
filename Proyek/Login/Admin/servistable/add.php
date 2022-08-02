<html>
<head>
	<title>Add Users</title>
</head>
 
<body>
	<a href="http://localhost/proyek/Login/Admin/servistable/servicetable.php">Kembali</a>
	<br/><br/>
 
	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>service_id</td>
				<td><input type="text" name="s_id"></td>
			</tr>
			<tr> 
				<td>service_nama</td>
				<td><input type="text" name="s_nama"></td>
			</tr>
			<tr> 
				<td>service_type</td>
				<td><input type="text" name="s_type"></td>
			</tr>
			<tr>
				<td>price</td>
				<td><input type="text" name="price"></td>
			</tr>
			<tr>  
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	
	<?php
 
	// Check If form submitted, insert form data into users table.
	if(isset($_POST['Submit'])) {
		$id = $_POST['s_id'];
		$nama = $_POST['s_nama'];
		$type = $_POST['s_type'];
		$price = $_POST['price'];
		
		$host = "localhost";
		$port = "5432";
		$db = "salondte";
		$user = "postgres";
		$password = "";
		$pg_options = "--client_encoding=UTF8";
		
		$connection_string = "host={$host} port={$port} dbname={$db} user={$user} password={$password} options='{$pg_options}'";
		$koneksi = pg_connect($connection_string);
				
		$sql = "INSERT INTO servis (service_id, service_name, service_type, price) VALUES('$id','$nama','$type', '$price')";
		$result = pg_query($koneksi, $sql);
		
		// Show message when user added
		echo "Berhasil di Tambahkan!. <a href='http://localhost/proyek/Login/Admin/servistable/servicetable.php'>Kembali melihat</a>";
	}
	?>
</body>
</html>
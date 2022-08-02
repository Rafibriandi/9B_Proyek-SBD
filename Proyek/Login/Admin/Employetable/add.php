<html>
<head>
	<title>Add Users</title>
</head>
 
<body>
	<a href="http://localhost/proyek/Login/Admin/employetable/employetable.php">Kembali</a>
	<br/><br/>
 
	<form action="add.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>id</td>
				<td><input type="text" name="e_id"></td>
			</tr>
			<tr> 
				<td>nama</td>
				<td><input type="text" name="e_nama"></td>
			</tr>
			<tr> 
				<td>alamat</td>
				<td><input type="text" name="e_alamat"></td>
			</tr>
			<tr>
				<td>phone_number</td>
				<td><input type="text" name="e_hp"></td>
			</tr>
			<tr>
				<td>email</td>
				<td><input type="text" name="e_email"></td>
			</tr>
			<tr>  
				<td></td>
				<td><input type="submit" name="Submit" value="Add"></td>
			</tr>
		</table>
	</form>
	
	<?php
 
	if(isset($_POST['Submit'])) {
		$id = $_POST['e_id'];
		$nama = $_POST['e_nama'];
		$alamat = $_POST['e_alamat'];
		$hp = $_POST['e_hp'];
		$email = $_POST['e_email'];
		
		$host = "localhost";
		$port = "5432";
		$db = "salondte";
		$user = "postgres";
		$password = "";
		$pg_options = "--client_encoding=UTF8";
		
		$connection_string = "host={$host} port={$port} dbname={$db} user={$user} password={$password} options='{$pg_options}'";
		$koneksi = pg_connect($connection_string);
				
		$sql = "INSERT INTO employee (employee_id,employee_name, address, phone_num, email) VALUES('$id','$nama','$alamat', '$hp', '$email')";
		$result = pg_query($koneksi, $sql);
		
		echo "Berhasil di Tambahkan!. <a href='http://localhost/proyek/Login/Admin/employetable/employetable.php'>Lihat Hasil!</a>";
	}
	?>
</body>
</html>
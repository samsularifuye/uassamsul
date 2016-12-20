<?php
	//CEK SESSION
	session_start();
	if(empty($_SESSION["username"]))
	{
		header("location: index.php?page=login");
	}
?>
<html>
<head>
		<title> Admin</title>
	</head>
	<body bgcolor="Powderblue" leftmargin = "50" topmargin= "50" rightmargin="50" >

	<table  align=center width=900 height=50 bgcolor=white>
	<tr>
		<td rowspan=2  align=right>&nbsp &nbsp &nbsp &nbsp	&nbsp &nbsp &nbsp 
		&nbsp &nbsp &nbsp &nbsp <img src="IMG/s.jpg" width=100 height=100></td>
		<td><center><b><font color=black size=5 face="Comic Sans MS">SMK NEGERI 1 GLAGAH BANYUWANGI</b></center></td>
	</tr>
	<tr>
		
		<td align=center><font color=blue>Jl.Kuntulan NO.1 Kec.Glagah Kab.Banyuwangi Jatim</td>
	</tr>
	</table>
		
	<table  align=center width=900 height=50 bgcolor=grey>
	<tr>
		
		<td rowspan=2 align=center><a href="index.php?page=ganti_pass"><font color=white>Ganti Password</a></td>
		<td rowspan=2 align=left><a href="index.php?page=logout"><font color=white>Logout</a></td>
		<td rowspan=2 align=left><a href="index.php"><font color=white>Tambah Pendaftar</a></a>
		
	</tr>
	</table>

		<?php
		if(!empty($_GET["edit"]))
		{
		$kode = $_GET["edit"];
		//TAMPIL DATA DETAIL
		$data = $database -> detailData($con,$kode);
?>
	
		<form action="#" method="POST">
		<table border="0" align=center width="900" height="600">
		
		<tr> <td> 1. Nama Lengkap </td> <td width="20"> : </td>
		     <td><input type="text" value="<?php echo $data["nama"]; ?>" name="nama"> </td> </tr>
	
		<tr> <td> 2. Jenis Kelamin </td> <td width="20"> : </td>
			<td><input type="text" value="<?php echo $data["kelamin"]; ?>" name="kelamin"></td> </tr>
	
		<tr> <td> 3. Tempat Lahir </td> <td width="20"> : </td>
		<td><input type="text" value="<?php echo $data["tempatlahir"];?>" name="tempatlahir"></td> </tr>
	
		<tr> <td> 4. Tanggal Lahir <td width="20"> : </td>
		<td><input type="text" value="<?php echo $data["tanggallahir"];?>" name="tanggallahir"> </td> </tr>
	
		
		<tr> <td> 5. Agama <td width="20"> : </td> 
		<td><input type="text" value="<?php echo $data["agama"];?>" name="agama"></td> </tr>
	
		<tr> <td> 6. Alamat <td width="20"> : </td>
		<td><input type="text" value="<?php echo $data["alamat"];?>" name="alamat"></td> </tr>
	
		<tr> <td> 7. Telp <td width="20"> : </td>
		<td><input type="text" value="<?php echo $data["tlp"];?>" name="tlp"></td> </tr>
	
		<tr> <td> 8. Sekolah Asal <td width="20"> : </td>
		<td><input type="text" value="<?php echo $data["namasekolah"];?>" name="namasekolah"></td> </tr>
	
		<tr> <td> 9. Nilai <td width="20"> : </td>
		<td><input type="text" value="<?php echo $data["nilai"];?>" name="nilai"></td> </tr>

		<td colspan="3" align=center> <input type="submit" name="edit" value="EDIT DATA"> </td>
		
		</form>
		<?php
		}
		else
		{
?>


<table  align=center width=1200 height=50 bgcolor=white>
<h2 align=center>DAFTAR PENDAFTAR</h2>
<table cellpadding="4" cellspacing="0" border="1" width="100%">
	<tr>
	<th>No.</th>
	<th>NAMA</th>
	<th>JENIS KELAMIN</th>
	<th>TEMPAT LAHIR</th>
	<th>TANGGAL LAHIR</th>
	<th>AGAMA</th>
	<th>ALAMAT</th>
	<th>No HP/Telp</th> 
	<th>ASAL SEKOLAH</th>
	<th>NILAI</th>
	<th>PERINTAH</th>
	</tr>
	<?php
	//READ (Membaca Data)
	$no= 1 ;
	$data = $database -> tampil($con);
	foreach($data as $value)
	{
		echo '
		<tr>
			<td>'.$no.'</td>
			
			<td>'.$value["nama"].'</td>
			
			<td>'.$value["kelamin"].'</td>
			
			<td>'.$value["tempatlahir"].'</td>
			
			<td>'.$value["tanggallahir"].'</td>
			
			<td>'.$value["agama"].'</td>
			
			<td>'.$value["alamat"].'</td>
			
			<td>'.$value["tlp"].'</td>
			
			<td>'.$value["namasekolah"].'</td>
			
			<td>'.$value["nilai"].'</td>
			<td>
				<a href="index.php?page=admin&edit='.$value["id_pendaftar"].'">Edit</a> | 
				<a href="index.php?page=admin&delete='.$value["id_pendaftar"].'">Delete</a>
			</td>
		</tr>
		';
		$no++;
	}
	?>
</table>
<?php
}
?>
</body>
</html>
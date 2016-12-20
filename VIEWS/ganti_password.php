<?php
session_start();
if(empty($_SESSION["username"]))
{
	//echo "Access Denied <br>";
	//echo "<a href='index.php?page=login'>Login</a>";
	header("location: index.php?page=login");
	exit();
}
?>

<html>
	<head>
		<title> Ganti Password</title>
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
		
		<td rowspan=2 align=center><a href="index.php?page=logout"><font color=white>Logout</a></td>
		<td rowspan=2 align=left><a href="index.php"><font color=white>Tambah Pendaftar</a></a>
		
	</tr>
	</table>
		
	
		<form action="#"  method="POST">
			<table border="0" align=center width="500" height="300">
			<td colspan="3" align=center> <h2> Ganti Password Admin</h2> </td>
			
			<tr> <td> <b>Password lama</b></td> <td width="20"> : </td>
			<td> <input type="password" name="passlama"></td> </tr>
					
			<tr> <td><b>Password Baru </b></td> <td width="20"> : </td>
			<td> <input type="password" name="new_pass">  </td><tr>
			
			<tr> <td> <b> Konfirmasi Password </b></td> <td width="20"> : </td>
			<td> <input type="password" name="konf_pass"> </td><tr>
		
			<td colspan="3" align=center> <button type="submit" name="ganti_pass" value="GANTI PASSWORD"> Ubah </button>
		</form>
	</body>
</html>
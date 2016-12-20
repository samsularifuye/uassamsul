<?php
//ROUTING
if(!empty($_GET["page"]))
{
	$page = mysql_real_escape_string(strtoupper($_GET["page"]));
	
	//proses login
	if($page == "LOGIN")
	{
		if(!empty($_POST["user"]) && !empty($_POST["pass"]))
		{
			$user = mysql_real_escape_string($_POST["user"]);
			$pass = mysql_real_escape_string(md5($_POST["pass"]));
			$database -> login($con,$user,$pass);
		}
		include("views/login.php");
	}
	
	else if($page == "ADMIN")
	{
		//DELETE DATA
		if(!empty($_GET["delete"]))
		{
			$kode = $_GET["delete"];
			$database -> hapusData($con,$kode);
		}
		
		//EDIT DATA
		if(isset($_POST["edit"]))
		{
			$kode = $_GET["edit"];
			$nama = mysql_real_escape_string($_POST["nama"]);
			$kelamin = mysql_real_escape_string($_POST["kelamin"]);
			$tempatlahir = mysql_real_escape_string($_POST["tempatlahir"]);
			$tanggallahir = mysql_real_escape_string($_POST["tanggallahir"]);
			$agama = mysql_real_escape_string ($_POST["agama"]);
			$alamat = mysql_real_escape_string($_POST["alamat"]);
			$tlp = mysql_real_escape_string($_POST["tlp"]);
			$namasekolah = mysql_real_escape_string($_POST["namasekolah"]);
			$nilai = mysql_real_escape_string($_POST["nilai"]);
			
			$database -> editData($con,$nama,$kelamin,$tempatlahir,$tanggallahir,$agama, $alamat, $tlp, $namasekolah,
			$nilai, $kode);
		}
		
		include("views/admin.php");
	}
	//PROSES LOGOUT
	else if($page == "LOGOUT")
	{
		session_start();
		session_destroy();
		header("location: index.php?page=login");
	}
	else if ($page == "GANTI_PASS")
	{
		if(!empty($_POST['ganti_pass']))
		{
			$new_pass = mysql_real_escape_string(md5($_POST['new_pass']));
			$konf_pass = mysql_real_escape_string(md5($_POST['konf_pass']));
			
			if($new_pass == $konf_pass)
			{
				$database->ganti_pass($con, $new_pass);
			}
			else
			{
				header("location: index.php?page=admin");
			}
		}	
		include("views/ganti_password.php");
	}
	else
	{
		//HALAMAN ERROR
		include("views/index.php");
	}
}
else
{
	//TAMPILAN AWAL TAMBAH DATA
	if(!empty($_POST["daftar"]))
	{
			$nama = mysql_real_escape_string($_POST["nama"]);
			$kelamin = mysql_real_escape_string($_POST["kelamin"]);
			$tempatlahir = mysql_real_escape_string($_POST["tempatlahir"]);
			$tanggallahir = mysql_real_escape_string($_POST["tanggallahir"]);
			$agama = mysql_real_escape_string ($_POST["agama"]);
			$alamat = mysql_real_escape_string($_POST["alamat"]);
			$tlp = mysql_real_escape_string($_POST["tlp"]);
			$namasekolah = mysql_real_escape_string($_POST["namasekolah"]);
			$nilai = mysql_real_escape_string($_POST["nilai"]);
		
		$input = $database -> daftar($con,$nama,$kelamin,$tempatlahir,$tanggallahir,$agama, $alamat, $tlp, $namasekolah,
			$nilai);
		
	}
	include("views/form.php");
}
?>

<?php

$conn = new mysqli('localhost','root','root','lks_modul_d');

function getMapel()  
{	
	$conn = $GLOBALS['conn'];
	$query = "SELECT * FROM t_mata_pelajaran";

	$mapel = mysqli_query($conn, $query);

	$res = [];
	while($ulang = mysqli_fetch_array($mapel))
	{
		$res[] = $ulang;
	}

	return $res;
}


function getKelas()  
{	
	$conn = $GLOBALS['conn'];
	$query = "SELECT * FROM t_kelas";

	$mapel = mysqli_query($conn, $query);

	$res = [];
	while($ulang = mysqli_fetch_array($mapel))
	{
		$res[] = $ulang;
	}

	return $res;
}


function getTahunAjaran()
{
	$conn = $GLOBALS['conn'];

	$query = "SELECT * FROM t_tahun_pelajaran";

	$mapel = mysqli_query($conn, $query);

	$res = [];
	while($ulang = mysqli_fetch_array($mapel))
	{
		$res[] = $ulang;
	}

	return $res;
}
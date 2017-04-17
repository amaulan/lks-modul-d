<?php

include 'connection.php';

$id_tahun_pelajaran = $_POST['id_tahun_pelajaran'];

$query = "SELECT * FROM t_ajar JOIN t_guru ON t_guru.id_guru = t_ajar.id_guru JOIN t_tahun_pelajaran ON t_tahun_pelajaran.id_tahun_pelajaran = t_ajar.id_tahun_pelajaran JOIN t_mata_pelajaran ON t_mata_pelajaran.id_mata_pelajaran = t_ajar.id_mata_pelajaran WHERE t_ajar.id_tahun_pelajaran = $id_tahun_pelajaran";

$exec = mysqli_query($conn, $query);

$result = [];
while($ulang = mysqli_fetch_array($exec))
{
	$result[] = [
		'id_ajar' 			 	=> $ulang['id_ajar'],
		'nama_mata_pelajaran'  	=> $ulang['nama_mata_pelajaran'],
		'tingkat' 			 	=> $ulang['tingkat'],
		'nama_lengkap' 		 	=> $ulang['nama_lengkap'],
	];

	// $result[] = $ulang;
}


echo json_encode($result);

// print_r($query);
<?php

include 'connection.php';

$data = $_POST;

$query = "SELECT * FROM t_jadwal JOIN t_ajar ON t_jadwal.id_ajar = t_ajar.id_ajar JOIN t_guru ON t_ajar.id_guru = t_guru.id_guru JOIN t_mata_pelajaran ON t_mata_pelajaran.id_mata_pelajaran = t_ajar.id_mata_pelajaran JOIN t_kelas ON t_kelas.id_kelas = t_jadwal.id_kelas HAVING t_kelas.id_kelas = ".$data['id_kelas'] . " AND t_kelas.id_tahun_pelajaran = " . $data['id_tahun_pelajaran'];

$exec  = mysqli_query($conn, $query);

$hasil = [];
while($ulang = mysqli_fetch_array($exec))
{
	$hasil[$ulang['hari']][] = [
		'id_ajar' 				=> $ulang['id_ajar'],
		'nama_lengkap'      	=> $ulang['nama_lengkap'],
		'tingkat' 				=> $ulang['tingkat'],
		'nama_mata_pelajaran' 	=> $ulang['nama_mata_pelajaran']
	];
}

echo json_encode($hasil);
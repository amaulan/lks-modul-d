<?php 

include 'connection.php';

$id_tahun_pelajaran = $_POST['id_tahun_pelajaran'];
$id_kelas 		   = $_POST['id_kelas'];

$query = "SELECT * FROM t_jadwal JOIN t_kelas ON t_kelas.id_kelas = t_jadwal.id_kelas HAVING t_kelas.id_tahun_pelajaran = $id_tahun_pelajaran AND t_jadwal.id_kelas = $id_kelas";


$get = mysqli_query($conn, $query);

$res = [];

while($ulang = mysqli_fetch_array($get))
{
	$res[] = $get;
}

echo json_encode($res);
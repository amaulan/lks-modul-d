<?php

include 'connection.php';

$data = $_POST;
// print_r($data['id_kelas']); die();

try {
	$query = "DELETE FROM t_jadwal WHERE id_kelas = ".$data['id_kelas'];

	mysqli_query($conn, $query);

	foreach($data['data_hari'] as $key => $value)
	{
		foreach($value as $key2 => $value2)
		{
			if($value2 != '')
			{
				$query = "INSERT INTO t_jadwal (id_ajar,id_kelas,hari) VALUES ($value2,".$data["id_kelas"].",'".$key."') ";
				 // echo $query;
				// echo $data['id_kelas'];
				$insert = mysqli_query($conn, $query);
			}
		}
	}

	echo json_encode([
		'status' => 200
	]);
	
} catch (Exception $e) {
	echo $e->getMessage();	
}
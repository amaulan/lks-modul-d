'use strict';

$(function()
{
	grabJadwal();
})

var table = $(".datatable").DataTable();

var id_el = '#senin, #selasa, #rabu, #kamis, #jumat';

$('.hari').sortable({
	connectWith : id_el,
	cancel : '.ket',
	receive : function(event, ui)
	{
		var mapel_id 	= $(ui.item[0]).find('td:nth-child(1)').text();
		var pengajar 	= $(ui.item[0]).find('td:nth-child(4)').text();
		var tingkat  	= $(ui.item[0]).find('td:nth-child(3)').text();
		var pelajaran   = $(ui.item[0]).find('td:nth-child(2)').text();

		var template = "<tr data-mapel-id=\""+mapel_id+"\" data-pengajar=\" " + pengajar + "\""
					 + "data-tingkat='"+tingkat+"' data-pelajaran='"+pelajaran+"'>"
					 + "<td width=\"1%\"><button class=\"btn btn-danger btn-sm\"> "
					 + "<i class=\"fa fa-trash\"></button></td>"
					 + "<td><strong>" + pelajaran + "</strong> - "+ pengajar +"</td>"
					 + "</tr>";

		if($(ui.sender).attr('id') == 'mapel')
		{
			ui.item.replaceWith(template)
			table.row(ui.item).remove().draw()
		}
	},
});

function grabJadwal()
{
	var data = {
		id_tahun_pelajaran : $('#tahun-pelajaran').val(),
		id_kelas  		   : $('#kelas').val()
	};

	console.log(data);

	// grab mataPelajaran List
	$.post('backend/mata-pelajaran.php',{id_tahun_pelajaran : data.id_tahun_pelajaran}, function(res){
		table.clear().draw();


		var i;
		for(i = 0; i <= JSON.parse(res).length-1; i++)
		{
			var parse = JSON.parse(res);


			var arr = Object.values(parse[i]);
			// arr[0] = i+1;
			var store = table.row.add(arr).draw();

		}
	});

	//grab currentJadwal
	$.post('backend/jadwal.php',data, function(res){
		var parse = JSON.parse(res);

		// var each = Object.keys(parse).forEach(function(item){
			Object.keys(parse).forEach(function(value)
			{
				var j;
				for(j = 0; j <= parse[value].length-1; j++)
				{
					var currentVal = parse[value][j];

					var template = "<tr data-mapel-id=\""+currentVal.id_ajar+"\" data-pengajar=\" " + currentVal.nama_lengkap + "\""
					 + "data-tingkat='"+currentVal.tingkat+"' data-pelajaran='"+currentVal.nama_mata_pelajaran+"'>"
					 + "<td width=\"1%\"><button class=\"btn btn-danger btn-sm\"> "
					 + "<i class=\"fa fa-trash\"></button></td>"
					 + "<td><strong>" + currentVal.nama_mata_pelajaran + "</strong> - "+ currentVal.nama_lengkap +"</td>"
					 + "</tr>";;

					var appen = $('#'+value).append(template)

					// console.log('#'.)
					// console.log(currentVal.id_ajar);
				}
			})
		// })
	});

}

$(document).on('click', '.btn-danger', function()
{
	var current = $(this).parent().parent();

	var data  = current.data();

	var serialize = [data.mapelId,data.pelajaran, data.tingkat, data.pengajar];

	table.row.add(serialize).draw();

	current.remove();
});


$('#tahun-pelajaran').on('change', function()
{
	$('.hari').find('tr:not(.ket)').remove();

	grabJadwal();
})

$('#kelas').on('change', function(){

	$('.hari').find('tr:not(.ket)').remove();

	grabJadwal();
})


$('#save').on('click', function(){
	var senin 	= $('#senin').sortable('toArray',{attribute : 'data-mapel-id'});
	var selasa  = $('#selasa').sortable('toArray',{attribute : 'data-mapel-id'});
	var rabu    = $('#rabu').sortable('toArray',{attribute : 'data-mapel-id'});
	var kamis   = $('#kamis').sortable('toArray',{attribute : 'data-mapel-id'});
	var jumat   = $('#jumat').sortable('toArray',{attribute : 'data-mapel-id'});
 

	var id_tahun_pelajaran = $('#tahun-pelajaran').val();
	var id_kelas 		   = $('#kelas').val();
 	var data_hari = {
 		senin : senin,
 		selasa : selasa,
 		rabu : rabu,
 		kamis : kamis,
 		jumat : jumat
 	};

 	var data = {
 		id_tahun_pelajaran : id_tahun_pelajaran,
 		id_kelas  : id_kelas,
 		data_hari : data_hari
 	};

 	$.post('backend/save.php',data, function(res){
 		var parse = JSON.parse(res);

 		if(parse.status == 200)
 		{
 			alert('Berhasil Menyimpan');
 		}
 		else{
 			alert('Ada Kesalahan');
 		}
 	})

	// console.log(data);
});
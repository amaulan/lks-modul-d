<?php

include 'backend/connection.php';

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Jabar School</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="./media/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./media/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="./media/plugins/ionicons-2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./media/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="./media/dist/css/skins/_all-skins.min.css">
  
  <link rel="stylesheet" href="./media/plugins/datatables/dataTables.bootstrap.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <link rel="stylesheet" href="my.css">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="./media/index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>JS</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Jabar</b>School</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="./media/dist/img/user8-128x128.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Administrator</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="./media/dist/img/user8-128x128.jpg" class="img-circle" alt="User Image">

                <p>
                  Administrator - Kurikulum
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image text-center">
          <img src="./media/dist/img/user8-128x128.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="info">
          <p>Administrator</p>
        </div>
		<br />
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="active">
          <a href="index.html">
            <i class="fa fa-calendar"></i> <span>Jadwal Pelajaran</span>
          </a>
        </li>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Jadwal Pelajaran
        <small>atur jadwal pelajaran</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Jadwal Pelajaran</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Jadwal Pelajaran</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          <form class="form-horizontal">
			<div class="form-group">
				<label class="control-label col-sm-2">Tahun Pelajaran</label>
				<div class="col-sm-10">
					<select id="tahun-pelajaran" class="form-control">
						<?php 
							$mapel = getTahunAjaran();
							foreach($mapel as $key => $value)
							{
								if($key == 0)
								{

						?>
							<option selected="" value="<?php echo $value['id_tahun_pelajaran']; ?>"><?php echo $value['nama_tahun_pelajaran']; ?></option>
						<?php
								}
								else{
						?>
							<option value="<?php echo $value['id_tahun_pelajaran']; ?>"><?php echo $value['nama_tahun_pelajaran']; ?></option>
						<?php
								}
							}
						?>
					</select>
				</div>
			</div>
			
			<div class="form-group">
				<label class="control-label col-sm-2">Kelas</label>
				<div class="col-sm-10">
					<select id="kelas" class="form-control">
						<?php 
							$kelas = getKelas();
							foreach($kelas as $key => $value)
							{
								if($key == 0)
								{


						?>
							<option selected value="<?php echo $value['id_kelas']; ?>"><?php echo $value['nama_kelas']; ?></option>
						<?php
								}
								else
								{
						?>
							<option value="<?php echo $value['id_kelas']; ?>"><?php echo $value['nama_kelas']; ?></option>
						<?php
								}
							}
						?>
					</select>
				</div>
			</div>
		  </form>
		  
		  <!-- Senin -->
		  <div class="col-lg-6">
			<table class="table table-bordered table-striped boxJadwal">
				<thead>
					<tr class="success">
						<th colspan="2">Senin</th>
					</tr>
				</thead>
				
				<tbody id="senin" class="hari">
					<tr class="ket">
						<th colspan="2">Drag Mata Pelajaran dari tabel Daftar Pelajaran kedalam area ini</th>
					</tr>
				</tbody>
			</table>
		  </div>
		  <!-- End of Senin -->
		  
		  <!-- Selasa -->
		  <div class="col-lg-6">
			<table class="table table-bordered table-striped">
				<thead>
					<tr class="success">
						<th colspan="2">Selasa</th>
					</tr>
				</thead>
				
				<tbody id="selasa" class="hari" >
				<tr class="ket">
						<th colspan="2">Drag Mata Pelajaran dari tabel Daftar Pelajaran kedalam area ini</th>
					</tr>
				</tbody>
			</table>
		  </div>
		  <!-- End of Selasa -->
		  
		  <!-- Rabu -->
		  <div class="col-lg-6">
			<table class="table table-bordered table-striped">
				<thead>
					<tr class="success">
						<th colspan="2">Rabu</th>
					</tr>
				</thead>
				
				<tbody id="rabu" class="hari">
					<tr class="ket">
						<th colspan="2">Drag Mata Pelajaran dari tabel Daftar Pelajaran kedalam area ini</th>
					</tr>
				</tbody>
			</table>
		  </div>
		  <!-- End of Rabu -->
		  
		  <!-- Kamis -->
		  <div class="col-lg-6">
			<table class="table table-bordered table-striped">
				<thead>
					<tr class="success">
						<th colspan="2">Kamis</th>
					</tr>
				</thead>
				
				<tbody id="kamis" class="hari">
					<tr class="ket">
						<th colspan="2">Drag Mata Pelajaran dari tabel Daftar Pelajaran kedalam area ini</th>
					</tr>
				</tbody>
			</table>
		  </div>
		  <!-- End of Kamis -->
		  
		  <!-- Jum'at -->
		  <div class="col-lg-6">
			<table class="table table-bordered table-striped">
				<thead>
					<tr class="success">
						<th colspan="2">Jum'at</th>
					</tr>
				</thead>
				
				<tbody id="jumat" class="hari">
					<tr class="ket">
						<th colspan="2">Drag Mata Pelajaran dari tabel Daftar Pelajaran kedalam area ini</th>
					</tr>
				</tbody>
			</table>
		  </div>
		  <!-- End of Jum'at -->
        </div>
        <!-- /.box-footer-->
		<div class="box-footer">
			<button id="save" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Simpan</button>
		</div>
      </div>
      <!-- /.box -->

	  <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Daftar Pelajaran</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
			<table class="table table-bordered table-striped datatable">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Mata Pelajaran</th>
						<th>Tingkat</th>
						<th>Nama Guru</th>
					</tr>
				</thead>
				
				<tbody id="mapel" class="hari">
				<!-- 	<tr data-id-mapel="1">
						<td>1</td>
						<td>Pemrograman Web Dinamis</td>
						<td>1</td>
						<td>Hantze Sudarma, S. Kom, MTI</td>
					</tr>
					
					<tr data-id-mapel="2">
						<td>2</td>
						<td>Pemrograman Web Dinamis</td>
						<td>2</td>
						<td>David Naista, S. Kom</td>
					</tr>
					
					<tr data-id-mapel="3">
						<td>3</td>
						<td>Pemrograman Web Dinamis</td>
						<td>3</td>
						<td>Adam Mukharil Bachtiar, S. Kom</td>
					</tr> -->
				</tbody>
			</table>
		</div>
	  </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <strong>Copyright &copy; 2017 <a href="#">Jabar School</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="./media/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="./media/plugins/jQueryUI/jquery-ui.min.js"></script>

<!-- Bootstrap 3.3.6 -->
<script src="./media/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="./media/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="./media/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="./media/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./media/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="./media/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="./media/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
	$(function() {
	});
</script>
<script src="my.js"></script>
</body>
</html>

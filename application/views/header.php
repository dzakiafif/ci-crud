<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	
	<title><?= $title; ?> - CRUD</title> <!-- #title -->
	
	<!-- Bootstrap resources -->
	<link rel="stylesheet" type="text/css" href="<?= site_url(); ?>contents/css/bootstrap.min.css" />
	
	<!-- Fontawesome resources -->
	<link rel="stylesheet" type="text/css" href="<?= site_url(); ?>contents/font-awesome/css/font-awesome.min.css" />
	
	<!-- Custom CSS -->
	<link rel="stylesheet" type="text/css" href="<?= site_url(); ?>contents/css/default.css" />
</head>

<body>
	
	<main id="wrapper">
		<!-- header -->
		<section id="is-header">
			<div class="nav-header">
				<ul>
					<li><a href="<?= site_url(); ?>beranda">Beranda</a></li>
					<li><a href="<?= site_url(); ?>pegawai">Tambah Pegawai</a></li>
					<li><a href="<?= site_url(); ?>kelola">Kelola Data</a></li>
				</ul>
			</div>
			
			<div class="header">
				<h3><?= ( @$bigText ) ? $bigText : 'CRUD CodeIgniter'; ?></h3>
			</div>
		</section>
		<!-- #header -->		
		<!-- content -->
		<section id="is-content" class="container">
		
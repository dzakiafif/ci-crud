<legend>
		<h3>Formulir tambah kota</h3>
	</legend>
	
	<?php 
	if( @$_SESSION['info']): 
	$x = explode("|",$_SESSION['info']);
	?>
	<div class="alert alert-<?= $x[0]; ?> alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<?= $x[1]; ?>
	</div>
	<?php 
	unset($_SESSION['info']);
	endif; 
	?>
	
	<form action="" method="post">
		<div class="form-group">
			<label class="label-control">Nama Kota</label>
			<input type="text" name="nama" class="form-control" autocomplete="off" placeholder="" />
			<?php echo form_error('nama'); ?>
		</div>
		
		<div class="form-group">
			<button class="btn btn-success" type="submit">Tambah</button>
			<button class="btn btn-danger" type="button" onclick="this.form.reset()">Ulang</button>
		</div>
	</form>
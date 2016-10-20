	
	<legend>
		<h3>Formulir tambah pegawai</h3>
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
			<label class="label-control">Nama Pegawai</label>
			<input type="text" name="nama" class="form-control" autocomplete="off" placeholder="" />
			<?php echo form_error('nama'); ?>
		</div>
		
		<div class="form-group">
			<label class="label-control">Nomor Telepon</label>
			<input type="text" name="no_telp" class="form-control" autocomplete="off" placeholder="" />
			<?php echo form_error('no_telp'); ?>
		</div>
		
		<div class="form-group">
			<label class="label-control">Kota</label>
			<select name="kota" class="form-control">
				<?php foreach($kota as $data): ?>
				<option value="<?= strtolower($data->id); ?>"><?= $data->nama ?></option>
				<?php endforeach; ?>
			</select>
			<?php echo form_error('kota'); ?>
		</div>
		
		<div class="form-group">
			<label class="label-control">Jenis Kelamin</label>
			<select name="kelamin" class="form-control">
				<?php foreach($kelamin as $data): ?>
				<option value="<?= strtolower($data->id); ?>"><?= $data->nama ?></option>
				<?php endforeach; ?>
			</select>
			<?php echo form_error('kelamin'); ?>
		</div>
		
		<div class="form-group">
			<label class="label-control">Posisi</label>
			<select name="posisi" class="form-control">
				<?php foreach($posisi as $data): ?>
				<option value="<?= strtolower($data->id_posisi); ?>"><?= $data->nama ?></option>
				<?php endforeach; ?>
			</select>
			<?php echo form_error('posisi'); ?>
		</div>
		
		<div class="form-group">
			<label class="label-control">Pegawai Status</label>
			<select name="status" class="form-control">
				<option value="1">Aktif</option>
				<option value="0">Tidak Aktif</option>
			</select>
			<?php echo form_error('status'); ?>
		</div>
		
		<div class="form-group">
			<button class="btn btn-success" type="submit">Tambah</button>
			<button class="btn btn-danger" type="button" onclick="this.form.reset()">Ulang</button>
		</div>
	</form>
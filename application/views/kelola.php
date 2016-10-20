	
	<legend>
		<h3>Kelola posisi</h3>
	</legend>
	
	<a href="<?= site_url() ?>posisi"><button class="btn btn-info">Tambah Posisi</button></a>
	
	<table class="table table-hover" style="margin-top:15px">
		<tr>
			<th>ID Posisi</th>
			<th>Posisi</th>
			<th colspan="2">Aksi</th>
		</tr>
				
		<?php 
		foreach($posisi as $data):
		?>
				
		<tr>
			<td><?= $data->id_posisi; ?></td>
			<td><?= $data->nama; ?></td>
			<td><a href="posisi?view=edit&key=<?= $data->id_posisi; ?>">Edit</a></td>
			<td><a href="<?= site_url()?>hapus?option=posisi&key=[id_posisi:<?= $data->id_posisi ?>]">Hapus</a></td>
		</tr>
			
		<?php endforeach; ?>
	</table>
	
	<legend>
		<h3>Kelola kota</h3>
		
	</legend>
	
	<a href="<?= site_url() ?>kota"><button class="btn btn-info">Tambah Kota</button></a>
	
	<table class="table table-hover" style="margin-top:15px">
		<tr>
			<th>ID Kota</th>
			<th>Kota</th>
			<th>Aksi</th>
		</tr>
				
		<?php 
		foreach($kota as $data):
		?>
				
		<tr>
			<td><?= $data->id; ?></td>
			<td><?= $data->nama; ?></td>
			<td><a href="<?= site_url()?>hapus?option=kota&key=[id:<?= $data->id ?>]">Hapus</a></td>
		</tr>
			
		<?php endforeach; ?>
	</table>
	
	<legend>
		<h3>Kelola kelamin</h3>
	</legend>
	
	<a href="<?= site_url() ?>kelamin"><button class="btn btn-info">Tambah Kelamin</button></a>
	
	<table class="table table-hover" style="margin-top:15px">
		<tr>
			<th>ID Kelamin</th>
			<th>Kelamin</th>
			<th>Aksi</th>
		</tr>
				
		<?php 
		foreach($kelamin as $data):
		?>
				
		<tr>
			<td><?= $data->id; ?></td>
			<td><?= $data->nama; ?></td>
			<td><a href="<?= site_url()?>hapus?option=kelamin&key=[id:<?= $data->id ?>]">Hapus</a></td>
		</tr>
			
		<?php endforeach; ?>
	</table>
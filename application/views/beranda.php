			
			<form action="<?= site_url(); ?>search" method="get">
			<div class="input-group">
				<div class="input-group-addon">
					<span class="fa fa-search"></span>
				</div>
				<input type="text" class="form-control" name="keyword" placeholder="<?= $this->db->count_all('pegawai'); ?> pegawai tersedia...">
			</div>
			</form>
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
			
			<table class="table table-hover" style="margin-top:15px">
				<tr>
					<th>No</th>
					<th>ID Pegawai</th>
					<th>Nama</th>
					<th>Nomor Telepon</th>
					<th>Kota</th>
					<th>Jenis Kelamin</th>
					<th>Posisi</th>
					<th>Hapus</th>
				</tr>
				
				<?php 
				$no = 1;
				foreach($pegawai as $data):
				?>
				
				<tr>
					<td><?= $no++; ?></td>
					<td><?= $data->id_pegawai; ?></td>
					<td><?= $data->nama; ?></td>
					<td><?= $data->no_telp; ?></td>
					<td><?= $this->crud_model->getWhere('kota',array('id' => $data->kota))->nama; ?></td>
					<td><?= $this->crud_model->getWhere('kelamin',array('id' => $data->kelamin))->nama; ?></td>
					<td><?= $this->crud_model->getWhere('posisi',array('id_posisi' => $data->id_posisi))->nama; ?></td>
					<td><a href="<?= site_url()?>hapus?option=pegawai&key=[id_pegawai:<?= $data->id_pegawai ?>]"><span class="fa fa-trash"></span></a></td>
				</tr>
				
				<?php endforeach; ?>
			</table>
	
<?php
	include 'menu.html';
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://andriyanti.site/bella/api.php/records/kgb',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
	));
	$response = curl_exec($curl);
	curl_close($curl);
	$data = json_decode($response);

	$curl3 = curl_init();
	curl_setopt_array($curl3, array(
		CURLOPT_URL => 'https://andriyanti.site/bella/api.php/records/pegawai',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
	));
	$response3 = curl_exec($curl3);
	curl_close($curl3);
	$pegawai = json_decode($response3);
?>

<button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modalTambah">Tambah</button>
<h3>Kenaikan Gaji Berkala</h3>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No.</th>
			<th>Pegawai</th>
			<th>Tanggal SK</th>
			<th>Nomor SK</th>
			<th>Gaji Baru</th>
			<th>Tanggal Berlaku</th>
			<th>Opsi</th>
		</tr>
	</thead>
	<tbody>
		<?php
			$no = 1;
			foreach ($data->records as $x) {
		?>
			<tr>
				<td class="text-center"><?= $no++ ?></td>
				<td>
					<?php
						$curl2 = curl_init();
						curl_setopt_array($curl2, array(
							CURLOPT_URL => 'https://andriyanti.site/bella/api.php/records/pegawai/'.$x->id_pegawai,
							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_ENCODING => '',
							CURLOPT_MAXREDIRS => 10,
							CURLOPT_TIMEOUT => 0,
							CURLOPT_FOLLOWLOCATION => true,
							CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
							CURLOPT_CUSTOMREQUEST => 'GET',
						));
						$response2 = curl_exec($curl2);
						curl_close($curl2);
						$data2 = json_decode($response2);
						echo $data2->nama;
					?>
				</td>
				<td><?= $x->tgl_sk ?></td>
				<td><?= $x->no_sk ?></td>
				<td><?= $x->gaji ?></td>
				<td><?= $x->tgl_berlaku ?></td>
				<td>
					<button type="button" class="btn btn-sm btn-info ubah" data-toggle="modal" data-target="#modalUbah"
						data-id="<?= $x->id ?>"
						data-pegawai="<?= $x->id_pegawai ?>"
						data-tgl_sk="<?= $x->tgl_sk ?>"
						data-no_sk="<?= $x->no_sk ?>"
						data-gaji="<?= $x->gaji ?>"
						data-tgl_berlaku="<?= $x->tgl_berlaku ?>"
					>
						Ubah
					</button>
					<a href="kgb-hapus.php?id=<?= $x->id ?>" class="btn btn-sm btn-danger">
						Hapus
					</a>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>

<div class="modal fade" id="modalTambah">
	<div class="modal-dialog">
		<form class="modal-content" method="POST" action="kgb-tambah.php">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Kenaikan Gaji Berkala</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label>Pegawai</label>
					<select name="pegawai" class="form-control" required>
						<?php foreach ($pegawai->records as $x) { ?>
							<option value="<?= $x->id ?>"><?= $x->nama ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label>Tanggal SK</label>
					<input type="date" name="tgl_sk" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Nomor SK</label>
					<input type="text" name="no_sk" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Gaji Baru</label>
					<input type="number" name="gaji" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Tanggal Berlaku</label>
					<input type="date" name="tgl_berlaku" class="form-control" required>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Simpan</button>
			</div>
		</form>
	</div>
</div>

<div class="modal fade" id="modalUbah">
	<div class="modal-dialog">
		<form class="modal-content" method="POST" action="kgb-ubah.php">
			<div class="modal-header">
				<h4 class="modal-title">Ubah Kenaikan Gaji Berkala</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<input type="hidden" name="id" id="id">
				<div class="form-group">
					<label>Pegawai</label>
					<select name="pegawai" class="form-control" id="pegawai" required>
						<?php foreach ($pegawai->records as $x) { ?>
							<option value="<?= $x->id ?>"><?= $x->nama ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group">
					<label>Tanggal SK</label>
					<input type="date" name="tgl_sk" class="form-control" id="tgl_sk" required>
				</div>
				<div class="form-group">
					<label>Nomor SK</label>
					<input type="text" name="no_sk" class="form-control" id="no_sk" required>
				</div>
				<div class="form-group">
					<label>Gaji Baru</label>
					<input type="number" name="gaji" class="form-control" id="gaji" required>
				</div>
				<div class="form-group">
					<label>Tanggal Berlaku</label>
					<input type="date" name="tgl_berlaku" class="form-control" id="tgl_berlaku" required>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-success">Simpan</button>
			</div>
		</form>
	</div>
</div>

<script>
	$(document).on('click', '.ubah', function () {
		$('#id').val($(this).data('id'))
		$('#pegawai').val($(this).data('pegawai'))
		$('#tgl_sk').val($(this).data('tgl_sk'))
		$('#no_sk').val($(this).data('no_sk'))
		$('#gaji').val($(this).data('gaji'))
		$('#tgl_berlaku').val($(this).data('tgl_berlaku'))
	})
</script>

</div>
</body>
</html>
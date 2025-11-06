<?php
	include 'menu.html';
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_URL => 'https://andriyanti.site/bella/api.php/records/kp',
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

	$curl4 = curl_init();
	curl_setopt_array($curl4, array(
		CURLOPT_URL => 'https://andriyanti.site/bella/api.php/records/pegawai',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
	));
	$response4 = curl_exec($curl4);
	curl_close($curl4);
	$pegawai = json_decode($response4);

	$curl5 = curl_init();
	curl_setopt_array($curl5, array(
		CURLOPT_URL => 'https://andriyanti.site/bella/api.php/records/golongan',
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => '',
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => 'GET',
	));
	$response5 = curl_exec($curl5);
	curl_close($curl5);
	$golongan = json_decode($response5);
?>

<button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#modalTambah">Tambah</button>
<h3>Kenaikan Pangkat</h3>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No.</th>
			<th>Pegawai</th>
			<th>Golongan</th>
			<th>Tanggal SK</th>
			<th>Nomor SK</th>
			<th>TMT</th>
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
				<td class="text-center">
					<?php
						$curl3 = curl_init();
						curl_setopt_array($curl3, array(
							CURLOPT_URL => 'https://andriyanti.site/bella/api.php/records/golongan/'.$x->id_golongan,
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
						$data3 = json_decode($response3);
						echo $data3->nama;
					?>
				</td>
				<td><?= $x->tgl_sk ?></td>
				<td><?= $x->no_sk ?></td>
				<td><?= $x->tmt ?></td>
				<td>
					<button type="button" class="btn btn-sm btn-info ubah" data-toggle="modal" data-target="#modalUbah"
						data-id="<?= $x->id ?>"
						data-pegawai="<?= $x->id_pegawai ?>"
						data-golongan="<?= $x->id_golongan ?>"
						data-tgl_sk="<?= $x->tgl_sk ?>"
						data-no_sk="<?= $x->no_sk ?>"
						data-tmt="<?= $x->tmt ?>"
					>
						Ubah
					</button>
					<a href="kp-hapus.php?id=<?= $x->id ?>" class="btn btn-sm btn-danger">
						Hapus
					</a>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>

<div class="modal fade" id="modalTambah">
	<div class="modal-dialog">
		<form class="modal-content" method="POST" action="kp-tambah.php">
			<div class="modal-header">
				<h4 class="modal-title">Tambah Kenaikan Pangkat</h4>
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
					<label>Golongan</label>
					<select name="golongan" class="form-control" required>
						<?php foreach ($golongan->records as $x) { ?>
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
					<label>TMT</label>
					<input type="date" name="tmt" class="form-control" required>
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
		<form class="modal-content" method="POST" action="kp-ubah.php">
			<div class="modal-header">
				<h4 class="modal-title">Ubah Kenaikan Pangkat</h4>
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
					<label>Golongan</label>
					<select name="golongan" class="form-control" id="golongan" required>
						<?php foreach ($golongan->records as $x) { ?>
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
					<label>TMT</label>
					<input type="date" name="tmt" class="form-control" id="tmt" required>
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
		$('#golongan').val($(this).data('golongan'))
		$('#tgl_sk').val($(this).data('tgl_sk'))
		$('#no_sk').val($(this).data('no_sk'))
		$('#tmt').val($(this).data('tmt'))
	})
</script>

</div>
</body>
</html>
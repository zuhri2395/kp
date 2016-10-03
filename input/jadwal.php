<?php
include_once 'includes/koneksi.php';
include_once 'includes/function.php';
?>

<div class="templatemo-content-wrapper">
	<div class="templatemo-content">
		<ol class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li>
			<li><a href="index.php?posisi=jadwal">Jadwal Dinas</a></li>
			<li>Input Jadwal Dinas</li>
		</ol>
		<h1>
			<b>Jadwal Penugasan</b>
		</h1>
		<p class="margin-bottom-15">Form Pengisian Jadwal Penugasan</p>
		<div class="row">
			<div class="col-md-12">
				<form role="form" id="templatemo-preferences-form" action="proses/inputJadwal.php" method="POST">
					<div class="row">
						<div class="col-md-12 margin-bottom-15">
							<label for="tanggalBerangkat" class="control-label">Tanggal Perjalanan Dinas</label>
							<input type="text" name="tanggalBerangkat" id="tanggalBerangkat" class="form-control margin-bottom-15 readonly" required>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 margin-bottom 15">
							<label for="tanggalBerakhir" class="control-label">Tanggal Berakhir Perjalanan Dinas</label>
							<input type="text" name="tanggalBerakhir" id="tanggalBerakhir" class="form-control margin-bottom-15 readonly" disabled>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 margin-bottom-15">
							<label for="jumlahPegawai" class="label-control">Jumlah Pegawai</label>
							<select id="jumlahPegawai" class="form-control margin-bottom-15" required>
								<option value="">Pilih Jumlah Pegawai</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</div>
					</div>

					<div class="row" hidden id="pegawai1">
						<div class="col-md-12 margin-bottom-15">
							<label for="pegawai1" class="control-label">Pegawai 1</label>
							<select name="nip[]" id="nip1" class="form-control margin-bottom-15" disabled>
								<option value="">Pilih NIP Pegawai</option>
								<?php
									$result = getPegawai("nip, nama");
									while($row = $result->fetch_object()) {
										echo "<option value='" . $row->nip . "'>" . $row->nip . " - " . $row->nama . "</option>";
									}
								?>
							</select>
						</div>
					</div>

					<div class="row" hidden id="pegawai2">
						<div class="col-md-12 margin-bottom-15">
							<label for="pegawai2" class="control-label">Pegawai 2</label>
							<select name="nip[]" id="nip2" class="form-control margin-bottom-15" disabled>
								<option value="">Pilih NIP Pegawai</option>
								<?php
									$result = getPegawai("nip, nama");
									while($row = $result->fetch_object()) {
										echo "<option value='" . $row->nip . "'>" . $row->nip . " - " . $row->nama . "</option>";
									}
								?>
							</select>
						</div>
					</div>

					<div class="row" hidden id="pegawai3">
						<div class="col-md-12 margin-bottom-15">
							<label for="pegawai3" class="control-label">Pegawai 3</label>
							<select name="nip[]" id="nip3" class="form-control margin-bottom-15" disabled>
								<option value="">Pilih NIP Pegawai</option>
								<?php
									$result = getPegawai("nip, nama");
									while($row = $result->fetch_object()) {
										echo "<option value='" . $row->nip . "'>" . $row->nip . " - " . $row->nama . "</option>";
									}
								?>
							</select>
						</div>
					</div>

					<div class="row" hidden id="pegawai4">
						<div class="col-md-12 margin-bottom-15">
							<label for="pegawai4" class="control-label">Pegawai 4</label>
							<select name="nip[]" id="nip4" class="form-control margin-bottom-15" disabled>
								<option value="">Pilih NIP Pegawai</option>
								<?php
									$result = getPegawai("nip, nama");
									while($row = $result->fetch_object()) {
										echo "<option value='" . $row->nip . "'>" . $row->nip . " - " . $row->nama . "</option>";
									}
								?>
							</select>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 margin-bottom-15">
							<input type="submit" name="submit" value="Simpan" class="btn btn-primary">
							<input type="reset" name="reset" value="Reset" class="btn btn-default">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	function setMinDate(value) {
		$('#tanggalBerakhir').datepicker({
			minDate: value
		});
	}

	$(document).ready(function() {
		$('#tanggalBerangkat').datepicker({
				onSelect: function(selected, evnt) {
					$('#tanggalBerakhir').datepicker('destroy');
					setMinDate(selected);
					$('#tanggalBerakhir').removeAttr('disabled');
					$('#tanggalBerakhir').attr('required', true);
				}
		});

		$('#jumlahPegawai').on('change', function() {
			jumlah = $(this).val();

			for(var i = 1; i <= jumlah; i++) {
				$('#pegawai' + i).show();
				$('#pegawai' + i).find('*').removeAttr('disabled');
				$('#pegawai' + i).find('*').attr('required', true);
			}

			for(var j = 4; j > jumlah; j--) {
				$('#pegawai' + j).hide();
				$('#pegawai' + i).find('*').attr('disabled', true);
				$('#pegawai' + i).find('*').attr('required', false);
			}
		});
	});
</script>

<?php //} ?>
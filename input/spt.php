<?php
include_once 'includes/koneksi.php';
include_once 'includes/function.php';

$sql = "SELECT DISTINCT tanggalBerangkat FROM jadwal_dinas";
$stmt = $conn->query($sql);

?>

<div class="templatemo-content-wrapper">
	<div class="templatemo-content">
		<ol class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li>
			<li><a href="index.php?posisi=spt">SPT</a></li>
			<li class="active">Input SPT</li>
		</ol>
		<h1>
			<b>Surat Perintah Tugas</b>
		</h1>
		<p class="margin-bottom-15">Form Pengisian Surat Perintah Tugas</p>
		<div class="row">
			<div class="col-md-12">
				<form role="form" id="templatemo-preferences-form">
					<!-- No Surat Section Start-->
					<div class="row">
						<div class="col-md-12 margin-bottom-15">
							<label for="noSPT" class="control-label">Nomor Surat Perintah Tugas</label>
							<input type="text" id="noSPT" class="form-control" name="nomorSPT" placeholder="No Surat Perintah Tugas" required>
						</div>
					</div>

					<h4 class="margin-bottom-15">
						<b>Berdasarkan :</b>
					</h4>

					<div class="row">
						<!-- Nomor Peraturan Gubernur -->
						<div class="col-md-6 margin-bottom-15">
							<label for="noPergub" class="control-label">Nomor Peraturan Gubernur</label>
							<select class="form-control margin-bottom-15" name="noPergub" id="noPergub" required>
								<option value="">Pilih No Peraturan Gubernur</option>
								<?php
									$result = getPergub("noPergub");
									while($row = $result->fetch_object()) {
										echo "<option value='" . $row->noPergub . "'>" . $row->noPergub . "</option>";
									}
								?>
							</select>
						</div>

						<!-- Nomor Dokumen Penyedia Anggaran -->
						<div class="col-md-6 margin-bottom-15">
							<label for="nomorDPA" class="control-label">Nomor Dokumen Penyedia Anggaran</label>
							<select class="form-control margin-bottom-15" name="nomorDPA" id="nomorDPA" required>
								<option value="">Pilih No DPA-SKPD</option>
								<?php
									$result = getDPA("noDPA, kegiatan");
									while($row = $result->fetch_object()) {
										echo "<option value='" . $row->noDPA . "'>" . $row->noDPA . " - " . $row->kegiatan . "</option>";
									}
								?>
							</select>
						</div>
					</div>

					<div class="row">
						<!-- Nomor SPD -->
						<div class="col-md-12 margin-bottom-15">
							<label for="nomorSPD" class="control-label">No SPD</label>
							<input type="text" class="form-control" name="nomorSPD" placeholder="Nomor SPD" required>
						</div>
					</div>

					<h4 class="margin-bottom-15">
						<b>Memerintahkan :</b>
					</h4>

					<div class="row">
						<div class="col-md-6 margin-bottom-15">
							<label for="tanggalDinas" class="control-label">Tanggal Perjalanan Dinas</label>
							<select class="form-control margin-bottom-15" name="tanggalDinas" id="tanggalDinas" required>
								<option value="">Pilih Tanggal Perjalanan Dinas</option>
								<?php
									$result = getJadwal("DISTINCT tanggalBerangkat, tanggalBerakhir");
									while($row = $result->fetch_object()) {
										echo "<option value='" . $row->tanggalBerangkat . "-" . $row->tanggalBerakhir . "'>" . $row->tanggalBerangkat . " - " . $row->tanggalBerakhir . "</option>";
									}
								?>
							</select>
						</div>

						<div class="col-md-6 margin-bottom-15">
							<label for="jumlahPegawai" class="control-label">Jumlah Pegawai</label>
							<select class="form-control margin-bottom-15" id="jumlahPegawai" required>
								<option value="">Pilih Jumlah Pegawai</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 margin-bottom-15">
							<label for="pegawai1" class="control-label">Pegawai 1</label>
							<select class="form-control margin-bottom-15" name="nip1" id="pegawai1" required>
								<option value="">Pilih NIP Pegawai</option>
								
							</select>
						</div>
						<div class="col-md-6 margin-bottom-15">
							<label for="pegawai2" class="control-label">Pegawai 2</label>
							<select class="form-control margin-bottom-15" name="nip2" id="pegawai2" required>
								<option value="">Pilih NIP Pegawai</option>
								
							</select>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 margin-bottom-15">
							<label for="pegawai3" class="control-label">Pegawai 3</label>
							<select class="form-control margin-bottom-15" name="nip3" id="pegawai3" required>
								<option value="">Pilih NIP Pegawai</option>
								
							</select>
						</div>
						<div class="col-md-6 margin-bottom-15">
							<label for="pegawai4" class="control-label">Pegawai 4</label>
							<select class="form-control margin-bottom-15" name="nip4" id="pegawai4" required>
								<option value="">Pilih NIP Pegawai</option>
								
							</select>
						</div>
					</div>

					<h4 class="margin-bottom-15">
						<b>Keterangan :</b>
					</h4>

					<div class="row">
						<div class="col-md-12 margin-bottom-15">
							<label for="keterangan" class="control-label">Keterangan SPT</label>
							<textarea class="form-control margin-bottom-15" rows="3" placeholder="Keterangan SPT" name="keterangan" id="keterangan" required></textarea>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 margin-bottom-15">
							<label for="tanggalSPT" class="control-label">Tanggal Keluar SPT</label>
							<input class="form-control readonly tanggal" type="text" name="tanggalSPT" id="tanggalSPT" placeholder="Tanggal Keluar SPT" required>
						</div>
						
						<div class="col-md-6 margin-bottom-15">
							<label for="dikeluarkan" class="control-label">Dikeluarkan di Kota</label>
							<input class="form-control" type="text" name="dikeluarkan" id="dikeluarkan" placeholder="Dikeluarkan di Kota" required>
						</div>
					</div>

					<div class="row">
							<div class="col-md-6 margin-bottom-15">
							<label for="statusKadin" class="control-label">Status Kepala Dinas</label>
							<select class="form-control" name="statusKadin" id="statusKadin" required>
								<option value="">Pilih Status Kepala Dinas</option>
								<option value="PLT">PLT</option>
								<option value="PLH">PLH</option>
							</select>
						</div>

						<div class="col-md-6 margin-bottom-15">
							<label for="penandatanganSPT" class="control-label">NIP Penandatangan</label>
							<select class="form-control" name="penandatanganSPT" id="penandatanganSPT" required>
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
var tanggal = {};
<?php
	while($berangkat = $stmt->fetch_object()) {
		$tglBerangkat = $berangkat->tanggalBerangkat;
		echo "tanggal['" . $tglBerangkat . "'] = {};";
		$sql = "SELECT DISTINCT tanggalBerakhir FROM jadwal_dinas WHERE tanggalBerangkat='$berangkat->tanggalBerangkat'";
		$query = $conn->query($sql);
		while($berakhir = $query->fetch_object()) {
			$tglBerakhir = $berakhir->tanggalBerakhir;
			echo "var akhir = {};";
			echo "tanggal['" . $tglBerangkat . "']['" . $tglBerakhir . "'] = {};";
			// echo "pegawai = [];";
			$sql = "SELECT * FROM jadwal_dinas WHERE tanggalBerangkat='$tglBerangkat' AND tanggalBerakhir='$tglBerakhir'";
			$query2 = $conn->query($sql);
			$idx = 0;
			$pegawai = array();
			while($row = $query2->fetch_object()) {
				echo "tanggal['" . $tglBerangkat . "']['" . $tglBerakhir . "'].pegawai" . $idx++ . " = '" . $row->nip . "';";
			}

		}
	}
?>

$(document).ready(function() {
	// $('#tanggalDinas').click()
	$('#tanggalDinas').on("change", function() {
		var value = $(this).val();
		value = value.split("-");
		tanggalBerangkat = value[0];
		tanggalBerakhir = value[1];
		var pegawai = tanggal[tanggalBerangkat][tanggalBerakhir];
		for(var i in pegawai) {
			$('#pegawai1, #pegawai2, #pegawai3, #pegawai4').append("<option value='" + pegawai[i] + "'>" + pegawai[i] + "</option");
		}
	});
})

</script>
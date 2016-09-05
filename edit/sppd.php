<?php
include_once("includes/koneksi.php");
include_once("includes/function.php");

$noSPPD = (isset($_GET['noSPPD']) ? $_GET['noSPPD'] : null);
$sql = "SELECT * FROM sppd WHERE noSPPD='$noSPPD'";
$sppd = $conn->query($sql);
$sppd = $sppd->fetch_object();

?>

<div class="templatemo-content-wrapper">
	<div class="templatemo-content">
		<ol class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li>
			<li class="active">SPPD</li>
			<li><a href="index.php?posisi=sppd&type=insert">Input SPPD</a></li>
		</ol>

		<h1>
			<b>Surat Perintah Perjalanan Dinas</b>
		</h1>
		<p class="margin-bottom-15">Form Pengisian Surat Perintah Perjalanan Dinas</p>
		<div class="row">
			<div class="col-md-12">
				<form role="form" id="templatemo-preferences-form" action="proses/editSPPD.php" method="POST">
					<div class="row">
						<div class="col-md-12 margin-bottom-15">
							<label for="noSPPD" class="control-label">Nomor Surat Perintah Perjalanan Dinas</label>
							<input type="text" id="noSPPD" name="noSPPD" class="form-control" placeholder="Nomor Surat Perintah Perjalanan Dinas" value="<?= $sppd->noSPPD; ?>" readonly>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 margin-bottom-15">
							<label for="noSPT" class="control-label">Nomor Surat Perintah Tugas</label>
							<select class="form-control" id="noSPT" name="noSPT" required>
								<option value="">Pilih No SPT</option>
								<?php
									$spt = getSPT("noSPT");
									while($row = $spt->fetch_object()) {
										echo "<option value='" . $row->noSPT . "'>" . $row->noSPT . "</option>";
									}
								?>
							</select>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 margin-bottom-15">
							<label for="kuasaAnggaran" class="control-label">Pengguna Anggaran / Kuasa Pengguna Anggaran</label>
							<select class="form-control" id="kuasaAnggaran" name="kuasaAnggaran" required>
								<option value="">Pilih NIP Pegawai</option>
								<?php
									$result = getPegawai("nip, nama");
									while($row = $result->fetch_object()) {
										echo "<option value='" . $row->nip . "'>" . $row->nip . " - " . $row->nama . "</option>";
									}
								?>
							</select>
						</div>
						<div class="col-md-6 margin-bottom-15">
							<label for="pelaksanaDinas" class="control-label">Pegawai Pelaksana Dinas</label>
							<select class="form-control" id="pelaksanaDinas" name="pelaksanaDinas" required>
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
						<div class="col-md-6 margin-bottom-15">
							<label for="tingkatBiaya" class="control-label">Tingkat Biaya Perjalanan Dinas</label>
							<input type="text" name="tingkatBiaya" id="tingkatBiaya" class="form-control" placeholder="Tingkat Biaya Perjalanan Dinas" value="<?= $sppd->tingkatBiaya; ?>" required>
						</div>
						<div class="col-md-6 margin-bottom-15">
							<label for="transportasi" class="control-label">Alat Angkutan yang Dipergunakan</label>
							<input type="text" name="transportasi" id="transportasi" class="form-control" placeholder="Alat Angkutan yang Dipergunakan" value="<?= $sppd->transportasi; ?>" required>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 margin-bottom-15">
							<label for="tempatBerangkat" class="control-label">Kota Tempat Berangkat</label>
							<input type="text" name="tempatBerangkat" class="form-control" id="tempatBerangkat" placeholder="Kota Tempat Berangkat" value="<?= $sppd->tempatBerangkat; ?>" required>
						</div>

						<div class="col-md-6 margin-bottom-15">
							<label for="tempatTujuan" class="control-label">Kota Tempat Tujuan</label>
							<input type="text" name="tempatTujuan" class="form-control" id="tempatTujuan Tujuan" placeholder="Kota Tempat Tujuan" value="<?= $sppd->tempatTujuan; ?>" required>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 margin-bottom-15">
							<label for="akun" class="control-label">Akun</label>
							<select class="form-control margin-bottom-15" name="akun" id="akun" required>
								<option value="">Pilih Akun</option>
								<option value="dalamDaerah">Belanja Perjalanan Dinas Dalam Daerah</option>
								<option value="luarDaerah">Belanja Perjalanan Dinas Luar Daerah</option>
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
	$(document).ready(function() {
		var spt = "<?= $sppd->noSPT; ?>";
		var kpa = "<?= $sppd->kuasaAnggaran; ?>";
		var pelaksanaDinas = "<?= $sppd->pelaksanaDinas; ?>";
		var akun = "<?= $sppd->akun; ?>";

		$('#noSPT').val(spt);
		$('#kuasaAnggaran').val(kpa);
		$('#pelaksanaDinas').val(pelaksanaDinas);
		$('#akun').val(akun);
	});
</script>
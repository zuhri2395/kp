<?php
$noSBP = (isset($_GET['noSBP']) ? $_GET['noSBP'] : null);
$sql = "SELECT * FROM buktipengeluaran WHERE noSBP='$noSBP'";
$sbp = $conn->query($sql);
$sbp = $sbp->fetch_object();

?>

<div class="templatemo-content-wrapper">
	<div class="templatemo-content">
		<ol class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li>
			<li><a href="index.php?posisi=buktipengeluaran">Bukti Pengeluaran</a></li>
			<li class="active">Input Bukti Pengeluaran</li>
		</ol>

		<h1>
			<b>Bukti Pengeluaran</b>
		</h1>
		<p class="margin-bottom-15">Form Pengisian Bukti Pengeluaran</p>
		<div class="row">
			<div class="col-md-12">
				<form role="form" id="templatemo-preferences-form" action="proses/editSBP.php" method="POST">
					<div class="row">
						<div class="col-md-6 margin-bottom-15">
							<label for="noSBP" class="control-label">Nomor Surat Bukti Pengeluaran</label>
							<input type="text" name="noSBP" class="form-control" id="noSBP" placeholder="Nomor Surat Bukti Pengeluaran" value="<?= $sbp->noSBP; ?>" readonly>
						</div>

						<div class="col-md-6 margin-bottom-15">
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
							<label for="tahunAnggaran" class="control-label">Tahun Anggaran</label>
							<input type="text" name="tahunAnggaran" id="tahunAnggaran" class="form-control" placeholder="Tahun Anggaran" value="<?= $sbp->tahunAnggaran; ?>" required>
						</div>

						<div class="col-md-6 margin-bottom-15">
							<label for="tanggalInventaris" class="control-label">Tanggal Inventaris</label>
							<input type="text" name="tanggalInventaris" id="tanggalInventaris" class="form-control tanggal readonly" placeholder="Tanggal Inventaris" value="<?= $sbp->tanggalInventaris; ?>" required>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 margin-bottom-15">
							<label for="jumlahUang" class="control-label">Uang Sejumlah</label>
							<input type="text" name="jumlahUang" id="jumlahUang" class="form-control" placeholder="Uang Sejumlah" value="<?= $sbp->jumlahUang; ?>" required>
						</div>

						<div class="col-md-6 margin-bottom-15">
							<label for="untukPembayaran" class="control-label">Untuk Pembayaran</label>
							<input type="text" name="untukPembayaran" id="untukPembayaran" class="form-control" placeholder="Untuk Pembayaran" value="<?= $sbp->untukPembayaran; ?>" required>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 margin-bottom-15">
							<label for="rekening" class="control-label">Nomor Rekening</label>
							<select class="form-control" id="rekening" name="rekening" required>
								<option value="">Pilih No Rekening</option>
								<?php
									$spt = getRekening("noRekening, judul");
									while($row = $spt->fetch_object()) {
										echo "<option value='" . $row->noRekening . "'>" . $row->noRekening . " - " . $row->judul . "</option>";
									}
								?>
							</select>
						</div>

						<div class="col-md-6 margin-bottom-15">
							<label for="tipePajak" class="control-label">Tipe Pajak</label>
							<select class="form-control" id="tipePajak" name="tipePajak" required>
								<option value="">Pilih Tipe Pajak</option>
								<option value="honor">Pajak Honor</option>
								<option value="belanja">Pajak Belanja</option>
							</select>
						</div>
					</div>

					<div class="row" id="optHide">
						<div class="col-md-12 margin-bottom-15" hidden>
							<label for="pegawaiPajak" class="control-label">Pajak Honor Pegawai</label>
							<select class="form-control" name="pegawaiPajak" id="pegawaiPajak" required disabled>
								<option value="">Pilih NIP Pegawai</option>
								<?php
									$result = getPegawai("nip, nama");
									while($row = $result->fetch_object()) {
										echo "<option value='" . $row->nip . "'>" . $row->nip . " - " . $row->nama . "</option>";
									}
								?>
							</select>
						</div>

						<div class="col-md-6 margin-bottom-15" hidden>
							<label for="tipeBelanja" class="control-label">Tipe Belanja</label>
							<select class="form-control" id="tipeBelanja" name="tipeBelanja" required disabled>
								<option value="">Pilih Tipe Belanja</option>
								<option value="barang">Belanja Barang</option>
								<option value="non barang">Belanja Non Barang</option>
							</select>
						</div>

						<div class="col-md-6 margin-bottom-15" hidden>
							<label for="jumlahBelanja" class="control-label">Jumlah Belanja</label>
							<input type="text" name="jumlahBelanja" id="jumlahBelanja" class="form-control" placeholder="jumlahBelanja" value="<?= $sbp->jumlahBelanja; ?>" required disabled>
						</div>
					</div>

					<h4 class="margin-bottom-15">
						<b>Pegawai</b>
					</h4>

					<div class="row">
						<div class="col-md-6 margin-bottom-15">
							<label for="penerimaPembayaran" class="control-label">Yang Berhak Menerima Pembayaran</label>
							<input type="text" name="penerimaPembayaran" id="penerimaPembayaran" class="form-control" placeholder="Yang Berhak Menerima Pembayaran" value="<?= $sbp->penerimaPembayaran; ?>" required>
						</div>

						<div class="col-md-6 margin-bottom-15">
							<label for="penerimaBarang" class="control-label">Yang Menerima Barang/Memeriksa Pekerjaan</label>
							<input type="text" name="penerimaBarang" id="penerimaBarang" class="form-control" placeholder="Yang Menerima Barang/Memeriksa Pekerjaan" value="<?= $sbp->penerimaBarang; ?>" required>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 margin-bottom-15">
							<label for="bendaharaPengeluaran" class="control-label">NIP Bendahara Pengeluaran</label>
							<select class="form-control" name="bendaharaPengeluaran" id="bendaharaPengeluaran" required>
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
							<label for="kuasaAnggaran" class="control-label">NIP Kuasa Pengguna Anggaran/Pengguna Anggaran</label>
							<select class="form-control" name="kuasaAnggaran" id="kuasaAnggaran" required>
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
							<label for="nipPA" class="control-label">NIP PA/KPA atau an PA/KPA PPTK</label>
							<select class="form-control" name="nipPA" id="nipPA" required>
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
	$(document).ready(function() {
		$('#tipePajak').on("change", function() {
			var value = $(this).val();
			var pegawaiPajak = $('#pegawaiPajak');
			var tipeBelanja = $('#tipeBelanja');
			var jumlahBelanja = $('#jumlahBelanja');

			if(value == "honor") {
				pegawaiPajak.parent().show();
				pegawaiPajak.removeAttr("disabled");

				tipeBelanja.parent().hide();
				jumlahBelanja.parent().hide();
				tipeBelanja.attr("disabled", true);
				jumlahBelanja.attr("disabled", true);
			} else if(value == "belanja") {
				tipeBelanja.parent().show();
				jumlahBelanja.parent().show();
				tipeBelanja.removeAttr("disabled");
				jumlahBelanja.removeAttr("disabled");

				pegawaiPajak.parent().hide();
				pegawaiPajak.attr("disabled", true);
			} else {
				pegawaiPajak.parent().hide();
				tipeBelanja.parent().hide();
				jumlahBelanja.parent().hide();
				pegawaiPajak.attr("disabled", true);
				tipeBelanja.attr("disabled", true);
				jumlahBelanja.attr("disabled", true);
			}
		});

		$('#noSPT').val("<?= $sbp->noSPT; ?>");
		$('#rekening').val("<?= $sbp->rekening; ?>");
		$('#tipePajak').val("<?= $sbp->tipePajak; ?>");
		$('#pegawaiPajak').val("<?= $sbp->pegawaiPajak; ?>");
		$('#tipeBelanja').val("<?= $sbp->tipeBelanja; ?>");
		$('#bendaharaPengeluaran').val("<?= $sbp->bendaharaPengeluaran; ?>");
		$('#kuasaAnggaran').val("<?= $sbp->kuasaAnggaran; ?>");
		$('#nipPA').val("<?= $sbp->nipPA; ?>")
		$('#tipePajak').trigger("change");
	});
</script>
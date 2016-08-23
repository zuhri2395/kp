<?php
// require_once '../koneksi.php';

// if((isset($_SESSION['username']) && isset($_SESSION['login'])) == false) {
	// header('location:../login.php');
// } else {
	
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
		<p class="margin-bottom-15">Form pengisian surat perintah tugas</p>
		<div class="row">
			<div class="col-md-12">
				<form role="form" id="templatemo-preferences-form">
					<!-- No Surat Section Start-->
					<div class="row">
						<div class="col-md-12 margin-bottom-15">
							<label for="noSPT" class="control-label">Nomor Surat Perintah Tugas</label>
							<input type="text" class="form-control" name="nomorSPT" placeholder="No Surat Perintah Tugas">
						</div>
					</div>

					<h4 class="margin-bottom-15">
						<b>Berdasarkan :</b>
					</h4>

					<div class="row">
						<!-- Nomor Peraturan Gubernur -->
						<div class="col-md-6 margin-bottom-15">
							<label for="nomorPeraturanGubernur" class="control-label">Nomor Peraturan Gubernur</label>
							<select class="form-control margin-bottom-15" name="nomorPeraturanGubernur">
								<option value="">Pilih No Peraturan Gubernur</option>
							</select>
						</div>

						<!-- Nomor Dokumen Penyedia Anggaran -->
						<div class="col-md-6 margin-bottom-15">
							<label for="nomorDPA" class="control-label">Nomor Dokumen Penyedia Anggaran</label>
							<select class="form-control margin-bottom-15" name="nomorDPA">
								<option value="">Pilih No DPA-SKPD</option>
							</select>
						</div>
					</div>

					<div class="row">
						<!-- Nomor SPD -->
						<div class="col-md-12 margin-bottom-15">
							<label for="nomorSPD" class="control-label">No SPD</label>
							<select class="form-control margin-bottom-15" name="nomorSPD">
								<option value="">Pilih No SPD-SKPD</option>
							</select>
						</div>
					</div>

					<h4 class="margin-bottom-15">
						<b>Memerintahkan :</b>
					</h4>

					<div class="row">
						<div class="col-md-6 margin-bottom-15">
							<label for="tanggalDinas" class="control-label">Tanggal Perjalanan Dinas</label>
							<select class="form-control margin-bottom-15" name="tanggalDinas">
								<option value="">Pilih Tanggal Perjalanan Dinas</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</div>

						<div class="col-md-6 margin-bottom-15">
							<label for="jumlahPegawai" class="control-label">Jumlah Pegawai</label>
							<select class="form-control margin-bottom-15">
								<option value="">Pilih Jumlah Pegawai</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="4">4</option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 margin-bottom-15">
							<label for="pegawai1" class="control-label">Pegawai 1</label>
							<select class="form-control margin-bottom-15" name="nip1">
								<option value="">Pilih NIP Pegawai</option>
							</select>
						</div>
						<div class="col-md-6 margin-bottom-15">
							<label for="pegawai2" class="control-label">Pegawai 2</label>
							<select class="form-control margin-bottom-15" name="nip2">
								<option value="">Pilih NIP Pegawai</option>
							</select>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 margin-bottom-15">
							<label for="pegawai3" class="control-label">Pegawai 3</label>
							<select class="form-control margin-bottom-15" name="nip3">
								<option value="">Pilih NIP Pegawai</option>
							</select>
						</div>
						<div class="col-md-6 margin-bottom-15">
							<label for="pegawai4" class="control-label">Pegawai 4</label>
							<select class="form-control margin-bottom-15" name="nip4">
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
							<textarea class="form-control margin-bottom-15" rows="3" placeholder="Keterangan SPT" name="keterangan"></textarea>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 margin-bottom-15">
							<label for="tanggalSPT" class="control-label">Tanggal Keluar SPT</label>
							<input class="form-control" type="text" name="tanggalSPT" placeholder="Tanggal Keluar SPT">
						</div>
						
						<div class="col-md-6 margin-bottom-15">
							<label for="dikeluarkan" class="control-label">Dikeluarkan di Kota</label>
							<input class="form-control" type="text" name="dikeluarkan" placeholder="Dikeluarkan di Kota">
						</div>
					</div>

					<div class="row">
							<div class="col-md-6 margin-bottom-15">
							<label for="statusKadin" class="control-label">Status Kepala Dinas</label>
							<select class="form-control" name="statusKadin">
								<option value="">Pilih Status Kepala Dinas</option>
							</select>
						</div>

						<div class="col-md-6 margin-bottom-15">
							<label for="penandatanganSPT" class="control-label">NIP Penandatangan</label>
							<select class="form-control" name="penandatanganSPT">
								<option value="">Pilih NIP Pegawai</option>
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

<?php //} ?>
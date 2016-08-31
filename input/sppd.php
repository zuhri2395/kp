<div class="templatemo-content-wrapper">
	<div class="templatemo-content">
		<ol class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li>
			<li class="active">SPPD</li>
			<li><a href="index.php?posisi=sppd&type=insert">Input SPPD</a></li>
		</ol>

		<h1>
			<b>Surat Perintah Tugas</b>
		</h1>
		<p class="margin-bottom-15">Form Pengisian Surat Perintah Perjalanan Dinas</p>
		<div class="row">
			<div class="col-md-12">
				<form role="form" id="templatemo-preferences-form">
					<div class="row">
						<div class="col-md-12 margin-bottom-15">
							<label for="noSPPD" class="control-label">Nomor Surat Perintah Perjalanan Dinas</label>
							<input type="text" id="noSPPD" name="noSPPD" class="form-control" placeholder="Nomor Surat Perintah Perjalanan Dinas" required>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 margin-bottom-15">
							<label for="noSPT" class="control-label">Nomor Surat Perintah Tugas</label>
							<input type="text" id="noSPT" name="noSPT" class="form-control" placeholder="Nomor Surat Tugas" required>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 margin-bottom-15">
							<label for="kuasaAnggaran" class="control-label">Pengguna Anggaran / Kuasa Pengguna Anggaran</label>
							<select class="form-control" id="kuasaAnggaran" name="kuasaAnggaran" required>
								<option value="">Pilih NIP Pegawai</option>
							</select>
						</div>
						<div class="col-md-6 margin-bottom-15">
							<label for="pelaksanaDinas" class="control-label">Pegawai Pelaksana Dinas</label>
							<select class="form-control" id="pelaksanaDinas" name="pelaksanaDinas" required>
								<option value="">Pilih NIP Pegawai</option>
							</select>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 margin-bottom-15">
							<label for="tingkatBiaya" class="control-label">Tingkat Biaya Perjalanan Dinas</label>
							<input type="text" name="tingkatBiaya" id="tingkatBiaya" class="form-control" placeholder="Tingkat Biaya Perjalanan Dinas" required>
						</div>
						<div class="col-md-6 margin-bottom-15">
							<label for="transportasi" class="control-label">Alat Angkutan yang Dipergunakan</label>
							<input type="text" name="transportasi" id="transportasi" class="form-control" placeholder="Alat Angkutan yang Dipergunakan" required>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 margin-bottom-15">
							<label for="tempatBerangkat" class="control-label">Kota Tempat Berangkat</label>
							<input type="text" name="tempatBerangkat" class="form-control" id="tempatBerangkat" placeholder="Kota Tempat Berangkat" required>
						</div>

						<div class="col-md-6 margin-bottom-15">
							<label for="tempatTujuan" class="control-label">Kota Tempat Tujuan</label>
							<input type="text" name="tempatTujuan" class="form-control" id="tempatTujuan Tujuan" placeholder="Kota Tempat Tujuan" required>
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

				</form>
			</div>
		</div>
	</div>
</div>
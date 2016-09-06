<div class="templatemo-content-wrapper">
	<div class="templatemo-content">
		<ol class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li>
			<li><a href="index.php?posisi=rincianbiaya">Rincian Biaya</a></li>
			<li class="active">Input Rincian Biaya</li>
		</ol>

		<h1>
			<b>Rincian Biaya Pengeluaran</b>
		</h1>
		<p class="margin-bottom-15">Form Pengisian Rincian Biaya Pengeluaran</p>
		<div class="row">
			<div class="col-md-12">
				<form role="form" id="templatemo-preferences-form" action="proses/inputRBP.php" method="POST">
					<div class="row">
						<div class="col-md-12 margin-bottom-15">
							<label for="noSPPD" class="control-label">Nomor Surat Perintah Perjalanan Dinas</label>
							<select class="form-control" id="noSPPD" name="noSPPD" required>
								<option value="">Pilih No SPPD</option>
								<?php
								$result = getSPPD();
								while($row = $result->fetch_object()) {
									echo "<option value='" . $row->noSPPD . "'>" . $row->noSPPD . "</option>";
								}
								?>
							</select>
						</div>
					</div>

					<h4 class="margin-bottom-15">
						<b>Perincian Biaya</b>
					</h4>

					<div class="row">
						<div class="col-md-6 margin-bottom-15">
							<label for="hariUangHarian" class="control-label">Jumlah Hari (Uang Harian)</label>
							<input type="text" name="hariUangHarian" id="hariUangHarian" class="form-control" placeholder="Jumlah Hari (Uang Harian)" required>
						</div>

						<div class="col-md-6 margin-bottom-15">
							<label for="biayaUangHarian" class="control-label">Biaya per Hari (Uang Harian)</label>
							<input type="text" name="biayaUangHarian" id="biayaUangHarian" class="form-control" placeholder="Biaya per Hari (Uang Harian)" required>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 margin-bottom-15">
							<label for="biayaTransport" class="control-label">Biaya BBM/Tiket/Transportasi</label>
							<input type="text" name="biayaTransport" id="biayaTransport" class="form-control" placeholder="Biaya BBM/Tiket/Transportasi" required>
						</div>

						<div class="col-md-6 margin-bottom-15">
							<label for="biayaPenginapan" class="control-label">Biaya Penginapan</label>
							<input type="text" name="biayaPenginapan" id="biayaPenginapan" class="form-control" placeholder="Biaya Penginapan" required>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 margin-bottom-15">
							<label for="hariSewa" class="control-label">Jumlah Hari (Sewa Mobil)</label>
							<input type="text" name="hariSewaMobil" id="hariSewaMobil" class="form-control" placeholder="Jumlah Hari (Sewa Mobil)" required>
						</div>

						<div class="col-md-6 margin-bottom-15">
							<label for="biayaSewa" class="control-label">Biaya per Hari (Sewa Mobil)</label>
							<input type="text" name="biayaSewa" id="biayaSewa" class="form-control" placeholder="Biaya per Hari (Sewa Mobil)" required>
						</div>
					</div>

					<h4 class="margin-bottom-15">
						<b>Pegawai</b>
					</h4>

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
							<label for="penerima" class="control-label">NIP Penerima</label>
							<select class="form-control" name="penerima" id="penerima" required>
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
							<label for="pelaksanaKegiatan" class="control-label">NIP Pelaksana Teknis Kegiatan</label>
							<select class="form-control" name="pelaksanaKegiatan" id="pelaksanaKegiatan" required>
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
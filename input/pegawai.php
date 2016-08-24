<div class="templatemo-content-wrapper">
	<div class="templatemo-content">
		<ol class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li>
			<li><a href="index.php?posisi=pegawai">Pegawai</a></li>
			<li class="active">Input Pegawai</li>
		</ol>

		<h1>
			<b>Pegawai</b>
		</h1>

		<p class="margin-bottom-15">Form pengisian daftar pegawai</p>
		<div class="row">
			<div class="col-md-12">
				<form role="form" id="templatemo-preferences-form" action="proses/pegawai.php" method="POST">
					<div class="row">
						<div class="col-md-12 margin-bottom-15">
							<label for="nip" class="control-label">Nomor Induk Pegawai</label>
							<input type="text" class="form-control" name="nip" id="nip" placeholder="No Induk Pegawai" required>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 margin-bottom-15">
							<label for="nama" class="control-label">Nama Pegawai</label>
							<input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Pegawai" required>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 margin-bottom-15">
							<label for="pangkat" class="control-label">Pangkat</label>
							<select class="form-control margin-bottom-15" name="pangkat" id="pangkat" required>
								<option value="">Pilih Pangkat Pegawai</option>
								<option value="Juru Muda">Juru Muda</option>
								<option value="Juru Muda TK.1">Juru Muda TK.1</option>
								<option value="Juru">Juru</option>
								<option value="Juru TK.1">Juru TK.1</option>
								<option value="Pengatur Muda">Pengatur Muda</option>
								<option value="Pengatur Muda TK.1">Pengatur Muda TK.1</option>
								<option value="Pengatur">Pengatur</option>
								<option value="Pengatur TK.1">Pengatur TK.1</option>
								<option value="Penata Muda">Penata Muda</option>
								<option value="Penata Muda TK.1">Penata Muda TK.1</option>
								<option value="Penata">Penata</option>
								<option value="Penata TK.1">Penata TK.1</option>
								<option value="Pembina">Pembina</option>
								<option value="Pembina TK.1">Pembina TK.1</option>
								<option value="Pembina Utama Muda">Pembina Utama Muda</option>
								<option value="Pembina Utama Madya">Pembina Utama Madya</option>
								<option value="Pembina Utama">Pembina Utama</option>
							</select>
						</div>

						<div class="col-md-6 margin-bottom-15">
							<label for="golongan" class="control-label">Golongan</label>
							<select class="form-control margin-bottom-15" name="golongan" id="golongan" required>
								<option value="">Pilih Golongan Pegawai</option>
								<option value="I/a">I/a</option>
								<option value="I/b">I/b</option>
								<option value="I/c">I/c</option>
								<option value="I/d">I/d</option>
								<option value="II/a">II/a</option>
								<option value="II/b">II/b</option>
								<option value="II/c">II/c</option>
								<option value="II/d">II/d</option>
								<option value="III/a">III/a</option>
								<option value="III/b">III/b</option>
								<option value="III/c">III/c</option>
								<option value="III/d">III/d</option>
								<option value="IV/a">IV/a</option>
								<option value="IV/b">IV/b</option>
								<option value="IV/c">IV/c</option>
								<option value="IV/d">IV/d</option>
								<option value="IV/e">IV/e</option>
							</select>
						</div>
					</div>

					<div class="row">
						<div class="col-md-6 margin-bottom-15">
							<label for="jabatan" class="control-label">Jabatan</label>
							<input type="text" class="form-control" name="jabatan" id="jabatan" placeholder="Jabatan Pegawai" required>
						</div>

						<div class="col-md-6 margin-bottom-15">
							<label for="npwp" class="control-label">NPWP</label>
							<select class="form-control margin-bottom-15" name="npwp" id="npwp" required>
								<option value="">Pilih Status Kepemilikan NPWP</option>
								<option value="Iya">Iya</option>
								<option value="Tidak">Tidak</option>
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
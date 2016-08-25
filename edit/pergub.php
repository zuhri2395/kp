<?php
include_once 'includes/koneksi.php';

$noPergub = (isset($_GET['noPergub']) ? $_GET['noPergub'] : null);
$sql = "SELECT * FROM pergub WHERE noPergub='$noPergub'";
$result = $conn->query($sql);
$result = $result->fetch_object();
?>

<div class="templatemo-content-wrapper">
	<div class="templatemo-content">
		<ol class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li>
			<li><a href="index.php?posisi=pergub">Peraturan Gubernur</a></li>
			<li class="active">Input Peraturan Gubernur</li>
		</ol>

		<h1>
			<b>Peraturan Gubernur</b>
		</h1>
		<p class="margin-bottom-15">Form Edit Peraturan Gubernur</p>
		<div class="row">
			<div class="col-md-12">
				<form role="form" id="templatemo-preferences-form" action="proses/editPergub.php" method="POST">
					<div class="row">
						<div class="col-md-12 margin-bottom-15">
							<label for="noPergub" class="control-label">Nomor Peraturan Gubernur</label>
							<input type="text" name="noPergub" id="noPergub" class="form-control" value="<?= $result->noPergub; ?>" readonly>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 margin-bottom-15">
							<label for="keterangan" class="control-label">Keterangan</label>
							<textarea class="form-control" name="keterangan" id="kegiatan" rows="3" placeholder="Kegiatan"><?= $result->keterangan; ?></textarea>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 margin-bottom-15">
							<label for="tanggal" class="control-label">Tanggal</label>
							<input type="text" name="tanggal" id="tanggal" class="form-control readonly tanggal" placeholder="Tanggal" value="<?= $result->tanggal; ?>" required>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 margin-bottom-15">
							<label for="tahun" class="control-label">Tahun</label>
							<input type="text" name="tahun" id="tahun" class="form-control" placeholder="Tahun" value="<?= $result->tahun; ?>" required>
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
<?php
include_once 'includes/koneksi.php';
$noDPA = (isset($_GET['noDPA']) ? $_GET['noDPA'] : null);
$sql = "SELECT * FROM dpa WHERE noDPA='$noDPA'";
$result = $conn->query($sql);
$result = $result->fetch_object();
?>

<div class="templatemo-content-wrapper">
	<div class="templatemo-content">
		<ol class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li>
			<li><a href="index.php?posisi=dpa">DPA</a></li>
			<li class="active">Edit DPA</li>
		</ol>

		<h1>
			<b>Dokumen Pelaksana Anggaran</b>
		</h1>
		<p class="margin-bottom-15">Form edit dokumen pelaksana anggaran</p>
		<div class="row">
			<div class="col-md-12">
				<form role="form" id="templatemo-preferences-form" action="proses/editDPA.php" method="POST">
					<div class="row">
						<div class="col-md-12 margin-bottom-15">
							<label for="noDPA" class="control-label">No. DPA/DPPA/DPAL-SKPD</label>
							<input type="text" name="noDPA" id="noDPA" class="form-control" placeholder="Nomor DPA/DPPA/DPAL-SKPD" value="<?= $result->noDPA ?>" readonly>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 margin-bottom-15">
							<label for="kegiatan" class="control-label">Kegiatan</label>
							<textarea class="form-control" name="kegiatan" id="kegiatan" rows="3" placeholder="Kegiatan"><?= $result->kegiatan ?></textarea>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 margin-bottom-15">
							<label for="tanggal" class="control-label">Tanggal</label>
							<input type="text" name="tanggal" id="tanggal" class="form-control readonly tanggal" placeholder="Tanggal" value="<?= $result->tanggal ?>" required>
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
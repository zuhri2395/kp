<?php
include_once 'includes/koneksi.php';
$nomorRekening = (isset($_GET['nomorRekening']) ? $_GET['nomorRekening'] : null);
$sql = "SELECT * FROM rekening WHERE nomorRekening='$nomorRekening'";
$result = $conn->query($sql);
$result = $result->fetch_object();
?>

<div class="templatemo-content-wrapper">
	<div class="templatemo-content">
		<ol class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li>
			<li><a href="index.php?posisi=rekening">Rekening</a></li>
			<li class="active">Edit Rekening</li>
		</ol>

		<h1 class="margin-bottom-15">
			<b>Rekening</b>
		</h1>
		<p class="margin-bottom-15">Form Edit Data No Rekening</p>
		<div class="row">
			<div class="col-md-12">
				<form role="form" id="templatemo-preferences-form" action="proses/editRekening.php" method="POST">
					<div class="row">
						<div class="col-md-12 margin-bottom-15">
							<label for="nomorRekening" class="control-label">Nomor Rekening</label>
							<input type="text" name="nomorRekening" class="form-control" id="nomorRekening" placeholder="Nomor Rekening" value="<?= $result->nomorRekening; ?>" readonly>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 margin-bottom-15">
							<label for="judul" class="control-label">Judul</label>
							<input type="text" name="judul" id="judul" class="form-control" value="<?= $result->judul; ?>" placeholder="Judul" required>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 margin-bottom-15">
							<label for="uraian" class="control-label">Uraian</label>
							<textarea class="form-control margin-bottom-15" id="uraian" rows="3" placeholder="Uraian" name="uraian" required><?= $result->uraian; ?></textarea>
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
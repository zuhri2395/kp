<?php
include_once 'includes/koneksi.php';
include_once 'includes/function.php';
$no = (isset($_GET['no']) ? $_GET['no'] : null);
$sql = "SELECT * FROM jadwal_dinas WHERE no='$no'";
$result = $conn->query($sql);
$result = $result->fetch_object();
?>

<div class="templatemo-content-wrapper">
	<div class="templatemo-content">
		<ol class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li>
			<li><a href="index.php?posisi=jadwal">Jadwal Dinas</a></li>
			<li class="active">Edit Jadwal Dinas</li>
		</ol>
		<h1>
			<b>Jadwal Penugasan</b>
		</h1>
		<p class="margin-bottom-15">Form Edit Jadwal Penugasan</p>
		<div class="row">
			<div class="col-md-12">
				<form role="form" id="templatemo-preferences-form" action="proses/editJadwal.php" method="POST">
					<div class="row">
						<div class="col-md-12 margin-bottom-15">
							<label for="tanggalBerangkat" class="control-label">Tanggal Perjalanan Dinas</label>
							<input type="text" name="tanggalBerangkat" id="tanggalBerangkat" class="form-control margin-bottom-15 readonly" value="<?= $result->tanggalBerangkat; ?>" required>
							<input type="hidden" name="no" value="<?= $no; ?>">
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 margin-bottom 15">
							<label for="tanggalBerakhir" class="control-label">Tanggal Berakhir Perjalanan Dinas</label>
							<input type="text" name="tanggalBerakhir" id="tanggalBerakhir" class="form-control margin-bottom-15 readonly" value="<?= $result->tanggalBerakhir; ?>" disabled>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 margin-bottom-15">
							<label for="nip" class="control-label">Pegawai</label>
							<select name="nip" id="nip" class="form-control margin-bottom-15">
								<option value="">Pilih NIP Pegawai</option>
								<?php
									$pegawai = getPegawai("nip, nama");
									while($row = $pegawai->fetch_object()) {
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
	function setMinDate(value) {
		$('#tanggalBerakhir').datepicker({
			minDate: value
		});
		$('#tanggalBerakhir').removeAttr('disabled');
		$('#tanggalBerakhir').attr('required', true);
	}

	$(document).ready(function() {
		setMinDate($('#tanggalBerangkat').val());
		var nip = "<?= $result->nip; ?>";
		$('#tanggalBerangkat').datepicker({
				minDate: 0,
				onSelect: function(selected, evnt) {
					$('#tanggalBerakhir').datepicker('destroy');
					setMinDate(selected);
					alert(selected);
				}
		});

		$('#nip').val(nip);
	});
</script>

<?php //} ?>
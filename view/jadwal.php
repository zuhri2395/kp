<?php

$crash = (isset($_SESSION['crash']) ? $_SESSION['crash'] : null);
?>
<div class="templatemo-content-wrapper">
	<div class="templatemo-content">
		<ol class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li>
			<li class="active">Jadwal Dinas</li>
			<li><a href="index.php?posisi=jadwal&type=insert">Input Jadwal Dinas</a></li>
		</ol>

		<h1 class="margin-bottom-15">
			<b>Jadwal Dinas</b>
		</h1>
<!-- 
		<div class="row">
			<div class="col-md-12">
				<h4 class="margin-bottom-15">Rekap Penjadwalan Pegawai</h4>
				<select class="form-control">
					<option value=""></option>
				</select>
			</div>
		</div> -->

		<?php
			if($crash != null) {
				echo "<div class='row'>";
				echo "<div class='col-md-12'>";
				echo "<h4 class='margin-bottom-15'>Pegawai dibawah ini pada penjadwalan tanggal " . $_SESSION['assign'] . " bentrok dengan penjadwalan ditanggal lain</h4>";
				echo "<div class='col-md-6 table-responsive'>";
				echo "<table class='table table-striped table-hover table-bordered'>";
				echo "<tr>";
				echo "<td>No</td>";
				echo "<td>Nama</td>";
				echo "</tr>";
				$no = 1;
				foreach($crash as $nipPegawai) {
					$namaPegawai = retrievePegawai($nipPegawai, "nama")->nama;
					echo "<tr>";
					echo "<td>" . $no++ . "</td>";
					echo "<td>" . $namaPegawai . "</td>";
					echo "</tr>";
				}
				echo "</table>";
				echo "</div>";
				echo "</div>";
				echo "</div>";
				unset($_SESSION['crash']);
			}
		?>

		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<h4 class="margin-bottom-15">Daftar Penjadwalan Tugas</h4>
					<table class="table table-striped table-hover table-bordered">
						<thead>
							<tr>
								<th>NIP</th>
								<th>Nama Pegawai</th>
								<th>Tanggal Berangkat</th>
								<th>Tanggal Kembali</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$result = getJadwal();
							while($row = $result->fetch_object()) {
								$peg = getPegawai();
								$pegawai = "";
								while($list = $peg->fetch_object()) {
									if($list->nip == $row->nip) {
										$pegawai = $list->nama;
										break;
									}
								}
								echo "<tr>";
								echo "<td>" . $row->nip . "</td>";
								echo "<td>" . $pegawai . "</td>";
								echo "<td>" . $row->tanggalBerangkat . "</td>";
								echo "<td>" . $row->tanggalBerakhir . "</td>";
								echo "<td>";
								echo "<div class='btn-group'>";
								echo "<button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>Aksi ";
								echo "<span class='caret'></span>";
								echo "<span class='sr-only'>Toggle Dropdown</span>";
								echo "</button>";
								echo "<ul class='dropdown-menu' roles='menu'>";
								echo "<li><a href='index.php?posisi=jadwal&type=edit&no=" . $row->no . "'>Edit</a></li>";
								echo "<li>";
								echo "<form action='proses/deleteJadwal.php' method='POST'>";
								echo "<input type='hidden' name='no' value='" . $row->no . "'/>";
								echo "<button class='tombol-drop' type='submit'>Delete</button>";
								echo "</form>";
								echo "</li>";
								echo "</ul>";
								echo "</div>";
								echo "</tr>";
							}
						?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
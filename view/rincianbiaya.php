<div class="templatemo-content-wrapper">
	<div class="templatemo-content">
		<ol class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li>
			<li class="active">Rincian Biaya</li>
			<li><a href="index.php?posisi=rincianbiaya&type=insert">Input Rincian Biaya</a></li>
		</ol>

		<h1 class="margin-bottom-15">
			<b>Rincian Biaya Pengeluaran</b>
		</h1>

		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<h4 class="margin-bottom-15">Daftar Surat Rincian Biaya Pengeluaran</h4>
					<table class="table table-striped table-hover table-bordered text-center">
						<thead>
							<tr>
								<th class="text-center">No SPPD</th>
								<th class="text-center">Bendahara Pengeluaran</th>
								<th class="text-center">Penerima</th>
								<th class="text-center">Kuasa Anggaran</th>
								<th class="text-center">Pelaksana Kegiatan</th
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$rbp = getRBP();
							while($row = $rbp->fetch_object()) {
								echo "<tr>";
								echo "<td>" . $row->noSPPD . "</td>";
								echo "<td>" . retrieve($row->bendaharaPengeluaran, "nama")->nama . "</td>";
								echo "<td>" . retrieve($row->penerima, "nama")->nama . "</td>";
								echo "<td>" . retrieve($row->kuasaAnggaran, "nama")->nama . "</td>";
								echo "<td>" . retrieve($row->pelaksanaAnggaran, "nama")->nama . "</td>";
								echo "<td>";
								echo "<div class='btn-group'>";
								echo "<button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>Aksi ";
								echo "<span class='caret'></span>";
								echo "<span class='sr-only'>Toggle Dropdown</span>";
								echo "</button>";
								echo "<ul class='dropdown-menu' roles='menu'>";
								echo "<li><a href='index.php?posisi=rincianbiaya&type=edit&no=" . $row->no . "'>Edit</a></li>";
								echo "<li>";
								echo "<form action='proses/deleteRBP.php' method='POST'>";
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
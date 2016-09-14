<div class="templatemo-content-wrapper">
	<div class="templatemo-content">
		<ol class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li>
			<li class="active">Bukti Pengeluaran</li>
			<li><a href="index.php?posisi=buktipengeluaran&type=insert">Input Bukti Pengeluaran</a></li>
		</ol>

		<h1 class="margin-bottom-15">
			<b>Bukti Pengeluaran</b>
		</h1>

		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<h4 class="margin-bottom-15">Daftar Bukti Pengeluaran</h4>
					<table class="table table-striped table-hover table-bordered text-center">
						<thead>
							<tr>
								<th class="text-center">No Surat</th>
								<th class="text-center">No SPT</th>
								<th class="text-center">Tanggal Inventaris</th>
								<th class="text-center">Tipe Pajak</th>
								<th class="text-center">Jumlah Uang</th>
								<th class="text-center">Penerima Pembayaran</th>
								<th class="text-center">Penerima Barang</th>
								<th class="text-center">Bendahara</th>
								<th class="text-center">Kuasa Anggaran</th>
								<th class="text-center">PA/KPA</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$result = getSBP();
							while($row = $result->fetch_object()) {
								echo "<tr>";
								echo "<td>" . $row->noSBP . "</td>";
								echo "<td>" . $row->noSPT . "</td>";
								echo "<td>" . $row->tanggalInventaris . "</td>";
								echo "<td>" . $row->tipePajak . "</td>";
								echo "<td>" . $row->jumlahUang . "</td>";
								echo "<td>" . $row->penerimaPembayaran . "</td>";
								echo "<td>" . $row->penerimaBarang . "</td>";
								echo "<td>" . retrievePegawai($row->bendaharaPengeluaran, "nama")->nama . "</td>";
								echo "<td>" . retrievePegawai($row->kuasaAnggaran, "nama")->nama . "</td>";
								echo "<td>" . retrievePegawai($row->nipPA, "nama")->nama . "</td>";
								
								echo "<td>";
								echo "<div class='btn-group'>";
								echo "<button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>Aksi ";
								echo "<span class='caret'></span>";
								echo "<span class='sr-only'>Toggle Dropdown</span>";
								echo "</button>";
								echo "<ul class='dropdown-menu' roles='menu'>";

								//VIEW
								echo "<li>";
								echo "<form action='pdf/sbp.php' method='POST'>";
								echo "<input type='hidden' name='noSBP' value='" . $row->noSBP . "'/>";
								echo "<button class='tombol-drop' type='submit'>View</button>";
								echo "</form>";
								echo "</li>";

								//EDIT
								echo "<li><a href='index.php?posisi=buktipengeluaran&type=edit&noSBP=" . $row->noSBP . "'>Edit</a></li>";

								//DELETE
								echo "<li>";
								echo "<form action='proses/deleteSBP.php' method='POST'>";
								echo "<input type='hidden' name='noSBP' value='" . $row->noSBP . "'/>";
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
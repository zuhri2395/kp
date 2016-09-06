<div class="templatemo-content-wrapper">
	<div class="templatemo-content">
		<ol class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li>
			<li class="active">SPPD</li>
			<li><a href="index.php?posisi=sppd&type=insert">Input SPPD</a></li>
		</ol>

		<h1 class="margin-bottom-15">
			<b>Surat Perintah Perjalanan Dinas</b>
		</h1>

		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<h4 class="margin-bottom-15">Daftar Surat Perintah Perjalanan Dinas</h4>
					<table class="table table-striped table-hover table-bordered text-center">
						<thead>
							<tr>
								<th class="text-center">No SPPD</th>
								<th class="text-center">Pelaksana Dinas</th>
								<th class="text-center">Transportasi</th>
								<th class="text-center">Tempat Berangkat</th>
								<th class="text-center">Tempat Tujuan</th>
								<th class="text-center">Tanggal Berangkat</th>
								<th class="text-center">Tanggal Kembali</th>
								<th class="text-center">Keterangan Lain</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$sppd = getSPPD();
							while($row = $sppd->fetch_object()) {
								@$sql = "SELECT tanggalDinas FROM spt WHERE noSPT='$row->noSPT'";
								@$tgl = $conn->query($sql);
								@$tgl = $tgl->fetch_object();
								@$tgl = explode("-", $tgl->tanggalDinas);

								echo "<tr>";
								echo "<td>" . $row->noSPPD . "</td>";
								echo "<td>" . $row->pelaksanaDinas . "</td>";
								echo "<td>" . $row->transportasi . "</td>";
								echo "<td>" . $row->tempatBerangkat . "</td>";
								echo "<td>" . $row->tempatTujuan . "</td>";
								echo "<td>" . $tgl[0] . "</td>";
								echo "<td>" . $tgl[1] . "</td>";
								echo "<td>" . $row->noSPT . "</td>";
								echo "<td>";
								echo "<div class='btn-group'>";
								echo "<button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>Aksi ";
								echo "<span class='caret'></span>";
								echo "<span class='sr-only'>Toggle Dropdown</span>";
								echo "</button>";
								echo "<ul class='dropdown-menu' roles='menu'>";
								echo "<li><a href='index.php?posisi=sppd&type=edit&noSPPD=" . $row->noSPPD . "'>Edit</a></li>";
								echo "<li>";
								echo "<form action='proses/deleteSPPD.php' method='POST'>";
								echo "<input type='hidden' name='noSPPD' value='" . $row->noSPPD . "'/>";
								echo "<button class='tombol-drop' type='submit'>Delete</button>";
								echo "</form>";
								echo "</li>";
								echo "</ul>";
								echo "</div>";
								echo "</tr>";
							}
							?>
							<!-- <tr>
								<td>1</td>
								<td>1</td>
								<td>1</td>
								<td>1</td>
								<td>1</td>
								<td>1</td>
								<td>1</td>
								<td>1</td>
								<td>1</td>
							</tr> -->
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
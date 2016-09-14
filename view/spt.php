<div class="templatemo-content-wrapper">
	<div class="templatemo-content">
		<ol class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li>
			<li class="active">SPT</li>
			<li><a href="index.php?posisi=spt&type=insert">Input SPT</a></li>
		</ol>

		<h1 class="margin-bottom-15">
			<b>Surat Perintah Tugas</b>
		</h1>

		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<h4 class="margin-bottom-15">Daftar Surat Perintah Tugas</h4>
					<table class="table table-striped table-hover table-bordered text-center">
						<thead>
							<tr>
								<th class="text-center">No Surat</th>
								<th class="text-center">Tanggal Keluar SPT</th>
								<th class="text-center">No DPA</th>
								<th class="text-center">No SPD</th>
								<th class="text-center">NIP Pegawai</th>
								<th class="text-center">Keterangan SPT</th>
								<th class="text-center">Lokasi SPT dikeluarkan</th>
								<th class="text-center">Penandatangan</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$result = getSPT();
							while($row = $result->fetch_object()) {
								$decodeNIP = json_decode($row->nip);
								echo "<tr>";
								echo "<td>" . $row->noSPT . "</td>";
								echo "<td>" . $row->tanggalSPT . "</td>";
								echo "<td>" . $row->noDPA . "</td>";
								echo "<td>" . $row->noSPD . "</td>";
								echo "<td>";
								foreach($decodeNIP as $nip) {
									$query = "SELECT nama FROM pegawai WHERE nip='$nip'";
									$query = $conn->query($query);
									$query = $query->fetch_object();
									echo $query->nama;
									echo "<br>";
								}
								echo "</td>";
								echo "<td>" . $row->keterangan . "</td>";
								echo "<td>" . $row->kotaSPT . "</td>";
								$query = "SELECT nama FROM pegawai WHERE nip='$row->penandatanganSPT'";
								$query = $conn->query($query);
								$query = $query->fetch_object();
								echo "<td>" . $query->nama . "</td>";
								echo "<td>";
								echo "<div class='btn-group'>";
								echo "<button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>Aksi ";
								echo "<span class='caret'></span>";
								echo "<span class='sr-only'>Toggle Dropdown</span>";
								echo "</button>";
								echo "<ul class='dropdown-menu' roles='menu'>";

								//View
								echo "<li>";
								echo "<form action='pdf/spt.php' method='POST'>";
								echo "<input type='hidden' name='noSPT' value='" . $row->noSPT . "'/>";
								echo "<button class='tombol-drop' type='submit'>View</button>";
								echo "</form>";
								echo "</li>";

								//Edit
								echo "<li><a href='index.php?posisi=spt&type=edit&noSPT=" . $row->noSPT . "'>Edit</a></li>";

								//Delete
								echo "<li>";
								echo "<form action='proses/deleteSPT.php' method='POST'>";
								echo "<input type='hidden' name='noSPT' value='" . $row->noSPT . "'/>";
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
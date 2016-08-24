<div class="templatemo-content-wrapper">
	<div class="templatemo-content">
		<ol class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li>
			<li class="active">Pegawai</li>
			<li><a href="index.php?posisi=pegawai&type=insert">Input Pegawai</a></li>
		</ol>

		<h1 class="margin-bottom-15">
			<b>Pegawai</b>
		</h1>

		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<h4 class="margin-bottom-15">Daftar Pegawai</h4>
					<table class="table table-striped table-hover table-bordered text-center">
						<thead>
							<tr>
								<th class="text-center">NIP</th>
								<th class="text-center">Nama</th>
								<th class="text-center">Pangkat</th>
								<th class="text-center">Golongan</th>
								<th class="text-center">Jabatan / Instansi</th>
								<th class="text-center">Punya NPWP</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
						<?php
							include_once 'includes/koneksi.php';
							$sql = "SELECT * FROM pegawai";
							$result = $conn->query($sql);
							while($row = $result->fetch_object()) {
								echo "<tr>";
								echo "<td>" . $row->nip . "</td>";
								echo "<td>" . $row->nama . "</td>";
								echo "<td>" . $row->pangkat . "</td>";
								echo "<td>" . $row->golongan . "</td>";
								echo "<td>" . $row->jabatan . "</td>";
								echo "<td>";
								echo "<center><span class='fa " . ($row->npwp == 'Iya' ? 'fa-check-circle' : 'fa-times-circle') . "'></span>" . ($row->npwp == "Iya" ? " Iya" : " Tidak") . "</center>";
								echo "</td>";
								echo "<td>";
								echo "<div class='btn-group'>";
								echo "<button type='button' class='btn btn-info'>Aksi</button>";
								echo "<button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>";
								echo "<span class='caret'></span>";
								echo "<span class='sr-only'>Toggle Dropdown</span>";
								echo "</button>";
								echo "<ul class='dropdown-menu' roles='menu'>";
								echo "<li><a href='index.php?posisi=pegawai&type=edit&nip=" . $row->nip . "'>Edit</a></li>";
								echo "<li><a href='index.php?posisi=pegawai&type=delete&nip=" . $row->nip . "'>Delete</a></li>";
								echo "</ul>";
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
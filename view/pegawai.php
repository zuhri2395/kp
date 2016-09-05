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
							include_once 'includes/function.php';
							
							$sql = "SELECT * FROM pegawai";
							$result = getPegawai();
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
								echo "<button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>Aksi ";
								echo "<span class='caret'></span>";
								echo "<span class='sr-only'>Toggle Dropdown</span>";
								echo "</button>";
								echo "<ul class='dropdown-menu' roles='menu'>";
								echo "<li><a href='index.php?posisi=pegawai&type=edit&nip=" . $row->nip . "'>Edit</a></li>";
								echo "<li>";
								echo "<form action='proses/deletePegawai.php' method='POST'>";
								echo "<input type='hidden' name='nip' value='" . $row->nip . "'/>";
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
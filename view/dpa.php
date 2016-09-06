<div class="templatemo-content-wrapper">
	<div class="templatemo-content">
		<ol class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li>
			<li class="active">DPA</li>
			<li><a href="index.php?posisi=dpa&type=insert">Input DPA</a></li>
		</ol>

		<h1 class="margin-bottom-15">
			<b>Dokumen Pelaksana Anggaran</b>
		</h1>

		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<h4 class="margin-bottom-15">Daftar DPA</h4>
					<table class="table table-striped table-hover table-bordered">
						<thead>
							<tr>
								<th>No. DPA/DPPA/DPAL-SKPD</th>
								<th>Kegiatan</th>
								<th>Tanggal</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$result = getDPA();
							while($row = $result->fetch_object()) {
								echo "<tr>";
								echo "<td>" . $row->noDPA . "</td>";
								echo "<td>" . $row->kegiatan . "</td>";
								echo "<td>" . $row->tanggal . "</td>";
								echo "<td>";
								echo "<div class='btn-group'>";
								echo "<button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>Aksi ";
								echo "<span class='caret'></span>";
								echo "<span class='sr-only'>Toggle Dropdown</span>";
								echo "</button>";
								echo "<ul class='dropdown-menu' roles='menu'>";
								echo "<li><a href='index.php?posisi=dpa&type=edit&nip=" . $row->noDPA . "'>Edit</a></li>";
								echo "<li>";
								echo "<form action='proses/deleteDPA.php' method='POST'>";
								echo "<input type='hidden' name='noDPA' value='" . $row->noDPA . "'/>";
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
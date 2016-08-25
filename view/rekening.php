<div class="templatemo-content-wrapper">
	<div class="templatemo-content">
		<ol class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li>
			<li class="active">Rekening</li>
			<li><a href="index.php?posisi=rekening&type=insert">Input Rekening</a></li>
		</ol>

		<h1 class="margin-bottom-15">
			<b>Rekening</b>
		</h1>

		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<h4 class="margin-bottom-15">Daftar Rekening</h4>
					<table class="table table-striped table-hover table-bordered text-center">
						<thead>
							<tr>
								<th class="text-center">No Rekening</th>
								<th class="text-center">Judul</th>
								<th class="text-center">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							include_once 'includes/koneksi.php';
							$sql = "SELECT * FROM rekening";
							$result = $conn->query($sql);
							while($row = $result->fetch_object()) {
								echo "<tr>";
								echo "<td>" . $row->nomorRekening . "</td>";
								echo "<td>" . $row->judul . "</td>";
								echo "<td>";
								echo "<div class='btn-group'>";
								echo "<button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>Aksi ";
								echo "<span class='caret'></span>";
								echo "<span class='sr-only'>Toggle Dropdown</span>";
								echo "</button>";
								echo "<ul class='dropdown-menu' roles='menu'>";
								echo "<li><a href='index.php?posisi=rekening&type=edit&nomorRekening=" . $row->nomorRekening . "'>Edit</a></li>";
								echo "<li>";
								echo "<form action='proses/deleteRekening.php' method='POST'>";
								echo "<input type='hidden' name='nomorRekening' value='" . $row->nomorRekening . "'/>";
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
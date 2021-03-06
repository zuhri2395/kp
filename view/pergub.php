<div class="templatemo-content-wrapper">
	<div class="templatemo-content">
		<ol class="breadcrumb">
			<li><a href="index.php">Dashboard</a></li>
			<li class="active">Peraturan Gubernur</li>
			<li><a href="index.php?posisi=pergub&type=insert">Input Peraturan Gubernur</a></li>
		</ol>

		<h1 class="margin-bottom-15">
			<b>Peraturan Gubernur</b>
		</h1>

		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<h4 class="margin-bottom-15">Daftar Peraturan Gubernur</h4>
					<table class="table table-striped table-hover table-bordered">
						<thead>
							<tr>
								<th>Nomor</th>
								<th>Keterangan</th>
								<th>Tanggal</th>
								<th>Tahun</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$result = getPergub();
							while($row = $result->fetch_object()) {
								echo "<tr>";
								echo "<td>" . $row->noPergub . "</td>";
								echo "<td>" . $row->keterangan . "</td>";
								echo "<td>" . $row->tanggal . "</td>";
								echo "<td>" . $row->tahun . "</td>";
								echo "<td>";
								echo "<div class='btn-group'>";
								echo "<button type='button' class='btn btn-info dropdown-toggle' data-toggle='dropdown'>Aksi ";
								echo "<span class='caret'></span>";
								echo "<span class='sr-only'>Toggle Dropdown</span>";
								echo "</button>";
								echo "<ul class='dropdown-menu' roles='menu'>";
								echo "<li><a href='index.php?posisi=pergub&type=edit&noPergub=" . $row->noPergub . "'>Edit</a></li>";
								echo "<li>";
								echo "<form action='proses/deletePergub.php' method='POST'>";
								echo "<input type='hidden' name='noPergub' value='" . $row->noPergub . "'/>";
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
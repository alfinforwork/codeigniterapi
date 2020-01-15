<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>CRUD API</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
	<div class="container mt-4">
		<!-- Button Tambah trigger modal -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah">
			Tambah
		</button>

		<!-- Modal Tambah -->
		<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<form class="form-group">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Insert</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">

							<div class="form-group">
								<label for="tambahnama">Nama</label>
								<input type="text" name="tambahnama" id="tambahnama" required class="form-control">
							</div>
							<div class="form-group">
								<label for="tambahemail">Email</label>
								<input type="email" name="tambahemail" id="tambahemail" required class="form-control">
							</div>
							<div class="form-group">
								<label for="tambahpassword">Password</label>
								<input type="text" name="tambahpassword" id="tambahpassword" required class="form-control">
							</div>
							<div class="form-group">
								<label for="role">Role</label>
								<select name="tambahrole" id="tambahrole" class="custom-select">
									<option value="Super Admin">Super Admin</option>
									<option value="Admin">Admin</option>
									<option value="User">User</option>
								</select>
							</div>

						</div>
						<div class="modal-footer">
							<button type="button" type="submit" class="btn btn-primary" id="tambahbtn">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>



		<table class="table table-striped">
			<thead>
				<tr>
					<th>No.</th>
					<th>Nama</th>
					<th>E-mail</th>
					<th>Password</th>
					<th>Create At</th>
					<th>Role</th>
					<th>#</th>
				</tr>
			</thead>
			<tbody>

			</tbody>
		</table>

		<form class="mt-6">
			<h4>
				<center>Edit</center>
			</h4>
			<div class="form-group">
				<label for="idedit">Id</label>
				<input type="text" name="idedit" id="idedit" readonly class="form-control">
			</div>
			<div class="form-group">
				<label for="namaedit">Nama</label>
				<input type="text" name="namaedit" id="namaedit" required class="form-control">
			</div>
			<div class="form-group">
				<label for="emailedit">Email</label>
				<input type="email" name="emailedit" id="emailedit" required class="form-control">
			</div>
			<div class="form-group">
				<label for="passwordedit">Password</label>
				<input type="text" name="passwordedit" id="passwordedit" required class="form-control">
			</div>
			<div class="form-group">
				<label for="roleedit">Role</label>
				<select name="roleedit" id="roleedit" class="custom-select">
					<option value="Super Admin">Super Admin</option>
					<option value="Admin">Admin</option>
					<option value="User">User</option>
				</select>
			</div>
			<button type="button" type="submit" class="btn btn-primary" id="update">Save</button>
		</form>
	</div>












	<!-- Jquery -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.js" type="text/javascript"></script>
	<script type="text/javascript">
		$(document).ready(function() {

			function fetch_data() {
				$.ajax({
					type: 'GET',
					url: '<?php echo base_url() ?>testapi/tampil',
					async: true,
					dataType: 'json',
					success: function(data) {
						var html = '';
						var i;
						for (i = 0; i < data.length; i++) {
							html += '<tr>' +
								'<td>' + data[i].id + '</td>' +
								'<td>' + data[i].nama + '</td>' +
								'<td>' + data[i].email + '</td>' +
								'<td>' + data[i].password + '</td>' +
								'<td>' + data[i].create_at + '</td>' +
								'<td>' + data[i].role + '</td>' +
								'<td style="text-align:right;">' +
								'<a class="btn btn-primary" id="edit" data="' + data[i].id + '">Edit</a>' +
								'<a class="btn btn-primary" id="hapus" data="' + data[i].id + '">Hapus</a>' +
								'</td>' +
								'</tr>';
						}
						$('tbody').html(html);
					}

				});
			}

			$("#tambahbtn").click(function() {
				var nama = $('#tambahnama').val();
				var email = $('#tambahemail').val();
				var password = $('#tambahpassword').val();
				var role = $('#tambahrole').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url() ?>testapi/tambah",
					dataType: "JSON",
					data: {
						nama: nama,
						email: email,
						password: password,
						role: role
					},
					success: function() {
						$('#tambahnama').val("");
						$('#tambahemail').val("");
						$('#tambahpassword').val("");
						$('#tambahrole').val("");
						fetch_data();
					}
				});
				fetch_data();
			});

			$("tbody").on('click', '#hapus', function() {
				var id = $(this).attr('data');
				console.log(id);
				$.ajax({
					type: "POST",
					url: "<?php echo base_url() ?>testapi/hapus",
					dataType: "JSON",
					data: {
						id: id
					},
					success: function() {
						fetch_data();
					}
				});
				fetch_data();
			});

			// Edit View
			$("tbody").on('click', '#edit', function() {
				var id = $(this).attr('data');
				console.log(id);
				$.ajax({
					type: "POST",
					url: "<?php echo base_url() ?>testapi/tampilid",
					dataType: "JSON",
					data: {
						id: id
					},
					success: function(data) {
						var i;
						for (i = 0; i < data.length; i++) {
							$('#idedit').val(data[i].id);
							$('#namaedit').val(data[i].nama);
							$('#emailedit').val(data[i].email);
							$('#passwordedit').val(data[i].password);
							$('#roleedit').val(data[i].role);

						}
					}
				});
				fetch_data();
			});


			// Update
			$("#update").click(function() {
				var id = $('#idedit').val();
				var nama = $('#namaedit').val();
				var email = $('#emailedit').val();
				var password = $('#passwordedit').val();
				var role = $('#roleedit').val();
				$.ajax({
					type: "POST",
					url: "<?php echo base_url() ?>testapi/edit",
					dataType: "JSON",
					data: {
						id: id,
						nama: nama,
						email: email,
						password: password,
						role: role
					},
					success: function(data) {
						$('#idedit').val("");
						$('#namaedit').val("");
						$('#emailedit').val("");
						$('#passwordedit').val("");
						$('#tambahrole').val("");
						fetch_data();
					}
				});
				fetch_data();
			});

			fetch_data();



		});
	</script>
</body>

</html>

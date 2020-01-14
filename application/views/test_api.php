<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>CRUD API</title>
</head>

<body>
	<table>
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

	<!-- Jquery -->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {

			function fetch_data() {
				$.ajax({
					method: "POST",
					url: "TestApi/action",
					data: {
						data_action: 'fetch_all'
					},
					success: function(data) {
						$('tbody').html(data);
					}
				});
			}
			fetch_data();
		});
	</script>
</body>

</html>
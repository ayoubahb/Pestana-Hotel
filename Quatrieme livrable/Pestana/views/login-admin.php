<?php
if (isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['password'])) {
	$loginAdmin = new AdminController();
	$loginAdmin->auth();
}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Login Form</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link rel="stylesheet" type="text/css" href="./views/css/style.css" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
</head>

<body>
	<div class="login_register hide h-100 w-100 position-absolute d-flex justify-content-center align-items-center">
		<div class="lr-form position-relative">
			<p id="title">Sign up</p>
			<?php include('./views/includes/alerts.php') ?>
			<form method="post">
				<div class="input-groupe">
					<div class="input-field">
						<i class="fa-solid fa-envelope"></i>
						<input type="email" name="email" placeholder="Email" />
					</div>

					<div class="input-field">
						<i class="fa-solid fa-key"></i>
						<input type="password" name="password" placeholder="Password" />
					</div>

					<div class="input-field">
						<button class="main-btn w-100" name="submit">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<script src="./views/js/all.min.js"></script>
	<script src="./views/js/bootstrap.bundle.min.js"></script>
</body>

</html>
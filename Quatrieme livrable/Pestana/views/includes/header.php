<?php
$page=explode('=',$_SERVER['QUERY_STRING']);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />

		<link rel="stylesheet" href="./views/css/all.css" />
		<link rel="stylesheet" href="./views/css/bootstrap.min.css" />
		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>

		<link
			href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:wght@300;400;500;600;700;800&display=swap"
			rel="stylesheet"
		/>
		<link rel="stylesheet" href="./views/css/style.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	</head>
	<body>
		<div
			class="login_register hide h-100 w-100 position-fixed top-0 start-0 d-flex justify-content-center align-items-center"
		>
			<div class="lr-form position-relative">
				<img src="./views/img/xmark.png" class="close position-absolute"/>
				<p id="title">Sign up</p>
				<form action="auth-reg" method="post">
					<input type="hidden" name="up" id="type">
					<input type="hidden" name="page"value="<?php echo $page[1];?>"/>

					<div class="btn-field">
						<button type="button" id="signupbtn">Sign Up</button>
						<button type="button" id="signinbtn" class="disable">Sign In</button>
					</div>
					<div class="input-groupe">
						<div class="input-field" id="namefield">
							<i class="fa-solid fa-user me-1"></i>
							<input type="text" placeholder="Full name" name="name" required/>
						</div>

						<div class="input-field">
							<i class="fa-solid fa-envelope"></i>
							<input type="email" placeholder="Email" name="email"required/>
						</div>

						<div class="input-field">
							<i class="fa-solid fa-key"></i>
							<input type="password" placeholder="Password" name="password" required/>
						</div>

						<div class="input-field">
							<button class="main-btn w-100" name="submit">Submit</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<!-- Start header -->

		<nav class="navbar_header">
			<a href="home" class="logo"
				><img src="./views/img/logo2.png" alt=""
			/></a>
			<div class="nav-links">
				<ul>
					<li class="d-flex align-items-center"><a href="home">Home</a></li>
					<li class="d-flex align-items-center"><a href="facilities">Facilities</a></li>
					<li class="d-flex align-items-center"><a href="rooms">Rooms</a></li>
					<li class="d-flex align-items-center"><a href="contact">Contact</a></li>

					<?php
					if (!(isset($_SESSION['guest_logged']))) {
						echo '<li><button class="login-btn">Sign Up/Sign In</button></li>';
					} else {
						echo '<li class="d-flex align-items-center">
							<div class="dropdown">
							<p style="margin-bottom: 0;color: white;" 
								class="dropdown-toggle"
								type="button"
								data-bs-toggle="dropdown"
								aria-expanded="false"
							>
								'.$_SESSION['guest_name'].'
							</p>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item text-black" style="font-size:1.1rem;" href="guest-reservation">Your reservations</a></li>
								<li><a class="dropdown-item text-black" style="font-size:1.1rem;" href="logout-guest">logout</a></li>
							</ul>
						</div>
						</li>';
					}
					?>
				</ul>
			</div>
			<img class="menu" src="./views/img/bur.png" alt="" />
		</nav>
		<!-- End header -->

<?php

if (isset($_POST['submit'])) {
  $newRoom = new RoomsController();
  $room = $newRoom->updateRoom();
}

if (isset($_POST['id'])) {
	$_SESSION['id']=$_POST['id'];
  $roomExist = new RoomsController();
  $room = $roomExist->getOneRoom($_POST['id']);
}else{
  Redirect::to('dashboard-rooms');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Bootstrap 5 CDN Links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Custom File's Link -->
   <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="./views/css/style_dash.css">
    <style>
			.bd-placeholder-img {
				font-size: 1.125rem;
				text-anchor: middle;
				-webkit-user-select: none;
				-moz-user-select: none;
				user-select: none;
			}

			@media (min-width: 768px) {
				.bd-placeholder-img-lg {
					font-size: 3.5rem;
				}
			}

			.b-example-divider {
				height: 3rem;
				background-color: rgba(0, 0, 0, 0.1);
				border: solid rgba(0, 0, 0, 0.15);
				border-width: 1px 0;
				box-shadow: inset 0 0.5em 1.5em rgba(0, 0, 0, 0.1),
					inset 0 0.125em 0.5em rgba(0, 0, 0, 0.15);
			}

			.b-example-vr {
				flex-shrink: 0;
				width: 1.5rem;
				height: 100vh;
			}

			.bi {
				vertical-align: -0.125em;
				fill: currentColor;
			}

			.nav-scroller {
				position: relative;
				z-index: 2;
				height: 2.75rem;
				overflow-y: hidden;
			}

			.nav-scroller .nav {
				display: flex;
				flex-wrap: nowrap;
				padding-bottom: 1rem;
				margin-top: -1px;
				overflow-x: auto;
				text-align: center;
				white-space: nowrap;
				-webkit-overflow-scrolling: touch;
			}
		</style>
</head>

<body>
    <!-- top navigation bar -->
    <nav class="header_dash navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="offcanvas"
            data-bs-target="#sidebar"
            aria-controls="offcanvasExample"
          >
            <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
          </button>
          <a
            class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold"
            href="#"
            >HOSTELIERE PESTANA</a
          >
          <i class="bi bi-layout-split"></i>
        </div>
      </nav>
      <!-- top navigation bar -->
      <!-- offcanvas -->
      <div
        class="offcanvas offcanvas-start sidebar-nav"
        tabindex="-1"
        id="sidebar"
      >
        <div class="offcanvas-body p-0">
          <nav class="navbar-dark">
            <ul class="navbar-nav mt-lg-0 mt-5">
              <li class="mb-3">
                <a href="dashboard-rooms" class="nav-link px-3 active">
                  <span class="me-2"><i class="bi bi-house-door-fill"></i></span>
                  <span>Rooms</span>
                </a>
              </li>
              <li class="mb-3">
                <a href="dashboard-reserv" class="nav-link px-3 active">
                  <span class="me-2"><i class="bi bi-calendar-event-fill"></i></span>
                  <span>Reservations</span>
                </a>
              </li>
              <li class="mb-3">
                <a href="home" class="nav-link px-3 active">
                  <span class="me-2"><i class="bi bi-laptop"></i></span>
                  <span>Front Office</span>
                </a>
              </li>
              
            </ul>
          </nav>
        </div>
      </div>

    <main class="mt-5">
				<div class="container">
				<div class="py-5 text-center">
					<h2>Update room</h2>
				</div>

				<div class="row g-5">
					<div class="col-12">
						<form class="needs-validation" method="post" enctype="multipart/form-data"  novalidate>
							<div class="cont row g-3">

								<div class="col-sm-6">
									<label class="form-label">Room Picture</label>
									<input
										type="file"
										class="form-control"
										name="img"
									/>
									<div class="invalid-feedback">Valid number required</div>
								</div>

								<div class="col-md-6">
									<label class="form-label">Room Type</label>
									<select class="form-select" id="select" name="room_type" required>
										<option value="">Choose...</option>
										<option value="Single">Single room</option>
										<option value="Double">Double room</option>
										<option value="Suite">Suite</option>
									</select>
									<div class="invalid-feedback">
										Please select a valid country.
									</div>
								</div>
								<div class="col-sm-6">
									<label class="form-label">Room price</label>
									<input
										type="number"
										class="form-control"
										name="room_price"
										value="<?php echo $room['room_price'] ?>"
										required
									/>
									<div class="invalid-feedback">Valid number required</div>
								</div>
							</div>
							<div class="row">
								<div class="col-6">
									<button
										class="w-100 btn btn-lg main-bg mt-5"
										type="submit"
										name="submit"
									>
										Submit
									</button>
								</div>
								<div class="col-6">
									<a href="dashboard-rooms" class="main-bg w-100 btn btn-lg mt-5">
                      Cancle
                  </a>
								</div>
							</div>
						</form>
					</div>
				</div>
				</div>
			</main>


    <!-- Bootstrap 5 JS CDN Links -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
        <script src="./views/js/checkout.js"></script>

    </body>
    
</html>
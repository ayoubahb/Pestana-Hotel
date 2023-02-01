
<?php
require_once './views/includes/header.php';

// $data = new TripsController();

// $trips = $data->getAllTrip();

?>
<section
			class="rooms-main d-flex align-items-center flex-column justify-content-center"
		>
			<div class="filter position-absolute w-100"></div>
			<div class="container pt-lg-0 pt-md-5 pt-sm-5">
				<div class="text-light position-relative mt-lg-0 mt-md-5 mt-sm-5">
					<div>
						<span class="fs-2 fw-bold">WELCOME TO</span> <br />
						<h1 class="heading">HOSTELIERE PESTANA</h1>
						<span class="fs-2 fw-bold">HOTELS</span><br /><span class="fs-5"
							>Book your stay and enjoy <br />Redefined at the most affordable
							rates.</span
						>
					</div>
				</div>
				<div class="book mt-5 py-2 px-3 rounded-2 w-100 position-relative">
					<form class="row flex-lg-row flex-sm-column flex-md-column align-items-center" action="search" method="post">
						<div class="col mb-2">
							<label>Check in</label>
							<input class="w-100 form-control" name="checkin" type="date" />
						</div>
						<div class="col mb-2">
							<label>Check out</label>
							<input class="w-100 form-control" name="checkout" type="date" />
						</div>
						<div class="col mb-2">
							<label>Room type</label>
							<select class="room-type form-select" name="room_type">
								<option selected>Open this select menu</option>
								<option value="single">Single room</option>
								<option value="double">Double room</option>
								<option value="suite">Suite</option>
							</select>
						</div>
						<div class="col text-center">
							<button class="main-btn w-100 mb-2 mt-4" type="submit" name="submit">Search</button>
						</div>
					</form>
				</div>
			</div>
		</section>
		<!-- End main page -->

		<!-- Start Features -->
		<div class="container my-5 text-center">
			<h2 class="mb-4 fw-bold">ROOMS AND RATES</h2>
			<p>
				Each of our bright, light-flooded rooms come with everything you could
				possibly need for a comfortable stay. And yes, comfort isn’t our only
				objective, we also value good design, sleek contemporary furnishing
				complemented by the rich tones of nature’s palette as visible from our
				rooms’ sea-view windows and terraces.
			</p>
		</div>
		<section class="rooms">
			<div class="container">
				<div class="row w-100 m-0">
					<div class="col-12 p-0 mb-4 rounded overflow-hidden">
						<img class="w-100" src="./views/img/img12.jpg" alt="" />
						<p class="p-2 fs-1 fw-bold text-light text-center m-0">
							SINGLE ROOM
						</p>
						<div class="p-4 text-center">
							<button class="main-btn">$47/night</button>
						</div>
					</div>
					<div class="col-12 p-0 mb-4 rounded overflow-hidden">
						<img class="w-100" src="./views/img/img11.jpg" alt="" />
						<p class="p-2 fs-1 fw-bold text-light text-center m-0">
							DOUBLE ROOM
						</p>
						<div class="p-4 text-center">
							<button class="main-btn">$69/night</button>
						</div>
					</div>
					<div class="col-12 p-0 mb-4 rounded overflow-hidden">
						<img class="w-100" src="./views/img/img10.jpg" alt="" />
						<p class="p-2 fs-1 fw-bold text-light text-center m-0">SUITE</p>
						<div class="p-4 text-center">
							<button class="main-btn">$99/night</button>
						</div>
					</div>
				</div>
			</div>
		</section>
	
<?php
require_once './views/includes/footer.php';
?>


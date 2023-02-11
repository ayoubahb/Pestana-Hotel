<?php
require_once './views/includes/header.php';
?>
<section class="home-main d-flex align-items-center flex-column justify-content-center">

	<div class="filter position-absolute w-100"></div>
	<div class="container pt-lg-0 pt-md-5 pt-sm-5">
		<?php include('./views/includes/alerts.php') ?>
		<div class="text-light position-relative mt-lg-0 mt-md-5 mt-sm-5">
			<div>
				<span class="fs-2 fw-bold">WELCOME TO</span> <br />
				<h1 class="heading">HOSTELIERE PESTANA</h1>
				<span class="fs-2 fw-bold">HOTELS</span><br /><span class="fs-5">Book your stay and enjoy <br />Redefined at the most affordable
					rates.</span>
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
				<div id="container" style="display:none;">

				</div>
				<div class="col text-center">
					<button class="main-btn w-100 mb-2 mt-4" type="submit" name="submit">Search</button>
				</div>
			</form>
		</div>
	</div>
</section>


<!-- Start Features -->
<section class="features my-5">
	<div class="container">
		<div class="row">
			<div class="d-flex gap-4 flex-column align-items-lg-start align-items-sm-center align col-lg-6 col-sm-12">
				<h2>Luxury redefined</h2>
				<p class="para">
					Our rooms are designed to transport you into an environment made
					for leisure. Take your mind off the day-to-day of home life and
					find a private paradise for yourself.
				</p>
			</div>
			<div class="col-lg-6 col-sm-12">
				<img class="w-100 mt-lg-0 mt-sm-3" src="./views/img/img1.png" alt="" />
			</div>
		</div>

		<div class="row mt-5">
			<div class="d-flex gap-4 flex-column align-items-lg-start align-items-sm-center align col-lg-6 col-sm-12">
				<h2>Leave your worries in the sand</h2>
				<p class="para">
					We love life at the beach. Being close to the ocean with access to
					endless sandy beach ensures a relaxed state of mind. It seems like
					time stands still watching the ocean.
				</p>
			</div>
			<div class="col-lg-6 col-sm-12">
				<img class="w-100 mb-lg-0" src="./views/img/img2.jpeg" alt="" />
			</div>
		</div>
	</div>
</section>
<?php
require_once './views/includes/footer.php';
?>
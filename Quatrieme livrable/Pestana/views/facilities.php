<?php
require_once './views/includes/header.php';
?>
<section
			class="facilities-main d-flex align-items-center flex-column justify-content-center"
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

		<!-- Start Features -->
		<div class="container my-5 text-center">
			<h2 class="mb-4 fw-bold">FACILITIES</h2>
			<p>
				We want your stay at our lush hotel to be truly unforgettable. That is
				why we give special attention to all of your needs so that we can ensure
				an experience quite uniquw. Luxury hotels offers the perfect setting
				with stunning views for leisure and our modern luxury resort facilities
				will help you enjoy the best of all.
			</p>
		</div>
		<section class="facilities">
			<div class="container">
				<div class="row">
					<div class="col-12 my-5 position-relative">
						<img class="w-100" src="./views/img/img3.jpg" alt="" />
						<p
							class="fs-2 fw-bold text-light position-absolute ms-auto me-auto text-center mb-0 text-black"
						>
							GYM
						</p>
					</div>
					<div class="col-12 my-5 position-relative">
						<img class="w-100" src="./views/img/img4.jpg" alt="" />
						<p
							class="fs-2 fw-bold text-light position-absolute ms-auto me-auto text-center mb-0 text-black"
						>
							SPA
						</p>
					</div>
					<div class="col-12 my-5 position-relative">
						<img class="w-100" src="./views/img/img5.jpg" alt="" />
						<p
							class="fs-2 fw-bold text-light position-absolute ms-auto me-auto text-center mb-0 text-black"
						>
							SWIMMING POOL
						</p>
					</div>
					<div class="col-12 my-5 position-relative">
						<img class="w-100" src="./views/img/img6.jpg" alt="" />
						<p
							class="fs-2 fw-bold text-light position-absolute ms-auto me-auto text-center mb-0 text-black"
						>
							RESTAURANT
						</p>
					</div>
					<div class="col-12 my-5 position-relative">
						<img class="w-100" src="./views/img/img7.jpg" alt="" />
						<p
							class="fs-2 fw-bold text-light position-absolute ms-auto me-auto text-center mb-0 text-black"
						>
							LAUNDRY
						</p>
					</div>
				</div>
			</div>
		</section>
<?php
require_once './views/includes/footer.php';
?>
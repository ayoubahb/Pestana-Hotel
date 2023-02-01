<?php
	require_once './views/includes/header.php';

	if(isset($_POST['id'])){
		$reserv_room = new RoomsController();
		$room = $reserv_room->getOneRoom($_POST['id']);
	}elseif(isset($_POST['submit'])){
		$reservation = new ReservationController();
		$reservation->addReservation();

		$last=$reservation->getLastReserv();
		
		$persons= new PersonController();
		$result=$persons->addPerson($last['reservation_id']);
		if ($result==='ok') {
			Session::set('success','Resrevation added');
      Redirect::to('home');
		}
	}else{
		Redirect::to('home');
	}
?>
<section class="contact-main d-flex align-items-center">
  <div class="filter position-absolute w-100"></div>
  <div class="container text-light position-relative">
    <div class="mb-5">
      <h2 class="fs-1 fw-bold text-center">Reservation</h2>
    </div>
  </div>
</section>
<div class="container mt-5">
	<main class="p-1">
		<div class="reserv-card rounded row align-items-center p-2">
			<div class="col-12 col-lg-6 ">
				<img class="w-100 rounded"src="<?php echo $room ["room_img"]?>" alt="">
			</div>
			<div class="col-12 col-lg-6 p-2 text-center">
				<p>Room N° : <?php echo $room ["room_id"]?></p>
				<p>Room type : <?php echo $room ["room_type"]?></p>
				<p>Suite type : <?php echo $room ["room_suite_type"]?></p>
			</div>
		</div>

		<div class="row g-5 mt-3">
			<div class="col-md-12">
				<form class="needs-validation" novalidate method="post">
					<div class="row g-3">

						<div class="col-6">
							<label class="form-label">ChekIn</label>
							<input
								type="date"
								class="form-control"
								name="checkin"
								readonly
								value="<?php echo $_SESSION['data']['checkin']?>"
							/>
						</div>

						<div class="col-6">
							<label class="form-label">ChekOut</label>
							<input
								type="date"
								class="form-control"
								name="checkout"
								readonly
								value="<?php echo $_SESSION['data']['checkout']?>"
							/>
						</div>


						<div class="col-12">
							<label for="address2" class="form-label">N° of persons (max <?php echo $room ["room_max"]?> pesons)</label>
							<input
								type="number"
								class="form-control"
								name="num-person"
								id="num-person"
								min="0"
								max="<?php echo $room ["room_max"];?>"

							/>
						</div>

						<input type="hidden" value="<?php echo $room ["room_id"]?>" name="room_id">
					</div>
					<div id="persons" class="px-2 mt-3">
						
					</div>
					<div class="row align-items-center gap-2">
						<button class="col main-btn my-4" type="submit" name="submit">
							Submit
						</button>
						<a href="home" class="col main-btn text-center">Cancle</a>
					</div>
				</form>
			</div>
		</div>
	</main>
</div>


<?php
require_once './views/includes/footer.php';
?>
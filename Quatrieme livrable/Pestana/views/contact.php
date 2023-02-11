<?php
require_once './views/includes/header.php';
?>
<section class="contact-main d-flex align-items-center">
	<div class="filter position-absolute w-100"></div>
	<div class="container text-light position-relative">
		<div class="mb-5">
			<h2 class="fs-1 fw-bold">Contact us now</h2>
			<p class="fs-5">
				Let's get this conversation started.<br />Tell us a bit about
				yourself, and we'll get in touch as soon as we can.
			</p>
		</div>
	</div>
</section>
<!-- End main page -->
<div class="container">
	<form class="my-5" action="">
		<div class="row align-items-center justify-content-center">
			<div class="col-lg-6 col-md-12">
				<img class="w-100" src="./views/img/mail.png" alt="" />
			</div>
			<div class="col-lg-6 col-md-12">
				<div class="mb-2">
					<label class="d-block fs-5 mb-2" for="">Full name</label>
					<input class="w-100 form-control rounded-left" type="text" />
				</div>
				<div class="mb-2">
					<label class="d-block fs-5 mb-2" for="">Email</label>
					<input class="w-100 form-control rounded-left" type="email" />
				</div>
				<div class="mb-2">
					<label class="d-block fs-5 mb-2" for="">Phone</label>
					<input class="w-100 form-control rounded-left" type="text" />
				</div>
				<div class="mb-2">
					<label class="d-block fs-5 mb-2" for="">Message</label>
					<textarea class="w-100 form-control rounded-left" name="" id="" cols="30" rows="10"></textarea>
				</div>
				<div>
					<button class="main-btn w-100" type="submit">SUBMIT</button>
				</div>
			</div>
		</div>
	</form>
</div>
<?php
require_once './views/includes/footer.php';
?>
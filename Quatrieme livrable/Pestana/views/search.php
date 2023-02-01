<?php
require_once './views/includes/header.php';

$room = new RoomsController();
if (isset($_POST['submit'])) {
  if(isset($_POST['suite-type'])){
    $suiteType = $_POST['suite-type'];
  }else{
    $suiteType = ' ';
  }
  $existRooms = $room->searchRoom($_POST['checkin'],$_POST['checkout'],$_POST['room_type'],$suiteType);
}elseif(isset($_SESSION['data'])){
  $existRooms = $room->searchRoom($_SESSION['data']['checkin'],$_SESSION['data']['checkout'],$_SESSION['data']['room_type'],$_SESSION['data']['suite-type']);
}else{
  Redirect::to('home');
}

?>

<section class="contact-main d-flex align-items-center">
  <div class="filter position-absolute w-100"></div>
  <div class="container text-light position-relative">
    <div class="mb-5">
      <h2 class="fs-1 fw-bold text-center">Rooms founded</h2>
    </div>
  </div>
</section>

<section class="my-5 text-center">
  <?php
    if (isset($existRooms)) {
      if(count($existRooms)==0){
      echo 
      '<h2 class="my-5 text-center">No room founded</h2>
      <a href="home" class="mx-auto">
        <button class="main-btn">Return to Home</button>
      </a>
      <div class="search"></div>';
      require_once './views/includes/footer.php';
      die();
      }
    }
    ?>
  <div class="container">
    <div class="row row-cols-1 justify-content-lg-start row-cols-sm-2 justify-content-sm-center row-cols-md-3 justify-content-md-center g-3">
      <?php foreach ($existRooms as $room):?>
      <div class="col room-cards">
        <div class="card shadow-sm">
          <img src="<?php echo $room['room_img']; ?>" alt="" class="room-img" />
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <h3 class="card-text"><?php echo$room['room_type'];?></h3>
              <h4><?php echo $room['room_price'];?>$ per night</h4>
            </div>
            <div class="d-flex justify-content-between">
              <p><?php echo $room['room_suite_type'];?></p>
              <p>Capacity :<?php echo $room['room_max'];?> persons</p>
            </div>
            <form action="reservation" method="post" class="form">
              <input type="hidden" name="id" value="<?php echo $room['room_id'];?> " />
              <button type="submit" class="w-100 main-btn">Book</button>
            </form>
          </div>
        </div>
      </div>
      <?php endforeach;?>
    </div>
  </div>

</section>

<?php if (!isset($_SESSION['guest_logged'])) :?>
  <script>
  let button = document.querySelectorAll('.form .main-btn');
  button.forEach((element) => {
    element.addEventListener('click',function(e){
      e.preventDefault(); // Cancel the native event
      loginForm.classList.toggle('hide');
      body.classList.toggle('noscroll');
    });
  });
  </script>
<?php endif; ?>


<?php
require_once './views/includes/footer.php';
?>

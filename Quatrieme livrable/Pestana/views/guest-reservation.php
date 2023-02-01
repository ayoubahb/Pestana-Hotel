<?php 
require_once './views/includes/header.php';
$reserv = new ReservationController();
$results = $reserv->getGuestReserv($_SESSION['guest_id']);
?>

<section class="contact-main d-flex align-items-center">
  <div class="filter position-absolute w-100"></div>
  <div class="container text-light position-relative">
    <div class="mb-5">
      <h2 class="fs-1 fw-bold text-center">Your reservations</h2>
    </div>
  </div>
</section>
<div class="container">
  <?php include('./views/includes/alerts.php') ?>
</div>
<div class="search container my-5 overflow-scroll">
  <table class="table">
  <thead>
    <tr>
      <th>ID</th>
      <th>°N</th>
      <th>Room</th>
      <th>CheckIN</th>
      <th>CheckOUT</th>
      <th>Operations</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($results as $result):?>
    <tr>
      <td><?php echo $result['reservation_id'];?></td>
      <td><?php echo $result['room_id'];?></td>
      <td>
        <?php
          $reserv_room = new RoomsController();
          $room = $reserv_room->getOneRoom($result['room_id']);
          echo $room['room_type'];
        ?>
      </td>
      <td><?php echo $result['reservation_checkin'];?></td>
      <td><?php echo $result['reservation_checkout'];?></td>
      <td>
        <form action="update-reserv" method = "post" class="me-2 d-inline-block">
          <input type="hidden" name="id" value="<?php echo $result['reservation_id'];?>">
          <button class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></button>
        </form>
        <form action="delete-reserv" method = "post" class="d-inline-block">
          <input type="hidden" name="id" value="<?php echo $result['reservation_id'];?>">
          <button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
        </form>
      </td>
    </tr>
    <tr>
      <?php 
        $person = new PersonController();
        $personResult = $person->getPerson($result['reservation_id']);
      ?>
      <td colspan="6">
        <h5 class="text-center">Reservation Guests</h5>
        <table class="w-75 mx-auto text-center">
          <thead>
            <th>First name</th>
            <th>Last name</th>
            <th>Date of birth</th>
          </thead>
          <tbody>
            <?php foreach ($personResult as $per):?>
            <tr>
              <td><?php echo $per['person_Fname'];?></td>
              <td><?php echo $per['person_Lname'];?></td>
              <td><?php echo $per['person_dob'];?></td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
  <?php
    if (count($results )=== 0) {
      echo '<p class="fw-bold fs-3 text-center mt-5">You do not have any reservations</p>';
    }
  ?>
</div>

<?php 
require_once './views/includes/footer.php';
?>
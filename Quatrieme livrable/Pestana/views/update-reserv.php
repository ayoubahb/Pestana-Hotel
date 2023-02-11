<?php
require_once './views/includes/header.php';
if (isset($_POST['id'])) {
  $reserv = new ReservationController();
  $result = $reserv->getOneReserv($_POST['id']);


  $person = new PersonController();
  $personResult = $person->getPerson($result['reservation_id']);
}
?>

<section class="contact-main d-flex align-items-center">
  <div class="filter position-absolute w-100"></div>
  <div class="container text-light position-relative">
    <div class="mb-5">
      <h2 class="fs-1 fw-bold text-center">Update Reservation</h2>
    </div>
  </div>
</section>

<section class="my-5">
  <div class="container">
    <div class="row align-items-end gap-3 mt-2" id="checkDates">
      <div class="col-lg col-md col-12">
        <p class="m-0">Checkin</p>
        <input class="w-100 p-1" type="date" style="height:52px;">
      </div>
      <div class="col-lg col-md col-12">
        <p class="m-0">Checkout</p>
        <input class="w-100 p-1" type="date" style="height:52px;">
      </div>
      <div class="col-lg col-md col-12">
        <button type="button" id="search" class="main-btn w-100">Check</button>
      </div>
      <input type="hidden" id="reservId" value="<?php echo $result['reservation_id'] ?>">
      <input type="hidden" id="roomId" value="<?php echo $result['room_id'] ?>">
    </div>
    <div id="result" class="alert w-100 mt-2" style="display:none;"></div>
  </div>
</section>
<section class="my-5">
  <div class="container">
    <h5 class="text-center">Reservation Guests</h5>
    <table class="mx-auto my-3 w-100">
      <thead>
        <th>First name</th>
        <th>Last name</th>
        <th>Date of birth</th>
        <th>Operations</th>
      </thead>
      <tbody>
        <?php foreach ($personResult as $per) : ?>
          <tr id="<?php echo $per['personId']; ?>">
            <td><?php echo $per['person_Fname']; ?></td>
            <td><?php echo $per['person_Lname']; ?></td>
            <td><?php echo $per['person_dob']; ?></td>
            <td>
              <button id="" class="btn btn-sm btn-danger removeBtn"><i class="fa fa-trash"></i></button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <div class="d-flex gap-2">
      <a href="guest-reservation" class="w-50">
        <button type="button" class="w-100 border-0 rounded" style="height: 52px;">Cancle</button>
      </a>
      <button type="button" class="main-btn w-50" id="done">Done</button>
    </div>
  </div>

</section>
<?php
require_once './views/includes/footer.php';
?>
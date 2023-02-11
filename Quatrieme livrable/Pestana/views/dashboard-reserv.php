<?php

$data = new ReservationController();

$reservation = $data->getAllReserv();

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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="./views/css/style_dash.css">

</head>

<body>
  <!-- top navigation bar -->
  <nav class="header_dash navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="offcanvasExample">
        <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
      </button>
      <a class="navbar-brand me-auto ms-lg-0 ms-3 text-uppercase fw-bold" href="#">HOSTELIERE PESTANA</a>
      <i class="bi bi-layout-split"></i>
    </div>
  </nav>
  <!-- top navigation bar -->
  <!-- offcanvas -->
  <div class="offcanvas offcanvas-start sidebar-nav" tabindex="-1" id="sidebar">
    <div class="offcanvas-body p-0">
      <nav class="navbar-dark">
        <ul class="navbar-nav">
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
  <!-- offcanvas -->
  <main class="mt-5 pt-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h4>Dashboard</h4>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 mb-3">
          <div class="card">
            <div class="card-header">
              <span><i class="bi bi-table me-2"></i></span> <b>Reservations Table</b>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="example" class="table table-striped data-table" style="width: 100%">
                  <thead>
                    <tr>
                      <th>Reservation ID</th>
                      <th>Guest name</th>
                      <th>Room °N</th>
                      <th>Room Type</th>
                      <th>CheckIN</th>
                      <th>CheckOUT</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($reservation as $reserv) : ?>
                      <tr>
                        <td><?php echo $reserv['reservation_id']; ?></td>
                        <td>
                          <?php
                          $guest_data = new GuestController();
                          $guest = $guest_data->getGuest($reserv['guest_id']);

                          echo $guest['guest_name'];
                          ?>
                        </td>
                        <td><?php echo $reserv['room_id']; ?></td>
                        <td>
                          <?php
                          $reserv_room = new RoomsController();
                          $room = $reserv_room->getOneRoom($reserv['room_id']);
                          echo $room['room_type'];
                          ?>
                        </td>
                        <td><?php echo $reserv['reservation_checkin']; ?></td>
                        <td><?php echo $reserv['reservation_checkout']; ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>




  <!-- Bootstrap 5 JS CDN Links -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>

</body>

</html>
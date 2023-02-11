<?php
if (isset($_POST['id'])) {
  $deleteReserv = new ReservationController();
  
  $deleteReserv->deleteReserv($_POST['id']);
}else{
  Redirect::to('home');
}

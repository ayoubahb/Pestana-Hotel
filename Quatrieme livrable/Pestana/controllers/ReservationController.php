<?php

class ReservationController
{

  public function addReservation()
  {
    if (isset($_POST['submit'])) {
      $data = array(
        'guest_id'       => $_SESSION['guest_id'],
        'room_id'        => $_POST['room_id'],
        'checkin'        => $_SESSION['data']['checkin'],
        'checkout'        => $_SESSION['data']['checkout']
      );
      $result = Reservation::addReserv($data);
      if ($result !== 'ok') {
        echo $result;
      }
    }
  }
  public function getAllReserv()
  {
    $reserv = Reservation::getAll();
    return $reserv;
  }

  public function getLastReserv()
  {
    $reserv = Reservation::getLast();
    return $reserv;
  }
  public function getOneReserv($id)
  {
    $reserv = Reservation::getOne($id);
    return $reserv;
  }

  public function getGuestReserv($idGuest)
  {
    $reserv = Reservation::getGuestReserv($idGuest);
    return $reserv;
  }
  public function deleteReserv($id)
  {
    $result = Reservation::delete($id);
    if ($result === 'ok') {
      Session::set('success', 'Reservation deleted');
      Redirect::to('guest-reservation');
    } else {
      echo $result;
    }
  }
  public function checkUpdatedDates($data)
  {
    $result = Reservation::check($data);
    return count($result);
  }
  public function updateDates($data)
  {
    $result = Reservation::update($data);
    if ($result === 'ok') {
      Session::set('success', 'Reservation Updated');
      return true;
    } else {
      return false;
    }
  }
}

<?php

require_once 'autoload.php';

$home = new HomeController();

$adminPages = ['add', 'update', 'delete', 'logout', 'dashboard-reserv', 'dashboard-rooms', 'login-admin'];

$pages = ['home', 'facilities', 'rooms', 'contact', 'search', 'auth-reg'];

$guestPages = ['reservation', 'logout-guest', 'guest-reservation', 'delete-reserv', 'update-reserv', 'check', 'deleteperson', 'updateReservation'];

//if page in back office
if (isset($_GET['page']) && in_array($_GET['page'], $adminPages)) {

  if (isset($_SESSION['logged']) && isset($_SESSION['logged']) === true) {
    if ($_GET['page'] === "login-admin") {
      $home->index('dashboard-rooms');
    } else {
      $page = $_GET['page'];
      $home->index($page);
    }
  } else {
    $home->index('login-admin');
  }
} else if (isset($_GET['page']) && in_array($_GET['page'], $guestPages)) {
  if (!(isset($_SESSION['guest_logged']))) {
    Redirect::to('home');
  } else {
    $page = $_GET['page'];
    $home->index($page);
  }
} else if (isset($_GET['page']) && in_array($_GET['page'], $pages)) {
  $page = $_GET['page'];
  $home->index($page);
} else if (!isset($_GET['page'])) { //default page
  Redirect::to('home');
} else {
  include('views/includes/404.php');
}

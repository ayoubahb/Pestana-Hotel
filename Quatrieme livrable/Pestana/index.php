<?php

require_once 'autoload.php';

$home = new HomeController();

$adminPages = ['add','update','delete','logout','dashboard-reserv','dashboard-rooms','login-admin'];

$pages = ['home','facilities','rooms','contact','reservation','search','auth-reg','logout-guest','guest-reservation','delete-reserv','update-reserv','check','deleteperson','updateReservation'];


if (isset($_GET['page']) && in_array($_GET['page'],$adminPages)) {

  if (isset($_SESSION['logged']) && isset($_SESSION['logged']) === true) {
    if ($_GET['page']==="login-admin") {
      $home->index('dashboard-rooms');
    }else{
      $page = $_GET['page'];
      $home->index($page);
    }
  }else{
    $home->index('login-admin');
  }
  
}else if (isset($_GET['page']) && in_array($_GET['page'],$pages)) {
  if(($_GET['page']==='profil' || $_GET['page']==='reservation') && !(isset($_SESSION['guest_logged']))){
    Redirect::to('home');
  }else{
    $page = $_GET['page'];
    $home->index($page);
  }
}else if (!isset($_GET['page'])){
  Redirect::to('home');
}else {
  include('views/includes/404.php');
}



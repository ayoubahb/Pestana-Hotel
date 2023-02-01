<?php

if (isset($_POST['submit'])) {
  $guest = new GuestController();
  if (isset($_POST['up'])) {
    $check = $guest->checkGuest($_POST['email']);
    if(!$check){
      Session::set('info','Email already used');
      Redirect::to('home');
    }else{
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $data = array(
      'name'      =>$_POST['name'],
      'email'     =>$_POST['email'],
      'password'  =>$password
    );
    $guest->register($data);
    }
  } elseif(isset($_POST['in'])) {
    $data = array(
      'email'     =>$_POST['email'],
      'password'  =>$_POST['password']
    );
    $page=$_POST['page'];
    $result = $guest->auth($data,$page);
  }
}
?>


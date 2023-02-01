<?php
class GuestController{
  public function getGuest($id){
    $data = array(
      'id' => $id
    );
    $guest = Guest::get($data);
    return $guest;
  
  }

  public function register($data){
    $result = Guest::addGuest($data);
    if ($result == 'ok') {
      Session::set('success','Account Created. Try to login now.');
      Redirect::to('home');
    }else{
      Session::set('error','Account has not Created');
    }
  }

  public function checkGuest($email){
    $result = Guest::check($email);
    return $result;
  }

  public function auth($data,$page){
    $result = Guest::login($data['email']);
    if ($result['guest_email'] === $data['email'] && password_verify($data['password'],$result['guest_psw'])) {
      $_SESSION['guest_logged'] = true;
      $_SESSION['guest_id'] = $result['guest_id'];
      $_SESSION['guest_name'] = $result['guest_name'];
      Redirect::to($page);
    }else{
      Session::set('error','username or password incorrect');
      Redirect::to('home');
    }
  }
  static public function logout(){
    unset($_SESSION['guest_logged'],$_SESSION['guest_id'],$_SESSION['guest_name']);
  }
  
}
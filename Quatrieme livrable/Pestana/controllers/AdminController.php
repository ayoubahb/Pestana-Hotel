<?php

class AdminController{
  
  public function auth(){
    if (isset($_POST['submit'])) {
      $data = array(
        'admin_email' => $_POST['email']
      );
      $result = Admin::login($data);
      if ($result['admin_email'] === $_POST['email'] && password_verify($_POST['password'],$result['admin_psw'])) {
      $_SESSION['logged'] = true;
      $_SESSION['username'] = $result['admin_name'];
      Redirect::to('dashboard-rooms');
      
      }else {
        Session::set('error','username or password incorrect');
        Redirect::to('login-admin');
      }
    }
  }

  static public function logout(){
    unset($_SESSION['logged'],$_SESSION['username']);
  }
  
}


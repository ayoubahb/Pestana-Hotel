<?php

class Admin {

  static public function login($data){

    $username = $data['admin_email'];
    try {
      $stmt = DB::connect()->prepare('SELECT * FROM admin WHERE admin_email = :admin_email');
      $stmt->execute(array(":admin_email" =>$username));
      $admin = $stmt->fetch(PDO::FETCH_ASSOC);
      return $admin;

    } catch (PDOException $e) {
      echo 'error' .$e->getMessage();
    }
  }

}

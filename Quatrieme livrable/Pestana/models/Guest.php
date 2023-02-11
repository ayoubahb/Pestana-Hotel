<?php

class Guest
{
  static public function get($data)
  {
    $id = $data['id'];
    try {
      $query = 'SELECT * FROM guest WHERE guest_id = :id';
      $stmt = DB::connect()->prepare($query);
      $stmt->execute(array(":id" => $id));
      $guest = $stmt->fetch(PDO::FETCH_ASSOC);
      return $guest;
    } catch (PDOException $e) {
      echo 'error' . $e->getMessage();
    }
  }
  static public function check($email)
  {
    $stmt = DB::connect()->prepare('SELECT * FROM guest WHERE guest_email = :guest_email;');
    $stmt->execute(array(":guest_email" => $email));
    if ($stmt->rowCount() > 0) {
      $resultCheck = false;
    } else {
      $resultCheck = true;
    }
    return $resultCheck;
  }
  static public function addGuest($data)
  {
    $stmt = DB::connect()->prepare('INSERT INTO guest(guest_name,guest_email,guest_psw) VALUES (:guest_name,:guest_email,:guest_psw)');
    $stmt->bindParam(':guest_name', $data['name']);
    $stmt->bindParam(':guest_email', $data['email']);
    $stmt->bindParam(':guest_psw', $data['password']);
    if ($stmt->execute()) {
      return 'ok';
    } else {
      return 'error';
    }
  }
  static public function login($email)
  {
    $stmt = DB::connect()->prepare('SELECT * FROM guest WHERE guest_email = :guest_email');
    $stmt->bindParam(':guest_email', $email);
    $stmt->execute();
    $guest = $stmt->fetch(PDO::FETCH_ASSOC);
    return $guest;
  }
}

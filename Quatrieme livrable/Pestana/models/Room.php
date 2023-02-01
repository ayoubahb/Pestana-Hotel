<?php

class Room {

  static public function getAll(){
    $stmt = DB::connect()->prepare('SELECT * FROM rooms');
    $stmt->execute();
    return $stmt->fetchAll();
    $stmt->close();
    $stmt = null;
  }
  static public function search($data){
    $stmt = DB::connect()->prepare('SELECT rooms.* FROM rooms LEFT JOIN reservation ON rooms.room_id = reservation.room_id AND (:checkin BETWEEN reservation.reservation_checkin AND reservation.reservation_checkout OR :checkout BETWEEN reservation.reservation_checkin AND reservation.reservation_checkout OR (:checkin <= reservation.reservation_checkin AND :checkout >= reservation.reservation_checkin)) WHERE reservation.room_id IS NULL AND rooms.room_type=:type AND rooms.room_suite_type=:suitetype');
    $stmt->execute(array(':checkin'=> $data['checkin'],':checkout'=> $data['checkout'],':type' => $data['room_type'],':suitetype' => $data['suite-type']));
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->close();
    $stmt = null;
  }
  static public function getRoom($data){
    $id = $data['id'];
    try {
      $query = 'SELECT * FROM rooms WHERE room_id = :id';
      $stmt = DB::connect()->prepare($query);
      $stmt->execute(array(":id" =>$id));
      $room = $stmt->fetch(PDO::FETCH_ASSOC);
      return $room;

    } catch (PDOException $e) {
      echo 'error' .$e->getMessage();
    }
  }
  static public function add($data){
    $stmt = DB::connect()->prepare('INSERT INTO rooms(room_type,room_suite_type,room_price,room_img,room_max) VALUES (:room_type,:room_suite_type,:room_price,:room_img,:room_max)');
    $stmt->bindParam(':room_type',$data['room_type']);
    $stmt->bindParam(':room_suite_type',$data['room_suite_type']);
    $stmt->bindParam(':room_price',$data['room_price']);
    $stmt->bindParam(':room_img',$data['room_img']);
    $stmt->bindParam(':room_max',$data['room_max']);

    if($stmt->execute()){
      return 'ok';
    }else{
      return 'error';
    }
    $stmt->close();
    $stmt=null;
  }

  static public function update($data){
    $stmt = DB::connect()->prepare('UPDATE rooms SET room_type=:room_type,room_suite_type=:room_suite_type,room_price=:room_price,room_img=:room_img WHERE room_id = :id');
    $stmt->bindParam(':id',$data['room_id']);
    $stmt->bindParam(':room_type',$data['room_type']);
    $stmt->bindParam(':room_suite_type',$data['room_suite_type']);
    $stmt->bindParam(':room_price',$data['room_price']);
    $stmt->bindParam(':room_img',$data['room_img']);

    if($stmt->execute()){
      return 'ok';
    }else{
      return 'error';
    }
    $stmt->close();
    $stmt=null;
  }


  static public function delete($data){

    $id = $data['id'];
    try {
      $query = 'DELETE FROM rooms WHERE room_id = :id';
      $stmt = DB::connect()->prepare($query);
      $stmt->execute(array(":id" =>$id));
      if($stmt->execute()){
        return 'ok';
      }
    } catch (PDOException $e) {
      echo 'error' .$e->getMessage();
    }
  }
}
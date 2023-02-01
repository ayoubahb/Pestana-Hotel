<?php

class Person{

  static public function add($data){
    $stmt = DB::connect()->prepare('INSERT INTO person(reservation_id,person_Fname,person_Lname,person_dob) VALUES (:reservation_id,:person_Fname,:person_Lname,:person_dob)');
    $stmt->bindParam(':reservation_id',$data['reserv_id']);
    $stmt->bindParam(':person_Fname',$data['f_name']);
    $stmt->bindParam(':person_Lname',$data['l_name']);
    $stmt->bindParam(':person_dob',$data['dob']);

    if($stmt->execute()){
      return 'ok';
    }else{
      return 'error';
    }
    $stmt->close();
    $stmt=null;
  }
  static public function get($id){
    $stmt = DB::connect()->prepare('SELECT * FROM person WHERE person.reservation_id = :id');
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt->close();
    $stmt=null;
  }
  static public function delete($id){
    $stmt = DB::connect()->prepare('DELETE FROM person WHERE personId = :id');
    $stmt->bindParam(':id',$id);
    if($stmt->execute()){
      return 'ok';
    }else{
      return 'error';
    }

    $stmt->close();
    $stmt=null;
  }
}
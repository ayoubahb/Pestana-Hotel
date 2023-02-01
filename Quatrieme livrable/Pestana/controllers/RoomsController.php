<?php
class RoomsController{
  
  public function getAllRooms(){
    $rooms = Room::getAll();
    return $rooms;
  }
  
  public function searchRoom($checkin,$checkout,$roomType,$suiteType){
    $data = array(
      'checkin'         => $checkin,
      'checkout'        => $checkout,
      'room_type'       => $roomType,
      'suite-type'      => $suiteType
    );
    $_SESSION['data']=$data;
    $result = Room::search($data);
    return $result;
  }
  public function getOneRoom($id){

      $data = array(
        'id' => $id
      );

      $room = Room::getRoom($data);
      return $room;
    
  }
  
  public function addRoom(){
    if (isset($_POST['submit'])) {
      if (isset($_POST['room_suite_type'])) {
        $suiteType = $_POST['room_suite_type'];
      }else{
        $suiteType =' ';
      }
      $img = $_FILES['img']['name'];
      
      $tmp_name = $_FILES['img']['tmp_name'];
      $folder = "./views/upload_img/" .$img;
      
      move_uploaded_file($tmp_name,$folder);
      

      $data = array(
        'room_type'        => $_POST['room_type'],
        'room_suite_type'  => $suiteType,
        'room_price'       => $_POST['room_price'],
        'room_max'         => $_POST['max'],
        'room_img'         => $folder
      );
      $result = Room::add($data);
      if ($result === 'ok' ) {
        Session::set('success','Room added');
        Redirect::to('dashboard-rooms');
      }else {
        echo $result;
      }
    }
  }

  public function updateRoom(){
    if (isset($_POST['submit'])) {
      if (isset($_POST['room_suite_type'])) {
        $suiteType = $_POST['room_suite_type'];
      }else{
        $suiteType ='--';
      }
      
      $existRoom = $this->getOneRoom($_SESSION['id']);
      
      
      if (isset($_POST['img']) ){
        $img = $_FILES['img']['name'];
        
        $tmp_name = $_FILES['img']['tmp_name'];
        $folder = "./views/upload_img/" .$img;
      }else{
        $folder = $existRoom['room_img'];
      }
      $data = array(
        'room_id'          => $_SESSION["id"],
        'room_type'        => $_POST['room_type'],
        'room_suite_type'  => $suiteType,
        'room_price'       => $_POST['room_price'],
        'room_img'         => $folder
      );
      
      unset ($_SESSION["id"]);
      $result = Room::update($data);
      if ($result === 'ok' ) {
        Session::set('success','Room modified');

        Redirect::to('dashboard-rooms');
      }else {
        echo $result;
      }
    }
  }

  public function deleteRoom(){
    if (isset($_POST['id'])) {
      $data = array(
        'id' => $_POST['id']
      );
      $result = Room::delete($data);
      if ($result === 'ok' ) {
        Session::set('success','Room deleted');
        Redirect::to('dashboard-rooms');
      }else {
        echo $result;
      }
    }
  }
}


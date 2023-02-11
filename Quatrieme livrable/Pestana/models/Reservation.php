<?php
class Reservation
{

  static public function addReserv($data)
  {
    $stmt = DB::connect()->prepare('INSERT INTO reservation(guest_id,room_id,reservation_checkin,reservation_checkout) VALUES (:guest_id,:room_id,:reservation_checkin,:reservation_checkout)');
    $stmt->bindParam(':guest_id', $data['guest_id']);
    $stmt->bindParam(':room_id', $data['room_id']);
    $stmt->bindParam(':reservation_checkin', $data['checkin']);
    $stmt->bindParam(':reservation_checkout', $data['checkout']);

    if ($stmt->execute()) {
      return 'ok';
    } else {
      return 'error';
    }
  }

  static public function getAll()
  {
    $stmt = DB::connect()->prepare('SELECT * FROM reservation');
    $stmt->execute();
    return $stmt->fetchAll();
  }
  static public function getLast()
  {
    $stmt = DB::connect()->prepare('SELECT * FROM reservation ORDER BY reservation_id DESC LIMIT 1');
    $stmt->execute();
    return $stmt->fetch();
  }
  static public function getOne($idReserv)
  {
    $stmt = DB::connect()->prepare('SELECT * FROM reservation WHERE reservation_id = :id');
    $stmt->bindParam(':id', $idReserv);
    $stmt->execute();
    return $stmt->fetch();
  }
  static public function getGuestReserv($idGuest)
  {
    $stmt = DB::connect()->prepare('SELECT * FROM reservation WHERE reservation.guest_id = :id');
    $stmt->bindParam(':id', $idGuest);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  static public function delete($id)
  {
    $stmt = DB::connect()->prepare('DELETE FROM reservation WHERE reservation_id =:id');
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
      return 'ok';
    } else {
      return 'error';
    }
  }
  static public function check($data)
  {
    $stmt = DB::connect()->prepare("SELECT *
    FROM reservation
    WHERE room_id = :room_id
    AND reservation_id != :reservation_id
    AND (
        (reservation_checkin >= :checkin AND reservation_checkin < :checkout)
        OR (reservation_checkout > :checkin AND reservation_checkout <= :checkout)
        OR (reservation_checkin <= :checkin AND reservation_checkout >= :checkout)
    )");
    $stmt->bindParam(':room_id', $data['roomId']);
    $stmt->bindParam(':reservation_id', $data['reservationId']);
    $stmt->bindParam(':checkin', $data['checkin']);
    $stmt->bindParam(':checkout', $data['checkout']);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  static public function update($data)
  {
    $stmt = DB::connect()->prepare('UPDATE reservation SET reservation_checkin = :checkin, reservation_checkout= :checkout WHERE reservation_id = :reservation');
    $stmt->bindParam(':checkin', $data['checkin']);
    $stmt->bindParam(':checkout', $data['checkout']);
    $stmt->bindParam(':reservation', $data['reservation']);

    if ($stmt->execute()) {
      return 'ok';
    } else {
      return 'error';
    }
  }
}

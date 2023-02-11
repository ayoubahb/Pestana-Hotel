<?php
if (isset($_POST['id'])) {
  $deleteRoom = new RoomsController();
  
  $deleteRoom->deleteRoom();
}

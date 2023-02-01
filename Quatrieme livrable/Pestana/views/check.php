<?php
$data = json_decode(file_get_contents('php://input'), true);

$check = new ReservationController();
$result= $check->checkUpdatedDates($data);

echo $result;
?>
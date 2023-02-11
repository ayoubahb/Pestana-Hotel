<?php

$data = json_decode(file_get_contents('php://input'), true);

$delete = new PersonController();
$result = $delete->deletePerson($data);

echo $result;

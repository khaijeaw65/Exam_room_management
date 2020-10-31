<?php

require_once 'config.php';

$query = "SELECT
building.`Name`,
room.num,
room.seat_amount
FROM
room
INNER JOIN building ON room.building_id = building.ID ORDER BY num ASC";

$stmt = $con->prepare($query);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$json = json_encode($result);

die($json);


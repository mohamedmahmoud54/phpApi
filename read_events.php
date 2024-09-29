<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once 'db.php';
$database = new Database();
$db = $database->getConnection();

$query = "SELECT * FROM tasks";
$stmt = $db->prepare($query);
$stmt->execute();

$events = [];
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $events[] = $row;
}

echo json_encode($events);
?>

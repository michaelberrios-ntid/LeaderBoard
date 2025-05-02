<?php
require '../database/db.php';

$limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 10; // default to 10 if not given

// Sanity check (optional): prevent extreme limits
$limit = max(1, min($limit, 100)); // limit between 1 and 100

// TODO: Write the SQL Query to get the top players by win/loss ratio
$sql = "";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->execute();

$results = $stmt->fetchAll();

header('Content-Type: application/json');
echo json_encode($results);
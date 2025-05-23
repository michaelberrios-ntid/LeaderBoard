<?php
require '../database/db.php';
$jsonHeader = 'Content-Type: application/json';

$limit = isset($_GET['limit']) ? (int) $_GET['limit'] : 10; // default to 10 if not given

// Sanity check (optional): prevent extreme limits
$limit = max(1, min($limit, 100)); // limit between 1 and 100

$sql = "
    SELECT
        id,
        name,
        matches,
        wins,
        losses,
        CASE
            WHEN losses = 0 AND wins > 0 THEN wins
            WHEN losses = 0 AND wins = 0 THEN 0
            ELSE ROUND(wins / losses, 2)
        END AS ratio
    FROM leaderboard
    ORDER BY matches DESC, wins DESC
    LIMIT :limit
";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->execute();

// Fetch all results
$results = $stmt->fetchAll();
// Tell the Client that the response is JSON
header($jsonHeader);
// Send the response to the Client
echo json_encode($results);
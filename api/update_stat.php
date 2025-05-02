<?php
require '../database/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'POST method required']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true);
$id = $input['id'] ?? null;
$field = $input['field'] ?? '';

if (!$id || !in_array($field, ['wins', 'losses'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid input']);
    exit;
}

//  TODO: Write the query to update the leaderboard stats
$sql = "___FILL_FIELD_UPDATE_HERE___";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);

echo json_encode(['success' => true]);
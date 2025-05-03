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

$sql = "UPDATE leaderboard SET $field = $field + 1, matches = matches + 1 WHERE id = :id";
// Prepare the Database SQL Statement
$stmt = $pdo->prepare($sql);
// Run the SQL Statement
$stmt->execute([':id' => $id]);
// Respond to the Client with Success
echo json_encode(['success' => true]);
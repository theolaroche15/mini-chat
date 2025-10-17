<?php
include_once('db_connect.php');

$stmt = $pdo->prepare(
    "SELECT messages.content, users.username, messages.created_at
     FROM messages
     JOIN users ON messages.user_id = users.id
     ORDER BY messages.created_at ASC");

     $stmt->execute();
     $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
     return $messages;
?>
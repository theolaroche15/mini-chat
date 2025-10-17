<?php
include_once('db_connect.php');

$stmt = $pdo->prepare("SELECT username FROM users ORDER BY username ASC");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
return $users;
?>
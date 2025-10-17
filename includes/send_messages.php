<?php
include_once('db_connect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) &&
        isset($_POST['message'])) {

        $username = trim($_POST['username']);
        $message = trim($_POST['message']);
        $ip = $_SERVER['REMOTE_ADDR'];

        if (!empty($username) && !empty($message)) {
            $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch();

            if ($user) {
                $user_id = $user['id'];
            } else {
                $stmt = $pdo->prepare("INSERT INTO users (username) VALUES (?)");
                $stmt->execute([$username]);
                $user_id = $pdo->lastInsertId();
            }

            $now = date('Y-m-d H:i:s');
            $stmt = $pdo->prepare(
                "INSERT INTO messages(user_id, content, created_at, ip_address)
                 VALUES (?, ?, ?, ?)");
            $stmt->execute([$user_id, $message, $now, $ip]);

            header('Location: ../index.php');
            exit();
        } else {
            echo "Merci de remplir tout les champs.";
        }
    } else {
        echo "Formulaire incomplet.";
    }
}
?>
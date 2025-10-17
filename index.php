<?php
include_once('includes/db_connect.php');
include_once('includes/get_messages.php');
include_once('includes/get_users.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MINI-CHAT</title>
    <link rel="stylesheet" href="assets/styles.css">
</head>
<body>
    <div class="chat-window">
        <?php foreach ($messages as $message): ?>
            <p>[<?= $message['created_at'] ?>] <strong>
                <?= $message['username'] ?></strong> : 
                <?= $message['content'] ?></p>
        <?php endforeach; ?>
    </div>
    <form id="chat-form" method="POST" action="includes/send_messages.php">
        <input type="text" name="username" id="username" placeholder="Your name" required>
        <input type="text" name="message" id="message" placeholder="Your message" required>
        <button type="submit">Send</button>
    </form>    


    <script src="assets/script.js"></script>
</body>
</html>
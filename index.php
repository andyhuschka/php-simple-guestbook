<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gästebuch</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { margin-bottom: 20px; }
        textarea { width: 100%; height: 100px; }
        .message { border-bottom: 1px solid #ccc; margin-bottom: 10px; padding-bottom: 10px; }
    </style>
</head>
<body>
    <h1>Gästebuch</h1>
    
    <!-- Formular für die Eingabe -->
    <form action="save_message.php" method="post">
        <label for="name">Dein Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="message">Deine Nachricht:</label><br>
        <textarea id="message" name="message" required></textarea><br><br>
        
        <button type="submit">Nachricht senden</button>
    </form>

    <h2>Nachrichten</h2>
    <?php
    // Nachrichten anzeigen
    $file = 'messages.txt';
    if (file_exists($file)) {
        $messages = file($file, FILE_IGNORE_NEW_LINES);
        foreach ($messages as $entry) {
            list($name, $message) = explode('|', $entry);
            echo "<div class='message'><strong>" . htmlspecialchars($name) . "</strong>: " . htmlspecialchars($message) . "</div>";
        }
    } else {
        echo "<p>Noch keine Nachrichten.</p>";
    }
    ?>
</body>
</html>

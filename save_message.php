<?php
// Eingabedaten holen
$name = trim($_POST['name']);
$message = trim($_POST['message']);

// Datei, in der Nachrichten gespeichert werden
$file = 'messages.txt';

// Nachricht speichern
if (!empty($name) && !empty($message)) {
    $entry = $name . '|' . $message . PHP_EOL;
    file_put_contents($file, $entry, FILE_APPEND | LOCK_EX);
}

// Zurück zur Startseite
header('Location: index.php');
exit();
?>

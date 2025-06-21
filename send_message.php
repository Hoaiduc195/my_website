<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['message'])) {
        $username = htmlspecialchars($_POST['username']);
        $message = htmlspecialchars($_POST['message']);
        $timestamp = date('Y-m-d H:i:s');
        $log_entry = "[$timestamp] [$username]: $message\n";

        $log_file = 'messages.txt';

        if (file_put_contents($log_file, $log_entry, FILE_APPEND | LOCK_EX) !== false) {
            echo "Success!";
        } else {
            echo "Error: Can not send message.";
        }
    } else {
        echo "Please fill the blank.";
    }
} else {
    echo "Error: Invalid protocol.";
}
?>
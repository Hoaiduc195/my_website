<?php
header('Content-Type: application/json');

$log_file = 'messages.txt';
$messages = [];

if (file_exists($log_file)) {
    $lines = file($log_file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if ($lines) {
        foreach ($lines as $line) {
            if (preg_match('/^\[(.*?)\] \[(.*?)\]: (.*)$/', $line, $matches)) {
                $messages[] = [
                    'timestamp' => $matches[1],
                    'username' => $matches[2],
                    'message' => $matches[3]
                ];
            }
        }
        $messages = array_reverse($messages); 
    }
}

echo json_encode($messages);
?>
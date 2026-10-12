<?php
session_start();
require __DIR__ . '/db_config.php';
// Record each guest entry in MySQL so it is visible in phpMyAdmin.
$stmt = $pdo->prepare('INSERT INTO guest_logs (session_id, ip_address, user_agent) VALUES (?, ?, ?)');
$stmt->execute([session_id(), $_SERVER['REMOTE_ADDR'] ?? null, substr($_SERVER['HTTP_USER_AGENT'] ?? '', 0, 255)]);
session_regenerate_id(true);
$_SESSION['role'] = 'guest';
unset($_SESSION['user_id'], $_SESSION['user_name']);
header('Location: index.php');
exit;
?>

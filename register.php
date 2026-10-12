<?php
session_start();
require __DIR__ . '/db_config.php';
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['full_name'] ?? '');
    $email = strtolower(trim($_POST['email'] ?? ''));
    $password = $_POST['password'] ?? '';
    if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 8) {
        $error = 'Enter a valid name and email. Password must be at least 8 characters.';
    } else {
        try {
            $stmt = $pdo->prepare('INSERT INTO users (full_name, email, password_hash) VALUES (?, ?, ?)');
            $stmt->execute([$name, $email, password_hash($password, PASSWORD_DEFAULT)]);
            header('Location: login.php?registered=1'); exit;
        } catch (PDOException $e) {
            $error = ($e->getCode() === '23000') ? 'This email is already registered.' : 'Sign-up failed. Please try again.';
        }
    }
}
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Register | YMR</title><link rel="stylesheet" href="style.css"><link rel="stylesheet" href="auth.css"></head><body><header class="site-header"><div class="container nav"><a href="index.php" class="logo"><img src="IMAGE/logoYMR.png" alt="YMR International Marketing"></a><nav class="nav-links auth-nav"><a href="index.php">HOME</a><a href="login.php">LOG IN</a><a href="guest.php">GUEST</a></nav></div></header><main class="auth-wrap"><section class="auth-card"><div class="eyebrow">YMR INTERNATIONAL</div><h1>Create account</h1><p>Your account details will be saved securely in the MySQL database.</p><?php if ($error): ?><div class="error-msg"><?= htmlspecialchars($error) ?></div><?php endif; ?><form method="post"><label for="full_name">Full name</label><input id="full_name" name="full_name" autocomplete="name" required><label for="email">Email</label><input id="email" name="email" type="email" autocomplete="email" required><label for="password">Password (minimum 8 characters)</label><input id="password" name="password" type="password" minlength="8" autocomplete="new-password" required><button class="auth-submit" type="submit">SIGN UP</button></form><p class="auth-small">Already have an account? <a href="login.php">Log in</a></p></section></main></body></html>
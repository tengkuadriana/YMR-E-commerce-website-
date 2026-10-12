<?php
session_start();
require __DIR__ . '/db_config.php';
$error = '';
$notice = '';
if (isset($_GET['registered'])) $notice = 'Account created successfully. You can now log in.';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = strtolower(trim($_POST['email'] ?? ''));
    $password = $_POST['password'] ?? '';
    $stmt = $pdo->prepare('SELECT id, full_name, email, password_hash FROM users WHERE email = ? LIMIT 1');
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    $success = $user && password_verify($password, $user['password_hash']);
    $log = $pdo->prepare('INSERT INTO login_logs (user_id, email_entered, status, ip_address) VALUES (?, ?, ?, ?)');
    $log->execute([$success ? $user['id'] : null, $email, $success ? 'success' : 'failed', $_SERVER['REMOTE_ADDR'] ?? null]);
    if ($success) {
        session_regenerate_id(true);
        $_SESSION['user_id'] = (int)$user['id'];
        $_SESSION['user_name'] = $user['full_name'];
        $_SESSION['role'] = 'user';
        header('Location: index.php');
        exit;
    }
    $error = 'Incorrect email or password.';
}
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Log In | YMR</title><link rel="stylesheet" href="style.css"><link rel="stylesheet" href="auth.css"></head>
<body><header class="site-header"><div class="container nav"><a href="index.php" class="logo"><img src="IMAGE/logoYMR.png" alt="YMR International Marketing"></a><nav class="nav-links auth-nav"><a href="index.php">HOME</a><a href="business.html">BUSINESS</a><a href="login.php" class="nav-auth active">LOG IN</a><a href="guest.php" class="nav-guest">GUEST</a></nav></div></header>
<main class="auth-wrap"><section class="auth-card"><div class="eyebrow">YMR INTERNATIONAL</div><h1>Log in</h1><p>Log in to continue to the YMR website.</p>
<?php if ($notice): ?><div class="success-msg"><?= htmlspecialchars($notice) ?></div><?php endif; ?>
<?php if ($error): ?><div class="error-msg"><?= htmlspecialchars($error) ?></div><?php endif; ?>
<form method="post" action="login.php"><label for="email">Email</label><input id="email" name="email" type="email" autocomplete="email" required><label for="password">Password</label><input id="password" name="password" type="password" autocomplete="current-password" required><button class="auth-submit" type="submit">LOG IN</button></form>
<p class="auth-small">Don't have an account? <a href="register.php">Sign up</a></p><a class="guest-link" href="guest.php">GUEST</a></section></main></body></html>
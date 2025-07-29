<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>
<h1>Bem-vindo, <?= htmlspecialchars($_SESSION['user']) ?>!</h1>
<p><a href="logout.php">Sair</a></p>

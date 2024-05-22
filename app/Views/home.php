<?php
$title = 'Home';
include 'template/header.php';
?>

<main>
    <h1>Welcome to the Home Page!</h1>
    <?= esc($greeting) ?>, <?= esc(session()->get('username')) ?>!
    <a href="<?= site_url('profil') ?>">Profil</a>
    <a href="<?= site_url('auth/logout') ?>">Logout</a>
</main>
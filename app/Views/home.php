<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="<?= base_url('style.css') ?>">
</head>
<body>
    <h1>Welcome to the Home Page!</h1>
    <?= $greeting ?>, <?= session()->get('username') ?>!
    <br>
    <a href="<?= site_url('profil') ?>">Profil</a>
    <a href="<?= site_url('auth/logout') ?>">Logout</a>
    <br>
    
</body>
</html>

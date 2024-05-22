<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= isset($page) && $page == 'register' ? 'Register' : 'Login' ?></title>
    <link rel="stylesheet" href="<?= base_url('style.css') ?>">
</head>
<body>
    <?php if (isset($page) && $page == 'register') : ?>
        <div class="vid-container">
            <video class="bgvid" autoplay muted loop>
                <source src="<?= base_url('bg/background.mp4') ?>" type="video/mp4">
            </video>
            <div class="inner-container">
                <div class="box">
                    <h1>Daftar</h1>
                    <form action="<?= site_url('register') ?>" method="post">
                        <input type="text" name="username" placeholder="Username" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <button type="submit">Daftar</button>
                    </form>
                    <p>Already a member? <a href="<?= site_url('/') ?>">Login</a></p>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="vid-container">
            <video class="bgvid" autoplay muted loop>
                <source src="<?= base_url('bg/background.mp4') ?>" type="video/mp4">
            </video>
            <div class="inner-container">
                <div class="box">
                    <h1>Login</h1>
                    <form action="<?= site_url('login') ?>" method="post">
                        <input type="text" name="username" placeholder="Username" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <button type="submit">Login</button>
                    </form>
                    <p>Not a member? <a href="<?= site_url('?page=register') ?>">Sign Up</a></p>
                </div>
            </div>
        </div>
    <?php endif; ?>
</body>
</html>

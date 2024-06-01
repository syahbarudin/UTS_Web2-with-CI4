<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Siakad | <?= $title ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('style.css') ?>">
    <link rel="icon" type="image/png" href="<?= base_url('assets/upb.png') ?>">
</head>
<body>
<?php if (!isset($is_auth_page) || !$is_auth_page) : ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Siakad</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <?php if (current_url() == site_url('profil')) : ?>
          <a class="nav-link" href="<?= site_url('home') ?>">
            <img src="<?= base_url('backicon.png') ?>" alt="Kembali" style="width: 30px; height: 30px;">
          </a>
        <?php else : ?>
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="<?= base_url('aseets/Menu.png') ?>" alt="Menu" style="width: 30px; height: 30px;">
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?= site_url('profil') ?>">Profil</a>
            <a class="dropdown-item" href="<?= site_url('auth/logout') ?>">Logout</a>
          </div>
        <?php endif; ?>
      </li>
    </ul>
  </div>
</nav>
<?php endif; ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $('#navbarDropdownMenuLink').on('click', function (event) {
            var $dropdownMenu = $(this).next('.dropdown-menu');
            if ($dropdownMenu.is(':visible')) {
                $dropdownMenu.hide();
            } else {
                $dropdownMenu.show();
            }
        });

        $(document).on('click', function (e) {
            if (!$(e.target).closest('.nav-item.dropdown').length) {
                $('.dropdown-menu').hide();
            }
        });
    });
</script>
</body>
</html>

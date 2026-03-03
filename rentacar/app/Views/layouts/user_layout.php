<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?? 'RentACar' ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/home.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/detail.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/css/history.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">RentACar</a>

        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">

                <?php if(session()->get('logged_in')): ?>

                    <li class="nav-item">
                        <span class="nav-link text-light">
                            Hi, <?= session()->get('name') ?>
                        </span>
                    </li>

                    <li class="nav-item">
                        <a href="/" class="nav-link text-white">
                            Home
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?= site_url('history') ?>" class="nav-link text-white">
                            History
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="/logout" class="nav-link text-danger">
                            Logout
                        </a>
                    </li>

                <?php else: ?>

                    <li class="nav-item">
                        <a href="/login" class="nav-link">
                            Login
                        </a>
                    </li>

                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>

<div style="padding-top:100px;">
    <?= $this->renderSection('content') ?>
</div>

<!-- FOOTER -->
<footer>
    © <?= date('Y') ?> RentACar
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
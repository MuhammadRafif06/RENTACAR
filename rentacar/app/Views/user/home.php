<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>RentACar | Explore Cars</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/home.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">RentACar</a>

            <div class="collapse navbar-collapse justify-content-end">
                <ul class="navbar-nav">
                    <?php if (session()->get('logged_in')): ?>
                        <li class="nav-item">
                            <span class="nav-link text-light">
                                Hi, <?= session()->get('name') ?>
                            </span>
                        </li>

                        <li class="nav-item">
                            <a href="/" class="nav-link text-white">
                                Home
                            </a>

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
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section class="hero d-flex align-items-center justify-content-center">
        <div>
            <h1>Explore Most Popular Cars</h1>
            <p>Find and rent your dream car easily.</p>
        </div>
    </section>

    <!-- CARS -->
    <section class="car-section">
        <div class="container">
            <h2 class="fw-bold text-center mb-5">Available Cars</h2>

            <div class="row g-4">

                <?php foreach ($cars as $car): ?>
                    <div class="col-md-4">

                        <div class="car-card">

                            <?php if ($car['image']): ?>
                                <img src="<?= base_url('uploads/' . $car['image']) ?>">
                            <?php else: ?>
                                <img src="https://via.placeholder.com/400x230">
                            <?php endif; ?>

                            <div class="car-info">
                                <h5><?= esc($car['brand']) ?>     <?= esc($car['model']) ?></h5>

                                <p>
                                    <?= esc($car['category_name'] ?? 'Category') ?> •
                                    <?= esc($car['year']) ?>
                                </p>

                                <p>
                                    <strong>
                                        Rp <?= number_format($car['price_per_day'], 0, ',', '.') ?> / day
                                    </strong>
                                </p>

                                <a href="<?= site_url('cars/' . $car['id']) ?>" class="btn btn-rent">
                                    Rent Now
                                </a>
                            </div>

                        </div>

                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>

    <footer>
        © <?= date('Y') ?> RentACar
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
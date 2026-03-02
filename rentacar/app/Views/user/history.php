<!DOCTYPE html>
<html>

<head>
    <title>Rental History</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/history.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>

    <div class="container py-5">

        <h2 class="fw-bold mb-5 text-center">Your Rental History</h2>

        <?php if (empty($bookings)): ?>
            <div class="text-center text-secondary">
                Belum ada booking 😢
            </div>
        <?php else: ?>

            <div class="row g-4">

                <?php foreach ($bookings as $b): ?>

                    <div class="col-lg-6">

                        <div class="history-card">

                            <div class="row g-3 align-items-center">

                                <div class="col-4">
                                    <?php if ($b['image']): ?>
                                        <img src="<?= base_url('uploads/' . $b['image']) ?>">
                                    <?php else: ?>
                                        <img src="https://via.placeholder.com/300x200">
                                    <?php endif; ?>
                                </div>

                                <div class="col-8">

                                    <h5 class="fw-bold mb-1">
                                        <?= esc($b['brand']) ?>         <?= esc($b['model']) ?>
                                    </h5>

                                    <p class="text-secondary mb-1">
                                        <?= esc($b['start_date']) ?> → <?= esc($b['end_date']) ?>
                                    </p>

                                    <p class="fw-bold text-danger mb-2">
                                        Rp <?= number_format($b['total_price'], 0, ',', '.') ?>
                                    </p>

                                    <span class="status-badge <?= $b['status'] ?>">
                                        <?= strtoupper($b['status']) ?>
                                    </span>

                                </div>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </div>

</body>

</html>
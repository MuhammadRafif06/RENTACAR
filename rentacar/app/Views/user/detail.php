<!DOCTYPE html>
<html>
<head>
    <title>Booking Mobil</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/detail.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>

<?= $this->extend('layouts/user_layout') ?>
<?= $this->section('content') ?>

<div class="container detail-wrapper">

    <div class="row g-5">

        <div class="col-lg-6">
            <div class="car-preview">
                <img src="<?= base_url('uploads/'.$car['image']) ?>">
                <div class="p-4">
                    <h3 class="fw-bold">
                        <?= esc($car['brand']) ?> <?= esc($car['model']) ?>
                    </h3>
                    <h4 class="text-danger">
                        Rp <?= number_format($car['price_per_day'],0,',','.') ?> / day
                    </h4>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="booking-card">
                <h4 class="fw-bold mb-4">Form Booking</h4>

                <form method="post" action="<?= site_url('cars/book/'.$car['id']) ?>">
                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label>Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" class="form-control" required>
                    </div>

                    <button class="btn btn-book w-100">
                        Konfirmasi Booking
                    </button>
                </form>

            </div>
        </div>

    </div>

</div>

<?= $this->endSection() ?>

<script>
const pricePerDay = <?= $car['price_per_day'] ?>;
const startInput = document.getElementById('startDate');
const endInput = document.getElementById('endDate');
const totalEl = document.getElementById('totalPrice');

function calculateTotal() {
    const start = new Date(startInput.value);
    const end = new Date(endInput.value);

    if(start && end && end >= start) {
        const days = Math.ceil((end - start) / (1000 * 60 * 60 * 24)) || 1;
        const total = days * pricePerDay;
        totalEl.innerText = "Rp " + total.toLocaleString('id-ID');
    } else {
        totalEl.innerText = "Rp 0";
    }
}

startInput.addEventListener('change', calculateTotal);
endInput.addEventListener('change', calculateTotal);
</script>

</body>
</html>
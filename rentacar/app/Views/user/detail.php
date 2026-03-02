<!DOCTYPE html>
<html>
<head>
    <title>Booking Mobil</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/detail.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>

<div class="container detail-wrapper">

    <div class="row g-5 align-items-start">

        <!-- LEFT SIDE -->
        <div class="col-lg-6">

            <div class="car-preview">

                <?php if($car['image']): ?>
                    <img src="<?= base_url('uploads/'.$car['image']) ?>">
                <?php else: ?>
                    <img src="https://via.placeholder.com/600x320">
                <?php endif; ?>

                <div class="p-4">
                    <h3 class="fw-bold mb-2">
                        <?= esc($car['brand']) ?> <?= esc($car['model']) ?>
                    </h3>

                    <p class="text-secondary mb-2">
                        <?= esc($car['year']) ?> • <?= esc($car['category'] ?? 'Premium Class') ?>
                    </p>

                    <h4 class="text-danger fw-bold">
                        Rp <?= number_format($car['price_per_day'],0,',','.') ?> / day
                    </h4>
                </div>

            </div>

        </div>

        <!-- RIGHT SIDE -->
        <div class="col-lg-6">

            <div class="booking-card">

                <h4 class="fw-bold mb-4">Form Booking</h4>

                <form method="post" action="<?= site_url('cars/book/'.$car['id']) ?>">

                    <?= csrf_field() ?>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" id="startDate" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" id="endDate" class="form-control" required>
                    </div>

                    <div class="mb-4 total-box">
                        <small class="text-secondary">Total Harga</small>
                        <h4 class="text-danger fw-bold" id="totalPrice">Rp 0</h4>
                    </div>

                    <button type="submit" class="btn btn-book w-100 py-2">
                        Konfirmasi Booking
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

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
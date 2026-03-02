<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title><?= esc($car['brand']) ?> <?= esc($car['model']) ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <div class="max-w-5xl mx-auto py-12 px-6">

        <a href="/" class="text-blue-600 font-bold mb-6 inline-block">
            ← Back
        </a>

        <div class="bg-white rounded-2xl shadow-lg overflow-hidden grid md:grid-cols-2">

            <div class="bg-gray-100 flex items-center justify-center p-6">
                <?php if ($car['image']): ?>
                    <img src="<?= base_url('uploads/' . $car['image']) ?>" class="h-80 object-contain">
                <?php endif; ?>
            </div>

            <div class="p-8">

                <h1 class="text-3xl font-extrabold mb-2">
                    <?= esc($car['brand']) ?> <?= esc($car['model']) ?>
                </h1>

                <p class="text-gray-500 mb-4">
                    Year <?= esc($car['year']) ?>
                </p>

                <p class="text-2xl font-bold text-blue-600 mb-6">
                    $<?= esc($car['price_per_day']) ?> / day
                </p>

                <hr class="mb-6">

                <h3 class="font-bold mb-4">Book This Car</h3>

                <form method="POST" action="<?= site_url('cars/book/' . $car['id']) ?>">

                    <div class="mb-4">
                        <label class="block text-sm font-semibold mb-1">Start Date</label>
                        <input type="date" name="start_date" required class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm font-semibold mb-1">End Date</label>
                        <input type="date" name="end_date" required class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <button
                        class="w-full bg-blue-600 text-white py-3 rounded-xl font-bold hover:bg-blue-700 transition">
                        Confirm Booking
                    </button>

                </form>

            </div>
        </div>

    </div>

</body>

</html>
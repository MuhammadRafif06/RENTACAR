<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>RentACar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-50">

    <!-- NAVBAR -->
    <nav class="bg-white shadow-sm">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-extrabold text-blue-600">RentACar</h1>
            <a href="/login" class="text-sm font-semibold text-gray-600 hover:text-blue-600">Login</a>
        </div>
    </nav>

    <!-- HERO -->
    <section class="bg-blue-600 text-white py-20 text-center">
        <h2 class="text-4xl font-extrabold mb-4">Find Your Perfect Ride</h2>
        <p class="text-lg text-blue-100">Affordable, Reliable, Professional Car Rental</p>
    </section>

    <!-- CARS -->
    <section class="max-w-6xl mx-auto px-6 py-16">

        <h3 class="text-3xl font-bold mb-10 text-center">Available Cars</h3>

        <?php if (empty($cars)): ?>
            <p class="text-center text-gray-500">No cars available</p>
        <?php else: ?>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <?php foreach ($cars as $car): ?>

                    <div class="bg-white rounded-2xl shadow hover:shadow-xl transition overflow-hidden">

                        <div class="h-48 bg-gray-100 flex items-center justify-center">
                            <?php if ($car['image']): ?>
                                <img src="<?= base_url('uploads/' . $car['image']) ?>" class="h-full object-contain p-4">
                            <?php else: ?>
                                <div class="text-gray-400">No Image</div>
                            <?php endif; ?>
                        </div>

                        <div class="p-6">
                            <h4 class="text-xl font-bold mb-1">
                                <?= esc($car['brand']) ?>         <?= esc($car['model']) ?>
                            </h4>

                            <p class="text-gray-500 text-sm mb-4">
                                Year <?= esc($car['year']) ?>
                            </p>

                            <div class="flex justify-between items-center">
                                <div>
                                    <span class="text-2xl font-bold text-blue-600">
                                        $<?= esc($car['price_per_day']) ?>
                                    </span>
                                    <span class="text-sm text-gray-500">/day</span>
                                </div>

                                <a href="<?= site_url('cars/' . $car['id']) ?>"
                                    class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-700 transition">
                                    View
                                </a>
                            </div>
                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </section>

</body>

</html>
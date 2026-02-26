<!DOCTYPE html>
<html class="dark" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>AutoLease Elite</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap"
        rel="stylesheet" />

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        primary: "#137fec",
                        background: "#101922"
                    },
                    fontFamily: {
                        display: ["Plus Jakarta Sans"]
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>

</head>

<body class="bg-background text-white">

    <!-- HEADER -->
    <header class="flex justify-between items-center px-10 py-6 border-b border-slate-800">

        <h2 class="text-2xl font-extrabold text-primary">
            AutoLease
        </h2>

        <nav class="flex gap-8 text-sm font-semibold text-slate-400">
            <a href="/" class="text-primary">Home</a>
            <a href="#">My Bookings</a>
            <a href="#">Contact</a>
        </nav>

    </header>


    <!-- HERO -->
    <section class="relative h-[420px] flex items-center px-16 overflow-hidden">

        <div class="absolute inset-0 bg-gradient-to-r from-black via-black/70 to-transparent"></div>

        <div class="relative z-10 max-w-xl">

            <h1 class="text-5xl font-extrabold leading-tight mb-4">
                Experience Luxury<br>Without Limits
            </h1>

            <p class="text-slate-300 mb-6">
                Discover premium cars available instantly for booking.
            </p>

            <a href="#cars" class="bg-primary px-6 py-3 rounded-xl font-bold hover:bg-primary/90 transition">
                Explore Collection
            </a>

        </div>

    </section>


    <!-- AVAILABLE VEHICLES -->
    <section id="cars" class="px-16 py-16">

        <div class="flex justify-between items-center mb-10">
            <div>
                <h2 class="text-3xl font-extrabold">Available Vehicles</h2>
                <p class="text-slate-400 text-sm">
                    Showing <?= count($cars) ?> cars ready to rent
                </p>
            </div>
        </div>


        <?php if (empty($cars)): ?>

            <p class="text-slate-500">No cars available right now.</p>

        <?php else: ?>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

                <?php foreach ($cars as $car): ?>

                    <div
                        class="group bg-slate-900 border border-slate-800 rounded-2xl overflow-hidden hover:shadow-xl hover:shadow-primary/10 transition-all duration-300">

                        <!-- IMAGE -->
                        <div class="relative h-52 bg-slate-800 flex items-center justify-center overflow-hidden">

                            <?php if ($car['image']): ?>
                                <img src="<?= base_url('uploads/' . $car['image']) ?>"
                                    class="h-full object-contain p-6 group-hover:scale-105 transition duration-500">
                            <?php else: ?>
                                <div class="text-slate-500">No Image</div>
                            <?php endif; ?>

                        </div>

                        <!-- CONTENT -->
                        <div class="p-6">

                            <h3 class="text-lg font-bold mb-1">
                                <?= esc($car['brand']) ?>         <?= esc($car['model']) ?>
                            </h3>

                            <p class="text-slate-400 text-xs mb-4">
                                Year <?= esc($car['year']) ?>
                            </p>

                            <div class="flex items-center justify-between">

                                <div>
                                    <span class="text-2xl font-extrabold text-primary">
                                        $<?= esc($car['price_per_day']) ?>
                                    </span>
                                    <span class="text-xs text-slate-400">/ day</span>
                                </div>

                                <a href="<?= site_url('cars/' . $car['id']) ?>"
                                    class="bg-primary text-white text-sm font-bold px-4 py-2 rounded-lg hover:bg-primary/90 transition">
                                    Rent Now
                                </a>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </section>


    <!-- FOOTER -->
    <footer class="border-t border-slate-800 py-8 text-center text-slate-500 text-sm">
        © <?= date('Y') ?> AutoLease Elite. All rights reserved.
    </footer>

</body>

</html>
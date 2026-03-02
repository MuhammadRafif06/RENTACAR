<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="min-h-screen p-8">

    <h1 class="text-3xl font-extrabold mb-6">
        My Rentals
    </h1>

    <div class="grid gap-6">

        <?php if(empty($bookings)): ?>
            <div class="p-6 bg-white rounded-xl shadow">
                You have no bookings yet.
            </div>
        <?php endif; ?>

        <?php foreach($bookings as $b): ?>

            <div class="flex gap-6 bg-white p-6 rounded-xl shadow">

                <img src="<?= base_url('uploads/'.$b['image']) ?>"
                     class="w-32 h-24 object-cover rounded-lg">

                <div class="flex-1">

                    <h2 class="text-xl font-bold">
                        <?= esc($b['brand']) ?> <?= esc($b['model']) ?>
                    </h2>

                    <p class="text-sm text-slate-500">
                        <?= $b['start_date'] ?> → <?= $b['end_date'] ?>
                    </p>

                    <span class="mt-2 inline-block px-3 py-1 text-xs bg-primary/10 text-primary rounded-full">
                        <?= esc($b['status']) ?>
                    </span>

                </div>

            </div>

        <?php endforeach; ?>

    </div>

</div>

<?= $this->endSection() ?>
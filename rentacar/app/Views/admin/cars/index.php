<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="min-h-screen bg-background-light dark:bg-background-dark">

    <!-- HEADER BAR -->
    <div
        class="flex items-center justify-between px-8 py-6 border-b border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900">

        <div>
            <h1 class="text-2xl font-extrabold">
                Fleet & Inventory
            </h1>
            <p class="text-sm text-slate-500">
                Manage all registered vehicles
            </p>
        </div>

        <div class="flex items-center gap-4">

            <!-- BACK TO DASHBOARD -->
            <a href="<?= site_url('admin/dashboard') ?>"
                class="px-4 py-2 rounded-lg bg-slate-100 dark:bg-slate-800 text-sm font-semibold hover:bg-slate-200 dark:hover:bg-slate-700 transition">
                ← Back to Dashboard
            </a>

            <!-- ADD NEW -->
            <a href="<?= site_url('admin/cars/create') ?>"
                class="px-4 py-2 rounded-lg bg-primary text-white text-sm font-bold">
                + Add New Car
            </a>

        </div>
    </div>

    <!-- TABLE SECTION -->
    <div class="p-8">

        <div class="bg-white dark:bg-slate-900 rounded-xl shadow overflow-hidden">
            <table class="w-full text-left">

                <thead class="bg-slate-100 dark:bg-slate-800 text-xs uppercase text-slate-500">
                    <tr>
                        <th class="px-6 py-4">Vehicle</th>
                        <th class="px-6 py-4">Rate / Day</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Action</th>
                    </tr>
                </thead>

                <tbody>

                    <?php foreach ($cars as $car): ?>
                        <tr
                            class="border-b border-slate-100 dark:border-slate-800 hover:bg-slate-50 dark:hover:bg-slate-800 transition">

                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">

                                    <?php if ($car['image']): ?>
                                        <img src="<?= base_url('uploads/' . $car['image']) ?>"
                                            class="w-14 h-14 object-cover rounded-lg border">
                                    <?php else: ?>
                                        <div class="w-14 h-14 bg-slate-200 rounded-lg"></div>
                                    <?php endif; ?>
                                    <div class="font-bold">
                                        <?= esc($car['brand']) ?>     <?= esc($car['model']) ?>
                                    </div>
                                    <div class="text-xs text-slate-500">
                                        Year: <?= esc($car['year']) ?>
                                    </div>
                            </td>

                            <td class="px-6 py-4 font-bold">
                                Rp<?= esc($car['price_per_day']) ?>
                            </td>

                            <td class="px-6 py-4">
                                <span class="px-2 py-1 text-xs rounded-full bg-primary/10 text-primary">
                                    <?= esc($car['status']) ?>
                                </span>
                            </td>

                            <td class="px-6 py-4 text-right">
                                <a href="<?= site_url('admin/cars/edit/' . $car['id']) ?>"
                                    class="text-primary font-bold mr-4 hover:underline">
                                    Edit
                                </a>
                                <form action="<?= site_url('admin/cars/delete/' . $car['id']) ?>" method="post"
                                    style="display:inline;"
                                    onsubmit="return confirm('Are you sure you want to delete this car?');">

                                    <?= csrf_field() ?>

                                    <button type="submit" class="text-red-500 font-bold hover:underline">
                                        Delete
                                    </button>

                                </form>
                            </td>

                        </tr>
                    <?php endforeach; ?>

                </tbody>

            </table>
        </div>

    </div>
</div>

<?= $this->endSection() ?>
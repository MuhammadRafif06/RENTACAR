<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="min-h-screen p-8">

    <div class="max-w-2xl mx-auto bg-white dark:bg-slate-900 p-8 rounded-xl shadow">

        <h1 class="text-2xl font-extrabold mb-6">
            Edit Car
        </h1>

        <form action="<?= site_url('admin/cars/update/' . $car['id']) ?>" method="post" enctype="multipart/form-data"
            class="space-y-5">

            <div>
                <label class="block text-sm font-bold mb-2">Brand</label>
                <input type="text" name="brand" value="<?= esc($car['brand']) ?>"
                    class="w-full p-3 rounded-lg border border-slate-300 dark:bg-slate-800">
            </div>

            <div>
                <label class="block text-sm font-bold mb-2">Model</label>
                <input type="text" name="model" value="<?= esc($car['model']) ?>"
                    class="w-full p-3 rounded-lg border border-slate-300 dark:bg-slate-800">
            </div>

            <div>
                <label class="block text-sm font-bold mb-2">Year</label>
                <input type="number" name="year" value="<?= esc($car['year']) ?>"
                    class="w-full p-3 rounded-lg border border-slate-300 dark:bg-slate-800">
            </div>

            <div>
                <label class="block text-sm font-bold mb-2">Price Per Day</label>
                <input type="number" name="price_per_day" value="<?= esc($car['price_per_day']) ?>"
                    class="w-full p-3 rounded-lg border border-slate-300 dark:bg-slate-800">
            </div>

            <div>
                <label class="block text-sm font-bold mb-2">Status</label>
                <select name="status" class="w-full p-3 rounded-lg border border-slate-300 dark:bg-slate-800">

                    <option value="available" <?= $car['status'] == 'available' ? 'selected' : '' ?>>Available</option>
                    <option value="rented" <?= $car['status'] == 'rented' ? 'selected' : '' ?>>Rented</option>
                    <option value="maintenance" <?= $car['status'] == 'maintenance' ? 'selected' : '' ?>>Maintenance</option>

                </select>
            </div>

            <div>
                <label class="block text-sm font-bold mb-2">Current Image</label>

                <?php if ($car['image']): ?>
                    <img src="<?= base_url('uploads/' . $car['image']) ?>" class="w-32 h-32 object-cover rounded-lg mb-3">
                <?php else: ?>
                    <p class="text-sm text-slate-500">No image</p>
                <?php endif; ?>

                <input type="file" name="image" class="w-full p-3 rounded-lg border border-slate-300 dark:bg-slate-800">
            </div>

            <div class="flex justify-between">

                <a href="<?= site_url('admin/cars') ?>" class="px-4 py-2 bg-slate-200 rounded-lg font-semibold">
                    Cancel
                </a>

                <button type="submit" class="px-6 py-2 bg-primary text-white rounded-lg font-bold">
                    Update Car
                </button>

            </div>

        </form>

    </div>
</div>

<?= $this->endSection() ?>
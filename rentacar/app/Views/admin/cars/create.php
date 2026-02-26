<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="min-h-screen p-8">

    <div class="max-w-2xl mx-auto bg-white dark:bg-slate-900 p-8 rounded-xl shadow">

        <h1 class="text-2xl font-extrabold mb-6">
            Add New Car
        </h1>

        <form action="<?= site_url('admin/cars/store') ?>" method="post" enctype="multipart/form-data"
            class="space-y-5">

            <div>
                <label class="block text-sm font-bold mb-2">Brand</label>
                <input type="text" name="brand" required
                    class="w-full p-3 rounded-lg border border-slate-300 dark:bg-slate-800">
            </div>

            <div>
                <label class="block text-sm font-bold mb-2">Model</label>
                <input type="text" name="model" required
                    class="w-full p-3 rounded-lg border border-slate-300 dark:bg-slate-800">
            </div>

            <div>
                <label class="block text-sm font-bold mb-2">Year</label>
                <input type="number" name="year" required
                    class="w-full p-3 rounded-lg border border-slate-300 dark:bg-slate-800">
            </div>

            <div>
                <label class="block text-sm font-bold mb-2">Price Per Day</label>
                <input type="number" name="price_per_day" required
                    class="w-full p-3 rounded-lg border border-slate-300 dark:bg-slate-800">
            </div>

            <div>
                <label class="block text-sm font-bold mb-2">Status</label>
                <select name="status" class="w-full p-3 rounded-lg border border-slate-300 dark:bg-slate-800">
                    <option value="available">Available</option>
                    <option value="rented">Rented</option>
                    <option value="maintenance">Maintenance</option>
                </select>
            </div>

            <div>
                <label class="block text-sm font-bold mb-2">Car Image</label>
                <input type="file" name="image" class="w-full p-3 rounded-lg border border-slate-300 dark:bg-slate-800">
            </div>

            <div class="flex justify-between">

                <a href="<?= site_url('admin/cars') ?>" class="px-4 py-2 bg-slate-200 rounded-lg font-semibold">
                    Cancel
                </a>

                <button type="submit" class="px-6 py-2 bg-primary text-white rounded-lg font-bold">
                    Save Car
                </button>

            </div>

        </form>

    </div>
</div>

<?= $this->endSection() ?>
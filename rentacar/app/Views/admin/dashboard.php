<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="flex min-h-screen bg-background-light dark:bg-background-dark">

    <!-- SIDEBAR -->
    <aside
        class="hidden xl:flex w-72 flex-col border-r border-slate-200 dark:border-slate-800 bg-white dark:bg-background-dark p-6 gap-8">

        <div>
            <h2 class="text-xl font-bold text-primary mb-6">
                DriveAdmin
            </h2>

            <div class="flex flex-col gap-2">
                <a href="/admin/dashboard" class="px-3 py-2 rounded-lg bg-primary/10 text-primary font-semibold">
                    Overview
                </a>

                <a href="<?= site_url('admin/cars') ?>"
                    class="px-3 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800">
                    Vehicle Management
                </a>

                <a href="#" class="px-3 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800">
                    Bookings
                </a>

                <a href="#" class="px-3 py-2 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800">
                    Users
                </a>
            </div>
        </div>

        <div class="mt-auto">
            <p class="text-sm text-slate-400">
                Logged in as:
            </p>
            <p class="font-bold">
                <?= session()->get('name') ?>
            </p>

            <a href="/logout" class="mt-4 inline-block text-red-500 text-sm font-semibold">
                Logout
            </a>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="flex-1 p-8">

        <h1 class="text-3xl font-extrabold mb-8">
            Analytics Overview
        </h1>

        <!-- KPI -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

            <div class="p-6 rounded-xl bg-white dark:bg-slate-900 shadow">
                <p class="text-sm text-slate-500">Total Cars</p>
                <p class="text-2xl font-bold mt-2"><?= $totalCars ?></p>
            </div>

            <div class="p-6 rounded-xl bg-white dark:bg-slate-900 shadow">
                <p class="text-sm text-slate-500">Available</p>
                <p class="text-2xl font-bold mt-2"><?= $available ?></p>
            </div>

            <div class="p-6 rounded-xl bg-white dark:bg-slate-900 shadow">
                <p class="text-sm text-slate-500">Rented</p>
                <p class="text-2xl font-bold mt-2"><?= $available ?></p>
            </div>

            <div class="p-6 rounded-xl bg-white dark:bg-slate-900 shadow">
                <p class="text-sm text-slate-500">Fleet Utilization</p>
                <p class="text-2xl font-bold mt-2"><?= $utilization ?>%</p>
            </div>

        </div>

    </div>
</div>

<?= $this->endSection() ?>
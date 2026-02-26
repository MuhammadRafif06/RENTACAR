<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="flex min-h-screen flex-col lg:flex-row">

    <!-- RIGHT SIDE FORM ONLY (biar ringkas dulu) -->
    <div class="flex flex-1 flex-col justify-center px-6 py-12 lg:px-24">

        <div class="mx-auto w-full max-w-sm lg:w-96">

            <h2 class="text-3xl font-extrabold">Welcome back</h2>

            <?php if (session()->getFlashdata('error')): ?>
                <p class="text-red-500 mt-2">
                    <?= session()->getFlashdata('error') ?>
                </p>
            <?php endif; ?>

            <form action="/process-login" method="POST" class="space-y-6 mt-6">

                <?= csrf_field() ?>

                <div>
                    <input name="email" type="email" placeholder="Email Address" required
                        class="block w-full rounded-lg py-3 px-4 ring-1 ring-slate-300 focus:ring-2 focus:ring-primary placeholder:text-slate-400" />
                </div>

                <div>
                    <input name="password" type="password" placeholder="Password" required
                        class="block w-full rounded-lg py-3 px-4 ring-1 ring-slate-300 focus:ring-2 focus:ring-primary placeholder:text-slate-400" />
                </div>

                <button type="submit"
                    class="flex w-full justify-center rounded-lg bg-primary px-4 py-3 text-sm font-bold text-white hover:opacity-90">
                    Sign in
                </button>

            </form>

            <p class="mt-4 text-sm">
                Don't have an account?
                <a href="/register" class="text-primary font-semibold">Register</a>
            </p>

        </div>
    </div>
</div>

<?= $this->endSection() ?>
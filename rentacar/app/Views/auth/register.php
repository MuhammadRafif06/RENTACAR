<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="flex min-h-screen flex-col lg:flex-row">

    <div class="flex flex-1 flex-col justify-center px-6 py-12 lg:px-24">

        <div class="mx-auto w-full max-w-sm lg:w-96">

            <h2 class="text-3xl font-extrabold">
                Create Account
            </h2>

            <form action="<?= site_url('process-register') ?>" method="POST" class="space-y-6 mt-6">

                <?= csrf_field() ?>

                <input name="name" type="text" placeholder="Full Name" required
                    class="block w-full rounded-lg py-3 px-4 ring-1 ring-slate-300">

                <input name="email" type="email" placeholder="Email Address" required
                    class="block w-full rounded-lg py-3 px-4 ring-1 ring-slate-300">

                <input name="password" type="password" placeholder="Password" required
                    class="block w-full rounded-lg py-3 px-4 ring-1 ring-slate-300">

                <button type="submit"
                    class="flex w-full justify-center rounded-lg bg-primary px-4 py-3 text-sm font-bold text-white">
                    Register
                </button>

            </form>

            <p class="mt-4 text-sm">
                Already have an account?
                <a href="/login" class="text-primary font-semibold">Login</a>
            </p>

        </div>

    </div>
</div>

<?= $this->endSection() ?>
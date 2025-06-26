<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light">

<?= $this->include('partials/head') ?>

<body>

    <section class="auth bg-base d-flex flex-wrap">
        <div class="auth-left d-lg-block d-none">
            <div class="d-flex align-items-center flex-column h-100 justify-content-center">
                <img src="<?= base_url('assets/images/auth/auth-img.png') ?>" alt="">
            </div>
        </div>
        <div class="auth-right py-32 px-24 d-flex flex-column justify-content-center">
            <div class="max-w-464-px mx-auto w-100">
                <div>
                    <a href="<?= route_to('index') ?>" class="mb-40 max-w-290-px">
                        <img src="<?= base_url('assets/images/logo.png') ?>" alt="">
                    </a>
                    <h4 class="mb-12">Masuk</h4>
                    <p class="mb-32 text-secondary-light text-lg">Selamat Datang! Masukkan Username dan Kata Sandi Anda</p>
                </div>
                <!-- Display error message if any -->
                <?php if (session()->getFlashdata('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('error') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('success') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                <form method="POST" action="<?= route_to('signinProcess') ?>" id="signin-form">
                    <?= csrf_field() ?> <!-- CSRF Token -->
                    <div class="icon-field mb-16">
                        <span class="icon top-50 translate-middle-y">
                            <iconify-icon icon="solar:shield-user-broken"></iconify-icon>
                        </span>
                        <input type="text" name="nip_pegawai" id="nip_pegawai" class="form-control h-56-px bg-neutral-50 radius-12" placeholder="NIP" required>
                    </div>
                    <div class="position-relative mb-20">
                        <div class="icon-field">
                            <span class="icon top-50 translate-middle-y">
                                <iconify-icon icon="solar:lock-password-outline"></iconify-icon>
                            </span>
                            <input type="password" name="password" id="password" class="form-control h-56-px bg-neutral-50 radius-12" placeholder="Kata Sandi" required>
                        </div>
                        <span class="toggle-password ri-eye-line cursor-pointer position-absolute end-0 top-50 translate-middle-y me-16 text-secondary-light" data-toggle="#password"></span>
                    </div>
                    <div class="">
                        <div class="d-flex justify-content-between gap-2">
                            <div class="form-check style-check d-flex align-items-center">
                                <input class="form-check-input border border-neutral-300" type="checkbox" value="" id="remeber">
                                <label class="form-check-label" for="remeber">Simpan Data </label>
                            </div>
                            <a href="<?= route_to('forgotPassword') ?>" class="text-primary-600 fw-medium">Lupa Kata Sandi?</a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary text-sm btn-sm px-12 py-16 w-100 radius-12 mt-32">Masuk</button>
                </form>


                <div class="mt-32 text-center text-sm">
                    <p class="mb-0">Tidak mempunyai akun? <a href="<?= route_to('signup') ?>" class="text-primary-600 fw-semibold">Daftar</a></p>
                </div>

            </div>
        </div>
    </section>

    <?= $this->include('partials/scripts') ?> <!-- Scripts -->
    <script>
        // ================== Password Show Hide Js Start ==========
        function initializePasswordToggle(toggleSelector) {
            $(toggleSelector).on("click", function() {
                $(this).toggleClass("ri-eye-off-line");
                var input = $($(this).attr("data-toggle"));
                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        }
        // Call the function
        initializePasswordToggle(".toggle-password");
        // ========================= Password Show Hide Js End ===========================
    </script>




</body>

</html>
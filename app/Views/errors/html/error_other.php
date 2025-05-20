<!-- meta tags and other links -->
<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIKASN - Sistem Informasi Kinerja ASN by Diskominfo</title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/images/favicon.png') ?>" sizes="16x16">
    <!-- remix icon font css  -->
    <link rel="stylesheet" href="<?= base_url('assets/css/remixicon.css') ?>">
    <!-- BootStrap css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/lib/bootstrap.min.css') ?>">
    <!-- Apex Chart css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/lib/apexcharts.css') ?>">
    <!-- Data Table css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/lib/dataTables.min.css') ?>">
    <!-- Text Editor css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/lib/editor-katex.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/lib/editor.atom-one-dark.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/lib/editor.quill.snow.css') ?>">
    <!-- Date picker css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/lib/flatpickr.min.css') ?>">
    <!-- Calendar css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/lib/full-calendar.css') ?>">
    <!-- Vector Map css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/lib/jquery-jvectormap-2.0.5.css') ?>">
    <!-- Popup css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/lib/magnific-popup.css') ?>">
    <!-- Slick Slider css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/lib/slick.css') ?>">
    <!-- prism css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/lib/prism.css') ?>">
    <!-- file upload css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/lib/file-upload.css') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/css/lib/audioplayer.css') ?>">
    <!-- main css -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>

<body>

    <div class="custom-bg">
        <div class="container container--xl">
            <div class="d-flex align-items-center justify-content-between py-24">
                <a href="<?= route_to('index') ?>" class="">
                    <img src="<?= base_url('assets/images/logo.png') ?>" alt="">
                </a>
                <a href="<?= route_to('index') ?>" class="btn btn-outline-primary-600 text-sm"> Go To Home </a>
            </div>

            <div class="py-res-120">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h2>404</h2>
                        <h3 class="mb-32 max-w-1000-px">Page not Found</h3>
                        <p class="text-neutral-500 max-w-700-px text-lg">Sorry, the page you are looking for doesn't exist</p>
                        <br> <a href="<?= route_to('index') ?>" class="btn btn-primary-600 radius-8 px-20 py-11">Back to Home</a>

                    </div>

                    <div class="col-lg-6 d-lg-block d-none">
                        <img src="<?= base_url('assets/images/error-img.png') ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery library js -->
    <script src="<?= base_url('assets/js/lib/jquery-3.7.1.min.js') ?>"></script>
    <!-- Bootstrap js -->
    <script src="<?= base_url('assets/js/lib/bootstrap.bundle.min.js') ?>"></script>
    <!-- Apex Chart js -->
    <script src="<?= base_url('assets/js/lib/apexcharts.min.js') ?>"></script>
    <!-- Data Table js -->
    <script src="<?= base_url('assets/js/lib/dataTables.min.js') ?>"></script>
    <!-- Iconify Font js -->
    <script src="<?= base_url('assets/js/lib/iconify-icon.min.js') ?>"></script>
    <!-- jQuery UI js -->
    <script src="<?= base_url('assets/js/lib/jquery-ui.min.js') ?>"></script>
    <!-- Vector Map js -->
    <script src="<?= base_url('assets/js/lib/jquery-jvectormap-2.0.5.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/lib/jquery-jvectormap-world-mill-en.js') ?>"></script>
    <!-- Popup js -->
    <script src="<?= base_url('assets/js/lib/magnifc-popup.min.js') ?>"></script>
    <!-- Slick Slider js -->
    <script src="<?= base_url('assets/js/lib/slick.min.js') ?>"></script>
    <!-- prism js -->
    <script src="<?= base_url('assets/js/lib/prism.js') ?>"></script>
    <!-- file upload js -->
    <script src="<?= base_url('assets/js/lib/file-upload.js') ?>"></script>
    <!-- audioplayer -->
    <script src="<?= base_url('assets/js/lib/audioplayer.js') ?>"></script>

    <!-- main js -->
    <script src="<?= base_url('assets/js/app.js') ?>"></script>

</body>

</html>
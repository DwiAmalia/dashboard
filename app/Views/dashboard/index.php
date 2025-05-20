<?= $this->extend('layout/layout1'); ?>

<?= $this->section('script'); ?>
<script src="<?= base_url('assets/js/homeOneChart.js') ?>"></script>

<script>
    // ================================ Column Charts Chart Start ================================ 
    var options = {
        series: [{
            name: 'Presensi',
            data: [20000, 16000, 14000, 25000, 45000, 18000, 28000, 11000, 26000, 48000, 18000, 22000]
        }, {
            name: 'Lapkin',
            data: [15000, 18000, 19000, 20000, 35000, 20000, 18000, 13000, 18000, 38000, 14000, 16000]
        }],
        colors: ['#487FFF', '#FF9F29'],
        labels: ['Active', 'New', 'Total'],
        legend: {
            show: false
        },
        chart: {
            type: 'bar',
            height: 264,
            toolbar: {
                show: false
            },
        },
        grid: {
            show: true,
            borderColor: '#D1D5DB',
            strokeDashArray: 4, // Use a number for dashed style
            position: 'back',
        },
        plotOptions: {
            bar: {
                borderRadius: 4,
                columnWidth: 10,
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            categories: ['janah', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        },
        yaxis: {
            categories: ['0', '5000', '10,000', '20,000', '30,000', '50,000', '60,000', '60,000', '70,000', '80,000', '90,000', '100,000'],
        },
        yaxis: {
            labels: {
                formatter: function(value) {
                    return (value / 1000).toFixed(0) + 'k';
                }
            }
        },
        tooltip: {
            y: {
                formatter: function(value) {
                    return value / 1000 + 'k';
                }
            }
        },
        fill: {
            opacity: 1,
            width: 18,
        },
    };

    var chart = new ApexCharts(document.querySelector("#columnChart1"), options);
    chart.render();
    // ================================ Column Charts Chart End ================================ 
</script>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="row row-cols-xxxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4">
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-1 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Total OPD</p>
                        <h6 class="mb-0">32</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-cyan rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="solar:buildings-3-broken" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                    <span class="d-inline-flex align-items-center gap-1 text-success-main">
                        <iconify-icon icon="bxs:up-arrow" class="text-xs"></iconify-icon> 35
                    </span>
                    Titik lokasi presensi
                </p>
            </div>
        </div><!-- card end -->
    </div>
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-3 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Total Users</p>
                        <h6 class="mb-0">2,000</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-info rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="fluent:people-20-filled" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                    <span class="d-inline-flex align-items-center gap-1 text-success-main">
                        <iconify-icon icon="bxs:up-arrow" class="text-xs"></iconify-icon> +200
                    </span>
                    Last year users
                </p>
            </div>
        </div><!-- card end -->
    </div>
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-2 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Total Presensi</p>
                        <h6 class="mb-0">15,000</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-purple rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="fa-solid:award" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                    <span class="d-inline-flex align-items-center gap-1 text-danger-main">
                        <iconify-icon icon="bxs:down-arrow" class="text-xs"></iconify-icon> -800
                    </span>
                    Last active-day presensi
                </p>
            </div>
        </div><!-- card end -->
    </div>
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-4 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Total Lapkin</p>
                        <h6 class="mb-0">42,000</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-success-main rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="solar:file-text-broken" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                    <span class="d-inline-flex align-items-center gap-1 text-success-main">
                        <iconify-icon icon="bxs:up-arrow" class="text-xs"></iconify-icon> +20,000
                    </span>
                    Last active-day presensi
                </p>
            </div>
        </div><!-- card end -->
    </div>
    <div class="col">
        <div class="card shadow-none border bg-gradient-start-5 h-100">
            <div class="card-body p-20">
                <div class="d-flex flex-wrap align-items-center justify-content-between gap-3">
                    <div>
                        <p class="fw-medium text-primary-light mb-1">Total Expense</p>
                        <h6 class="mb-0">$30,000</h6>
                    </div>
                    <div class="w-50-px h-50-px bg-red rounded-circle d-flex justify-content-center align-items-center">
                        <iconify-icon icon="fa6-solid:file-invoice-dollar" class="text-white text-2xl mb-0"></iconify-icon>
                    </div>
                </div>
                <p class="fw-medium text-sm text-primary-light mt-12 mb-0 d-flex align-items-center gap-2">
                    <span class="d-inline-flex align-items-center gap-1 text-success-main">
                        <iconify-icon icon="bxs:up-arrow" class="text-xs"></iconify-icon> +$5,000
                    </span>
                    Last 30 days expense
                </p>
            </div>
        </div><!-- card end -->
    </div>
</div>

<div class="row gy-4 mt-1">

    <div class="col-xxl-9 col-xl-12">
        <div class="card h-100">
            <div class="card-body p-24">

                <div class="d-flex flex-wrap align-items-center gap-1 justify-content-between mb-16">
                    <ul class="nav border-gradient-tab nav-pills mb-0" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link d-flex align-items-center active" id="pills-to-do-list-tab" data-bs-toggle="pill" data-bs-target="#pills-to-do-list" type="button" role="tab" aria-controls="pills-to-do-list" aria-selected="true">
                                Tepat Waktu
                                <span class="text-sm fw-semibold py-6 px-12 bg-neutral-500 rounded-pill text-white line-height-1 ms-12 notification-alert">35</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link d-flex align-items-center" id="pills-recent-leads-tab" data-bs-toggle="pill" data-bs-target="#pills-recent-leads" type="button" role="tab" aria-controls="pills-recent-leads" aria-selected="false" tabindex="-1">
                                Terlambat
                                <span class="text-sm fw-semibold py-6 px-12 bg-neutral-500 rounded-pill text-white line-height-1 ms-12 notification-alert">35</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link d-flex align-items-center" id="pills-izin-tab" data-bs-toggle="pill" data-bs-target="#pills-izin" type="button" role="tab" aria-controls="pills-izin" aria-selected="false" tabindex="-1">
                                Izin
                                <span class="text-sm fw-semibold py-6 px-12 bg-neutral-500 rounded-pill text-white line-height-1 ms-12 notification-alert">15</span>
                            </button>
                        </li>
                    </ul>
                    <a href="javascript:void(0)" class="text-primary-600 hover-text-primary d-flex align-items-center gap-1">
                        View All
                        <iconify-icon icon="solar:alt-arrow-right-linear" class="icon"></iconify-icon>
                    </a>
                </div>

                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-to-do-list" role="tabpanel" aria-labelledby="pills-to-do-list-tab" tabindex="0">
                        <div class="table-responsive scroll-sm">
                            <table class="table bordered-table sm-table mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Users </th>
                                        <th scope="col">Registered On</th>
                                        <th scope="col">Plan</th>
                                        <th scope="col" class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="<?= base_url('assets/images/users/user1.png') ?>" alt="" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                                <div class="flex-grow-1">
                                                    <h6 class="text-md mb-0 fw-medium">Dianne Russell</h6>
                                                    <span class="text-sm text-secondary-light fw-medium">redaniel@gmail.com</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>27 Mar 2025</td>
                                        <td>Free</td>
                                        <td class="text-center">
                                            <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="<?= base_url('assets/images/users/user2.png') ?>" alt="" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                                <div class="flex-grow-1">
                                                    <h6 class="text-md mb-0 fw-medium">Wade Warren</h6>
                                                    <span class="text-sm text-secondary-light fw-medium">xterris@gmail.com</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>27 Mar 2025</td>
                                        <td>Basic</td>
                                        <td class="text-center">
                                            <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="<?= base_url('assets/images/users/user3.png') ?>" alt="" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                                <div class="flex-grow-1">
                                                    <h6 class="text-md mb-0 fw-medium">Albert Flores</h6>
                                                    <span class="text-sm text-secondary-light fw-medium">seannand@mail.ru</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>27 Mar 2025</td>
                                        <td>Standard</td>
                                        <td class="text-center">
                                            <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="<?= base_url('assets/images/users/user4.png') ?>" alt="" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                                <div class="flex-grow-1">
                                                    <h6 class="text-md mb-0 fw-medium">Bessie Cooper </h6>
                                                    <span class="text-sm text-secondary-light fw-medium">igerrin@gmail.com</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>27 Mar 2025</td>
                                        <td>Business</td>
                                        <td class="text-center">
                                            <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="<?= base_url('assets/images/users/user5.png') ?>" alt="" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                                <div class="flex-grow-1">
                                                    <h6 class="text-md mb-0 fw-medium">Arlene McCoy</h6>
                                                    <span class="text-sm text-secondary-light fw-medium">fellora@mail.ru</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>27 Mar 2025</td>
                                        <td>Enterprise </td>
                                        <td class="text-center">
                                            <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-recent-leads" role="tabpanel" aria-labelledby="pills-recent-leads-tab" tabindex="0">
                        <div class="table-responsive scroll-sm">
                            <table class="table bordered-table sm-table mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Users </th>
                                        <th scope="col">Registered On</th>
                                        <th scope="col">Plan</th>
                                        <th scope="col" class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="<?= base_url('assets/images/users/user1.png') ?>" alt="" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                                <div class="flex-grow-1">
                                                    <h6 class="text-md mb-0 fw-medium">Dianne Russell</h6>
                                                    <span class="text-sm text-secondary-light fw-medium">redaniel@gmail.com</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>27 Mar 2025</td>
                                        <td>Free</td>
                                        <td class="text-center">
                                            <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="<?= base_url('assets/images/users/user2.png') ?>" alt="" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                                <div class="flex-grow-1">
                                                    <h6 class="text-md mb-0 fw-medium">Wade Warren</h6>
                                                    <span class="text-sm text-secondary-light fw-medium">xterris@gmail.com</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>27 Mar 2025</td>
                                        <td>Basic</td>
                                        <td class="text-center">
                                            <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="<?= base_url('assets/images/users/user3.png') ?>" alt="" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                                <div class="flex-grow-1">
                                                    <h6 class="text-md mb-0 fw-medium">Albert Flores</h6>
                                                    <span class="text-sm text-secondary-light fw-medium">seannand@mail.ru</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>27 Mar 2025</td>
                                        <td>Standard</td>
                                        <td class="text-center">
                                            <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="<?= base_url('assets/images/users/user4.png') ?>" alt="" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                                <div class="flex-grow-1">
                                                    <h6 class="text-md mb-0 fw-medium">Bessie Cooper </h6>
                                                    <span class="text-sm text-secondary-light fw-medium">igerrin@gmail.com</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>27 Mar 2025</td>
                                        <td>Business</td>
                                        <td class="text-center">
                                            <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="<?= base_url('assets/images/users/user5.png') ?>" alt="" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                                <div class="flex-grow-1">
                                                    <h6 class="text-md mb-0 fw-medium">Arlene McCoy</h6>
                                                    <span class="text-sm text-secondary-light fw-medium">fellora@mail.ru</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>27 Mar 2025</td>
                                        <td>Enterprise </td>
                                        <td class="text-center">
                                            <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-izin" role="tabpanel" aria-labelledby="pills-izin-tab" tabindex="0">
                        <div class="table-responsive scroll-sm">
                            <table class="table bordered-table sm-table mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Users </th>
                                        <th scope="col">Registered On</th>
                                        <th scope="col">Plan</th>
                                        <th scope="col" class="text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="<?= base_url('assets/images/users/user1.png') ?>" alt="" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                                <div class="flex-grow-1">
                                                    <h6 class="text-md mb-0 fw-medium">Andi Ar</h6>
                                                    <span class="text-sm text-secondary-light fw-medium">redaniel@gmail.com</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>27 Mar 2025</td>
                                        <td>Free</td>
                                        <td class="text-center">
                                            <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="<?= base_url('assets/images/users/user2.png') ?>" alt="" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                                <div class="flex-grow-1">
                                                    <h6 class="text-md mb-0 fw-medium">Wade Warren</h6>
                                                    <span class="text-sm text-secondary-light fw-medium">xterris@gmail.com</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>27 Mar 2025</td>
                                        <td>Basic</td>
                                        <td class="text-center">
                                            <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="<?= base_url('assets/images/users/user3.png') ?>" alt="" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                                <div class="flex-grow-1">
                                                    <h6 class="text-md mb-0 fw-medium">Albert Flores</h6>
                                                    <span class="text-sm text-secondary-light fw-medium">seannand@mail.ru</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>27 Mar 2025</td>
                                        <td>Standard</td>
                                        <td class="text-center">
                                            <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="<?= base_url('assets/images/users/user4.png') ?>" alt="" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                                <div class="flex-grow-1">
                                                    <h6 class="text-md mb-0 fw-medium">Bessie Cooper </h6>
                                                    <span class="text-sm text-secondary-light fw-medium">igerrin@gmail.com</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>27 Mar 2025</td>
                                        <td>Business</td>
                                        <td class="text-center">
                                            <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="<?= base_url('assets/images/users/user5.png') ?>" alt="" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                                                <div class="flex-grow-1">
                                                    <h6 class="text-md mb-0 fw-medium">Arlene McCoy</h6>
                                                    <span class="text-sm text-secondary-light fw-medium">fellora@mail.ru</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td>27 Mar 2025</td>
                                        <td>Enterprise </td>
                                        <td class="text-center">
                                            <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Active</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-xl-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
                    <h6 class="mb-2 fw-bold text-lg mb-0">Top Performer (Last Month)</h6>
                    <!-- <a href="javascript:void(0)" class="text-primary-600 hover-text-primary d-flex align-items-center gap-1">
                        View All
                        <iconify-icon icon="solar:alt-arrow-right-linear" class="icon"></iconify-icon>
                    </a> -->
                </div>

                <div class="mt-32">

                    <div class="d-flex align-items-center justify-content-between gap-3 mb-24">
                        <div class="d-flex align-items-center">
                            <img src="<?= base_url('assets/images/users/user1.png') ?>" alt="" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                            <div class="flex-grow-1">
                                <h6 class="text-md mb-0 fw-medium">Dianne Russell</h6>
                                <span class="text-sm text-secondary-light fw-medium">Agent ID: 36254</span>
                            </div>
                        </div>
                        <span class="text-primary-light text-md fw-medium">$20</span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between gap-3 mb-24">
                        <div class="d-flex align-items-center">
                            <img src="<?= base_url('assets/images/users/user2.png') ?>" alt="" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                            <div class="flex-grow-1">
                                <h6 class="text-md mb-0 fw-medium">Wade Warren</h6>
                                <span class="text-sm text-secondary-light fw-medium">Agent ID: 36254</span>
                            </div>
                        </div>
                        <span class="text-primary-light text-md fw-medium">$20</span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between gap-3 mb-24">
                        <div class="d-flex align-items-center">
                            <img src="<?= base_url('assets/images/users/user3.png') ?>" alt="" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                            <div class="flex-grow-1">
                                <h6 class="text-md mb-0 fw-medium">Albert Flores</h6>
                                <span class="text-sm text-secondary-light fw-medium">Agent ID: 36254</span>
                            </div>
                        </div>
                        <span class="text-primary-light text-md fw-medium">$30</span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between gap-3 mb-24">
                        <div class="d-flex align-items-center">
                            <img src="<?= base_url('assets/images/users/user4.png') ?>" alt="" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                            <div class="flex-grow-1">
                                <h6 class="text-md mb-0 fw-medium">Bessie Cooper</h6>
                                <span class="text-sm text-secondary-light fw-medium">Agent ID: 36254</span>
                            </div>
                        </div>
                        <span class="text-primary-light text-md fw-medium">$40</span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between gap-3 mb-24">
                        <div class="d-flex align-items-center">
                            <img src="<?= base_url('assets/images/users/user5.png') ?>" alt="" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                            <div class="flex-grow-1">
                                <h6 class="text-md mb-0 fw-medium">Arlene McCoy</h6>
                                <span class="text-sm text-secondary-light fw-medium">Agent ID: 36254</span>
                            </div>
                        </div>
                        <span class="text-primary-light text-md fw-medium">$10</span>
                    </div>

                    <div class="d-flex align-items-center justify-content-between gap-3">
                        <div class="d-flex align-items-center">
                            <img src="<?= base_url('assets/images/users/user1.png') ?>" alt="" class="w-40-px h-40-px rounded-circle flex-shrink-0 me-12 overflow-hidden">
                            <div class="flex-grow-1">
                                <h6 class="text-md mb-0 fw-medium">Arlene McCoy</h6>
                                <span class="text-sm text-secondary-light fw-medium">Agent ID: 36254</span>
                            </div>
                        </div>
                        <span class="text-primary-light text-md fw-medium">$10</span>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="col-xxl-6 col-xl-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                    <h6 class="text-lg mb-0">Presensi Statistic</h6>
                </div>
                <div class="d-flex flex-wrap align-items-center gap-2 mt-8">
                    <h6 class="mb-0">27,200</h6>
                    <span class="text-sm fw-semibold rounded-pill bg-success-focus text-success-main border br-success px-8 py-4 line-height-1 d-flex align-items-center gap-1">
                        10% <iconify-icon icon="bxs:up-arrow" class="text-xs"></iconify-icon>
                    </span>
                    <span class="text-xs fw-medium">+ 1500 Per Day</span>
                </div>
                <div id="columnChart1" class="pt-28 apexcharts-tooltip-style-1"></div>
            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-xl-6">
        <div class="card h-100 radius-8 border">
            <div class="card-body p-24">
                <h6 class="mb-12 fw-semibold text-lg mb-16">Total Subscriber</h6>
                <div class="d-flex align-items-center gap-2 mb-20">
                    <h6 class="fw-semibold mb-0">5,000</h6>
                    <p class="text-sm mb-0">
                        <span class="bg-danger-focus border br-danger px-8 py-2 rounded-pill fw-semibold text-danger-main text-sm d-inline-flex align-items-center gap-1">
                            10%
                            <iconify-icon icon="iconamoon:arrow-down-2-fill" class="icon"></iconify-icon>
                        </span>
                        - 20 Per Day
                    </p>
                </div>

                <div id="barChart" class="barChart"></div>

            </div>
        </div>
    </div>
    <div class="col-xxl-3 col-xl-6">
        <div class="card h-100 radius-8 border-0 overflow-hidden">
            <div class="card-body p-24">
                <div class="d-flex align-items-center flex-wrap gap-2 justify-content-between">
                    <h6 class="mb-2 fw-bold text-lg">Users Overview</h6>
                    <div class="">
                        <select class="form-select form-select-sm w-auto bg-base border text-secondary-light">
                            <option>Today</option>
                            <option>Weekly</option>
                            <option>Monthly</option>
                            <option>Yearly</option>
                        </select>
                    </div>
                </div>


                <div id="userOverviewDonutChart" class="apexcharts-tooltip-z-none"></div>

                <ul class="d-flex flex-wrap align-items-center justify-content-between mt-3 gap-3">
                    <li class="d-flex align-items-center gap-2">
                        <span class="w-12-px h-12-px radius-2 bg-primary-600"></span>
                        <span class="text-secondary-light text-sm fw-normal">New:
                            <span class="text-primary-light fw-semibold">500</span>
                        </span>
                    </li>
                    <li class="d-flex align-items-center gap-2">
                        <span class="w-12-px h-12-px radius-2 bg-yellow"></span>
                        <span class="text-secondary-light text-sm fw-normal">Subscribed:
                            <span class="text-primary-light fw-semibold">300</span>
                        </span>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>
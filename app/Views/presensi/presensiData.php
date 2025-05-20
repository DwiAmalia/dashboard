<?= $this->extend('layout/layout1'); ?>

<?= $this->section('script'); ?>
<!-- Add this CSS for responsiveness and smaller text -->
<style>
    table {
        font-size: 0.85rem;
        /* Make the text smaller */
    }

    th,
    td {
        padding: 0.5rem;
        /* Adjust padding for smaller table */
    }

    .table {
        width: 100%;
        /* Ensure table is responsive */
        table-layout: fixed;
        overflow-x: auto;
    }

    /* For mobile view */
    @media (max-width: 768px) {
        table {
            font-size: 0.75rem;
            /* Even smaller font for small screens */
        }

        th,
        td {
            padding: 0.3rem;
        }
    }

    /* Optional: Ensure images in table do not overflow */
    .img-preview {
        max-width: 40px;
        max-height: 40px;
    }
</style>

<script>
    // Flat pickr or date picker js 
    function getDatePicker(receiveID) {
        flatpickr(receiveID, {
            enableTime: false,
            dateFormat: "Y-m-d",
        });
    }
    getDatePicker("#date");
</script>
<script>
    // Adding event listener to reset button
    document.getElementById('resetFilters').addEventListener('click', function() {
        // Reset form fields
        document.getElementById('nama_opd').value = '';
        document.getElementById('nama_pegawai').value = '';
        document.getElementById('date').value = '';
        document.getElementById('limit').value = '';

        // Submit the form to reload the page with no filters
        this.closest('form').submit();
    });
    // JavaScript for dynamically setting the image source in the modal
    document.querySelectorAll('.img-preview').forEach(item => {
        item.addEventListener('click', function() {
            const imgSrc = this.getAttribute('data-bs-img');
            const modalTitle = this.getAttribute('data-bs-title');

            // Set the image source and modal title dynamically
            document.getElementById('fotoPreview').src = imgSrc;
            document.getElementById('fotoModalLabel').innerText = modalTitle;
        });
    });
</script>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>


<div class="card basic-data-table">
    <div class="card-header d-flex justify-content-between align-items-center">
        <!-- Left-aligned header title -->
        <h5 class="card-title mb-0">Presensi Data</h5>

        <!-- Right-aligned page info -->
        <div class="page-info">
            Showing <?= esc($filters['page']) ?> of <?= esc($totalPages) ?> pages. Records/On-Time/Late: <span class="bg-info-focus px-1 rounded-2 fw-medium text-success-main text-sm"><?= esc($totalRecords) ?></span>/
            <span class="bg-success-focus px-1 rounded-2 fw-medium text-success-main text-sm"><?= esc($totalOntime) ?></span>/
            <span class="bg-danger-focus px-1 rounded-2 fw-medium text-success-main text-sm"><?= esc($totalOntime) ?></span>
        </div>
    </div>

    <div class="card-body">
        <!-- Filter Form -->
        <form method="get" action="<?= route_to('presensiData') ?>" class="d-flex align-items-center">
            <div class="row">
                <!-- OPD Filter -->
                <div class="col-md-2 mb-10">
                    <label for="nama_opd" class="form-label fw-semibold text-primary-light text-sm mb-8">OPD:</label>
                    <select class="form-control radius-8 form-select" name="id_opd" id="nama_opd">
                        <option value="">Select OPD</option>
                        <?php foreach ($opdList as $opd): ?>
                            <option value="<?= esc($opd['id_opd']); ?>" <?= (isset($filters['id_opd']) && $filters['id_opd'] == $opd['id_opd']) ? 'selected' : ''; ?>>
                                <?= esc($opd['nama_opd']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Pegawai (Employee) Filter -->
                <div class="col-md-2 mb-10">
                    <label for="nama_pegawai" class="form-label fw-semibold text-primary-light text-sm mb-8">Karyawan:</label>
                    <select class="form-control radius-8 form-select" name="id_pegawai" id="nama_pegawai">
                        <option value="">Select Pegawai</option>
                        <?php foreach ($pegawaiList as $pegawai): ?>
                            <option value="<?= esc($pegawai['id_pegawai']); ?>" <?= (isset($filters['id_pegawai']) && $filters['id_pegawai'] == $pegawai['id_pegawai']) ? 'selected' : ''; ?>>
                                <?= esc($pegawai['nama_pegawai']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-2 mb-10">
                    <label for="date" class="form-label fw-semibold text-primary-light text-sm mb-8"> Date:</label>
                    <div class=" position-relative">
                        <input class="form-control radius-8 bg-base" name="date" id="date" type="date" value="<?= esc($filters['date'] ?? date('Y-m-d')); ?>" placeholder="<?= date('Y-m-d'); ?>">
                        <span class="position-absolute end-0 top-50 translate-middle-y me-12 line-height-1">
                            <iconify-icon icon="solar:calendar-linear" class="icon text-lg"></iconify-icon>
                        </span>
                    </div>
                </div>

                <div class="col-md-2 mb-10">
                    <label for="search" class="form-label fw-semibold text-primary-light text-sm mb-8">NIP/Nama:</label>
                    <div class=" position-relative">
                        <input class="form-control radius-8 bg-base" name="search" id="search" type="text" value="<?= esc($filters['search']); ?>" placeholder="NIP/Nama">
                        <span class="position-absolute end-0 top-50 translate-middle-y me-12 line-height-1">
                            <iconify-icon icon="solar:shield-user-broken" class="icon text-lg"></iconify-icon>
                        </span>
                    </div>

                    </select>
                </div>
                <div class="col-md-1 mb-10">
                    <label for="limit" class="form-label fw-semibold text-primary-light text-sm mb-8">Limit:</label>
                    <select class="form-control radius-8 form-select" name="limit" id="limit">
                        <option value="10" <?= (isset($filters['limit']) && $filters['limit'] == 10) ? 'selected' : ''; ?>>10</option>
                        <option value="20" <?= (isset($filters['limit']) && $filters['limit'] == 20) ? 'selected' : ''; ?>>20</option>
                        <option value="50" <?= (isset($filters['limit']) && $filters['limit'] == 50) ? 'selected' : ''; ?>>50</option>
                        <option value="100" <?= (isset($filters['limit']) && $filters['limit'] == 100) ? 'selected' : ''; ?>>100</option>
                    </select>
                </div>

                <div class="col-md-3 mb-10">
                    <label for="date" class="form-label fw-semibold text-primary-light text-sm mb-8"> Filter Button : </label>
                    <div class=" position-relative">
                        <button type="submit" class="btn btn-outline-info-600 radius-8 px-20 py-11">Apply Filter</button>
                        <button type="reset" id="resetFilters" class="btn btn-outline-neutral-900 radius-8 px-20 py-11">Reset Filter</button>
                    </div>
                </div>
            </div>
        </form>
        <!-- Display Presensi Data Table -->
        <div class="position-relative">
            <table class="table  mb-0">
                <thead>
                    <tr>
                        <th scope=" col" style="width: 4%">No</th>
                        <th scope=" col" style="width: 12%">Nama Pegawai</th>
                        <th scope="col" style="width: 5%">Hari</th>
                        <th scope="col" style="width: 8%">Tanggal</th>
                        <th scope="col" style="width: 7%">Jam Masuk</th>
                        <th scope="col">Keterangan Masuk</th>
                        <th scope="col" style="width: 7%">Terlambat</th>
                        <th scope="col" style="width: 7%">Jam Siang</th>
                        <th scope="col">Keterangan Siang</th>
                        <th scope="col" style="width: 7%">Jam Pulang</th>
                        <th scope="col">Keterangan Pulang</th>
                        <th scope="col" style="width: 7%">Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($attendanceData)): ?>
                        <?php
                        $rowNumber = $startRowNumber; // Start the row number from the passed startRowNumber
                        ?>
                        <?php foreach ($attendanceData as $index => $attendance): ?>
                            <tr>
                                <td><?= $rowNumber++; ?></td>
                                <td><?= esc($attendance['nama_pegawai']); ?></td>
                                <td><?= esc(converted_day($attendance['jam_masuk'])) ?></td> <!-- Convert timestamp to day of the week -->
                                <td><?= esc(converted_date($attendance['jam_masuk'])) ?></td> <!-- Convert timestamp to date -->
                                <td><?= esc(converted_time($attendance['jam_masuk'])) ?></td> <!-- Convert timestamp to time -->

                                <!-- Combined Keterangan Masuk and Foto Masuk in one column -->
                                <td>
                                    <div class="d-flex align-items-center">
                                        <!-- Foto Masuk (Image Preview) -->
                                        <img src="<?= esc($attendance['foto_masuk']); ?>" alt="Foto Masuk" width="50" class="img-preview ms-2" data-bs-toggle="modal" data-bs-target="#fotoModal" data-bs-img="<?= esc($attendance['foto_masuk']); ?>" data-bs-title="Foto Masuk">
                                        <!-- Keterangan Masuk (Truncated) -->
                                        <span title=" <?= esc($attendance['ket_masuk']); ?>" style="max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                            <?= esc(substr($attendance['ket_masuk'], 0, 50)) . (strlen($attendance['ket_masuk']) > 50 ? '...' : ''); ?>
                                        </span>
                                    </div>
                                </td>
                                <td><?= esc($attendance['lateness']) ?></td> <!-- Convert timestamp to time -->
                                <td><?= $attendance['jam_siang'] ? esc(converted_time($attendance['jam_siang'])) : 'Belum Presensi'; ?></td> <!-- Convert timestamp to time -->
                                <td>
                                    <div class="d-flex align-items-center">
                                        <!-- Foto Siang (Image Preview) -->
                                        <?php if ($attendance['foto_siang']): ?>
                                            <img src="<?= esc($attendance['foto_siang']); ?>" alt="Foto Siang" width="50" class="img-preview ms-2" data-bs-toggle="modal" data-bs-target="#fotoModal" data-bs-img="<?= esc($attendance['foto_siang']); ?>" data-bs-title="Foto Siang">
                                        <?php else: ?>
                                            <span class="ms-2">Belum Presensi</span>
                                        <?php endif; ?>
                                        <!-- Keterangan Siang (Truncated) -->
                                        <span title="<?= esc($attendance['ket_siang']); ?>" style="max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                            <?= esc(substr($attendance['ket_siang'], 0, 50)) . (strlen($attendance['ket_siang']) > 50 ? '...' : ''); ?>
                                        </span>
                                    </div>
                                </td>

                                <td><?= $attendance['jam_pulang'] ? esc(converted_time($attendance['jam_pulang'])) : 'Belum Presensi'; ?> </td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <!-- Foto Pulang (Image Preview) -->
                                        <?php if ($attendance['foto_pulang']): ?>
                                            <img src="<?= esc($attendance['foto_pulang']); ?>" alt="Foto Pulang" width="50" class="img-preview ms-2" data-bs-toggle="modal" data-bs-target="#fotoModal" data-bs-img="<?= esc($attendance['foto_pulang']); ?>" data-bs-title="Foto Pulang">
                                        <?php else: ?>
                                            <span class="ms-2">Belum Presensi</span>
                                        <?php endif; ?>
                                        <!-- Keterangan Pulang (Truncated) -->
                                        <span title="<?= esc($attendance['ket_pulang']); ?>" style="max-width: 150px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                            <?= esc(substr($attendance['ket_pulang'], 0, 50)) . (strlen($attendance['ket_pulang']) > 50 ? '...' : ''); ?>
                                        </span>
                                    </div>
                                </td>

                                <td>
                                    <a href="javascript:void(0)" class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                                        <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                                    </a>
                                </td>
                            </tr>

                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="13" class="text-center">No attendance records found.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>

                <!-- Single Reusable Modal for Image Preview -->
                <div class="modal fade" id="fotoModal" tabindex="-1" aria-labelledby="fotoModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="fotoModalLabel">Foto Preview</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="" alt="Foto Preview" id="fotoPreview" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </table>

        </div>
        <!-- Pagination -->
        <div>

            <ul class="pagination d-flex flex-wrap align-items-center gap-2 justify-content-center mt-24">
                <li class="page-item <?= ($filters['page'] <= 1) ? 'disabled' : ''; ?>">
                    <a class="page-link  border text-secondary-light fw-medium radius-8 border-0 px-20 py-10 d-flex align-items-center justify-content-center h-48-px <?= ($filters['page'] <= 1) ? '' : 'bg-primary-600 text-white'; ?>" href="<?= route_to('presensiData') . '?page=' . max(1, $filters['page'] - 1) . '&id_opd=' . esc($filters['id_opd']) . '&id_pegawai=' . esc($filters['id_pegawai']) . '&search=' . esc($filters['search']) . '&date=' . esc($filters['date']) . '&limit=' . esc($filters['limit']); ?>"><iconify-icon icon="iconamoon:arrow-left-2-light" class="text-xl"></iconify-icon> Previous</a>
                </li>
                <li class="page-item disabled">
                    <a class="page-link bg-base border text-secondary-light fw-medium radius-8 border-0 px-20 py-10 d-flex align-items-center justify-content-center h-48-px w-48-px" href="#"><?= esc($filters['page']) ?></a>
                </li>
                <li class="page-item <?= ($filters['page'] >= $totalPages) ? 'disabled' : ''; ?>">
                    <a class="page-link  border text-secondary-light fw-medium radius-8 border-0 px-20 py-10 d-flex align-items-center justify-content-center h-48-px <?= ($filters['page'] >= $totalPages) ? '' : 'bg-primary-600 text-white'; ?>" href="<?= route_to('presensiData') . '?page=' . min($totalPages, $filters['page'] + 1) . '&id_opd=' . esc($filters['id_opd']) . '&id_pegawai=' . esc($filters['id_pegawai']) . '&search=' . esc($filters['search']) . '&date=' . esc($filters['date']) . '&limit=' . esc($filters['limit']); ?>">Next <iconify-icon icon="iconamoon:arrow-right-2-light" class="text-xl"></iconify-icon></a>
                </li>

            </ul>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>
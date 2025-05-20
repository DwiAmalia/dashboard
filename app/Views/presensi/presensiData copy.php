<?= $this->extend('layout/layout1'); ?>

<?= $this->section('script'); ?>
<script>
    let table = new DataTable("#dataTable");
</script>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="card basic-data-table">
    <div class="card-header">
        <h5 class="card-title mb-0">Tanggal Hari</h5>
    </div>
    <div class="card-body">
        <table class="table bordered-table mb-0" id="dataTable" data-page-length='10'>
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Invoice</th>
                    <th scope="col">Name</th>
                    <th scope="col">Issued Date</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> 01 </td>
                    <td><a href="javascript:void(0)" class="text-primary-600">#526534</a></td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="<?= base_url('assets/images/user-list/user-list1.png') ?>" alt="" class="flex-shrink-0 me-12 radius-8">
                            <h6 class="text-md mb-0 fw-medium flex-grow-1">Kathryn Murphy</h6>
                        </div>
                    </td>
                    <td>25 Jan 2025</td>
                    <td>$200.00</td>
                    <td> <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Paid</span> </td>
                    <td>
                        <a href="javascript:void(0)" class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                            <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                        </a>
                        <a href="javascript:void(0)" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                            <iconify-icon icon="lucide:edit"></iconify-icon>
                        </a>
                        <a href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td> 01 </td>
                    <td><a href="javascript:void(0)" class="text-primary-600">#696589</a></td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="<?= base_url('assets/images/user-list/user-list2.png') ?>" alt="" class="flex-shrink-0 me-12 radius-8">
                            <h6 class="text-md mb-0 fw-medium flex-grow-1">Annette Black</h6>
                        </div>
                    </td>
                    <td>25 Jan 2025</td>
                    <td>$200.00</td>
                    <td> <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Paid</span> </td>
                    <td>
                        <a href="javascript:void(0)" class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                            <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                        </a>
                        <a href="javascript:void(0)" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                            <iconify-icon icon="lucide:edit"></iconify-icon>
                        </a>
                        <a href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td> 01 </td>
                    <td><a href="javascript:void(0)" class="text-primary-600">#256584</a></td>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="<?= base_url('assets/images/user-list/user-list3.png') ?>" alt="" class="flex-shrink-0 me-12 radius-8">
                            <h6 class="text-md mb-0 fw-medium flex-grow-1">Ronald Richards</h6>
                        </div>
                    </td>
                    <td>10 Feb 2025</td>
                    <td>$200.00</td>
                    <td> <span class="bg-success-focus text-success-main px-24 py-4 rounded-pill fw-medium text-sm">Paid</span> </td>
                    <td>
                        <a href="javascript:void(0)" class="w-32-px h-32-px bg-primary-light text-primary-600 rounded-circle d-inline-flex align-items-center justify-content-center">
                            <iconify-icon icon="iconamoon:eye-light"></iconify-icon>
                        </a>
                        <a href="javascript:void(0)" class="w-32-px h-32-px bg-success-focus text-success-main rounded-circle d-inline-flex align-items-center justify-content-center">
                            <iconify-icon icon="lucide:edit"></iconify-icon>
                        </a>
                        <a href="javascript:void(0)" class="w-32-px h-32-px bg-danger-focus text-danger-main rounded-circle d-inline-flex align-items-center justify-content-center">
                            <iconify-icon icon="mingcute:delete-2-line"></iconify-icon>
                        </a>
                    </td>
                </tr>


            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection(); ?>
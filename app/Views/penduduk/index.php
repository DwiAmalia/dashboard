<h1>All Penduduk</h1>
<table>
    <thead>
        <tr>
            <th>NIK</th>
            <th>Nama</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $penduduk): ?>
            <tr>
                <td><?= $penduduk['nik']; ?></td>
                <td><?= $penduduk['nama']; ?></td>
                <td>
                    <a href="<?= route_to('pendudukEdit', $penduduk['nik']); ?>">Edit</a> |
                    <a href="<?= route_to('pendudukDelete', $penduduk['nik']); ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="<?= route_to('pendudukCreate'); ?>">Add New Penduduk</a>
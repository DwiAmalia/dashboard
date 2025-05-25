<form method="POST" action="<?= route_to('pendudukStore'); ?>">
    <label for="nik">NIK</label>
    <input type="text" id="nik" name="nik" required>

    <label for="nama">Nama</label>
    <input type="text" id="nama" name="nama" required>

    <label for="jenis_kelamin">Jenis Kelamin</label>
    <input type="text" id="jenis_kelamin" name="jenis_kelamin" required>

    <label for="tanggal_lahir">Tanggal Lahir</label>
    <input type="date" id="tanggal_lahir" name="tanggal_lahir" required>

    <label for="alamat">Alamat</label>
    <textarea id="alamat" name="alamat" required></textarea>

    <label for="status_perkawinan">Status Perkawinan</label>
    <input type="text" id="status_perkawinan" name="status_perkawinan" required>

    <label for="agama">Agama</label>
    <input type="text" id="agama" name="agama" required>

    <label for="pekerjaan">Pekerjaan</label>
    <input type="text" id="pekerjaan" name="pekerjaan" required>

    <label for="rt">RT</label>
    <input type="text" id="rt" name="rt" required>

    <label for="rw">RW</label>
    <input type="text" id="rw" name="rw" required>

    <label for="kelurahan_id">Kelurahan ID</label>
    <input type="text" id="kelurahan_id" name="kelurahan_id" required>

    <label for="kecamatan_id">Kecamatan ID</label>
    <input type="text" id="kecamatan_id" name="kecamatan_id" required>

    <label for="kabupaten_id">Kabupaten ID</label>
    <input type="text" id="kabupaten_id" name="kabupaten_id" required>

    <label for="provinsi_id">Provinsi ID</label>
    <input type="text" id="provinsi_id" name="provinsi_id" required>

    <button type="submit">Submit</button>
</form>
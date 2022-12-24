<?php
require_once '../database.php';
?>
$db = new database;

<!-- Modal Form Anggota -->
<?php
global $db;
$dataProdi = $db->dataProdi();
?>
<div class="modal fade" id="tambahAnggota" tabindex="-1" aria-labelledby="tambahAnggotaLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-4 fw-bold" id="tambahAnggotaLabel">Tambah Anggota</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?= 'prosesAnggota.php?aksi=tambah'; ?>" class="form form-vertical" enctype="multipart/form-data">
          <div class="form-body">
            <div class="row">
              <div class="col-12 mb-2">
                <div class="form-group">
                  <label class="fs-6 fw-bold" for="nim">Nim</label>
                  <input type="text" id="nim" class="form-control" name="nim_anggota" placeholder="Masukkan Nim Anggota" required>
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="form-group">
                  <label class="fs-6 fw-bold" for="nama">Nama Lengkap</label>
                  <input type="text" id="nama" class="form-control" name="nama_anggota" placeholder="Masukkan Nama Anggota" required>
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="form-group mb-2">
                  <label class="fs-6 fw-bold" for="jk">Jenis Kelamin</label>
                  <select class="form-select" id="jk" name="jenis_kelamin">
                    <option value="0" selected disabled>-Pilih-</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
              </div>
              <div class="col-7 mb-2">
                <div class="form-group mb-2">
                  <label class="fs-6 fw-bold" for="prodi">Prodi</label>
                  <select class="form-select" id="prodi" name="id_prodi">
                    <option value="0" selected disabled>-Pilih-</option>
                    <?php foreach ($dataProdi as $row) : ?>
                      <option value="<?= $row['id_prodi']; ?>"><?= $row['nama']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-5 mb-2">
                <div class="form-group">
                  <label class="fs-6 fw-bold" for="semester">Semester</label>
                  <input type="text" id="semester" class="form-control" name="semester" required>
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="form-group">
                  <label class="fs-6 fw-bold" for="email">Email</label>
                  <input type="text" id="email" class="form-control" name="email" placeholder="Masukkan Email Anggota" required>
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="form-group">
                  <label class="fs-6 fw-bold" for="no_hp">No Telepon</label>
                  <input type="text" id="no_hp" class="form-control" name="no_hp" placeholder="Masukkan Nomor Telepon" required>
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="form-group">
                  <label class="fs-6 fw-bold" for="alamat">Alamat</label>
                  <textarea id="alamat" class="form-control" name="alamat" required></textarea>
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="form-group">
                  <label class="fs-6 fw-bold" for="foto">Foto</label>
                  <input type="file" id="foto" class="form-control" name="foto" required>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-sm btn-success">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Form Anggota -->


<!-- Modal Form Buku -->
<?php
global $db;
$dataKategori = $db->dataKategori();
?>
<div class="modal fade" id="tambahBuku" tabindex="-1" aria-labelledby="tambahBukuLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-4 fw-bold" id="tambahBukuLabel">Tambah Buku</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?= 'prosesBuku.php?aksi=tambah'; ?>" class="form form-vertical">
          <div class="form-body">
            <div class="row">
              <div class="col-12 mb-2">
                <?php
                $data = $db->kodeOtomatis('id_buku', 'buku');
                $kode = $data['kodeTerbesar'];
                $kode++;
                $kodeBuku = 'AA' . sprintf("%03s", $kode);
                ?>
                <div class="form-group">
                  <label class="fs-6 fw-bold" for="kode">Kode</label>
                  <input type="text" id="kode" class="form-control" name="kode_buku" value="<?= $kodeBuku; ?>" readonly>
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="form-group">
                  <label class="fs-6 fw-bold" for="judul">Judul</label>
                  <input type="text" id="judul" class="form-control" name="judul_buku" placeholder="Masukkan Judul Buku" required>
                </div>
              </div>
              <div class="col-12">
                <div class="form-group mb-2">
                  <label class="fs-6 fw-bold" for="jenis">Jenis Buku</label>
                  <select class="form-select" id="jenis" name="id_kategori">
                    <option value="0" selected disabled>-Pilih-</option>
                    <?php foreach ($dataKategori as $row) : ?>
                      <option value="<?= $row['id_kategori']; ?>"><?= $row['nama_kategori']; ?>
                      </option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="form-group">
                  <label class="fs-6 fw-bold" for="penulis">Penulis</label>
                  <input type="text" id="penulis" class="form-control" name="penulis_buku" placeholder="Masukkan Penulis Buku" required>
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="form-group">
                  <label class="fs-6 fw-bold" for="penerbit">Penerbit</label>
                  <input type="text" id="penerbit" class="form-control" name="penerbit_buku" placeholder="Masukkan Penerbit Buku" required>
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="form-group">
                  <label class="fs-6 fw-bold" for="tahun">Tahun Terbit</label>
                  <input type="text" id="tahun" class="form-control" name="tahun_terbit" placeholder="Masukkan Tahun Terbit" required>
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="form-group">
                  <label class="fs-6 fw-bold" for="stok">Jumlah Stok</label>
                  <input type="text" id="stok" class="form-control" name="stok" placeholder="Masukkan Jumlah Stok" required>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-sm btn-success">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Form Buku -->


<!-- Modal Form Kategori -->
<div class="modal fade" id="tambahKategori" tabindex="-1" aria-labelledby="tambahKategoriLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-4 fw-bold" id="tambahKategoriLabel">Tambah Kategori</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?= 'prosesKategori.php?aksi=tambah'; ?>" class="form form-vertical">
          <div class="form-body">
            <div class="row">
              <div class="col-12 mb-2">
                <div class="form-group">
                  <label class="fs-6 fw-bold" for="kategori">Kategori</label>
                  <input type="text" id="kategori" class="form-control" name="nama_kategori" placeholder="Masukkan Kategori Buku" required>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-sm btn-success">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Form Kategori -->


<!-- Modal Form Prodi -->
<div class="modal fade" id="tambahProdi" tabindex="-1" aria-labelledby="tambahProdiLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-4 fw-bold" id="tambahProdiLabel">Tambah Prodi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?= 'prosesProdi.php?aksi=tambah'; ?>" class="form form-vertical">
          <div class="form-body">
            <div class="row">
              <div class="col-12 mb-2">
                <div class="form-group">
                  <label class="fs-6 fw-bold" for="prodi">Prodi</label>
                  <input type="text" id="prodi" class="form-control" name="nama" placeholder="Masukkan Nama Prodi" required>
                </div>
              </div>
              <div class="col-12 mb-2">
                <div class="form-group">
                  <label class="fs-6 fw-bold" for="kaprodi">Nama Ketua</label>
                  <input type="text" id="kaprodi" class="form-control" name="kaprodi" placeholder="Masukkan Nama Ketua" required>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-sm btn-success">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Form Prodi -->
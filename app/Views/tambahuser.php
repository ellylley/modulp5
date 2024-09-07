<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3></h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'></nav>
            </div>
        </div>
    </div>
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tambah User</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form action="<?= base_url('home/aksituser') ?>" method="POST" enctype="multipart/form-data">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label>Foto</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="file" id="foto" class="form-control" name="foto">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Nama User</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="first-name" class="form-control" name="nama" placeholder="Nama User">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Password</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                                        </div>
                                        <div class="col-md-4">
                                            <label>Level</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <select class="form-select" id="level" name="level">
                                                <option value="1">Admin</option>
                                                <option value="2">Kepala Sekolah</option>
                                                <option value="3">Wakil Kepala Sekolah</option>
                                                <option value="4">Guru</option>
                                                <option value="5">Murid</option>
                                            </select>
                                        </div>

                                        <!-- Kelas Selection -->
                                        <div class="col-md-4">
                                            <label id="kelasLabel" style="display:none;">Kelas</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <select class="form-select" id="kelas" name="kelas" style="display:none;">
                                                <option>Pilih</option>
                                                <?php foreach($elly as $gou){ ?>
                                                    <option value="<?=$gou->id_kelas?>"><?=$gou->nama_kelas?></option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                        <!-- NIS Field -->
                                        <div class="col-md-4">
                                            <label id="nisLabel" style="display:none;">NIS</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nis" class="form-control" name="nis" placeholder="NIS" style="display:none;">
                                        </div>

                                        <!-- NISN Field -->
                                        <div class="col-md-4">
                                            <label id="nisnLabel" style="display:none;">NISN</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="nisn" class="form-control" name="nisn" placeholder="NISN" style="display:none;">
                                        </div>

                                        <div class="col-12 col-md-8 offset-md-4 form-group">
                                            <div class='form-check'>
                                                <div class="checkbox"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript untuk menampilkan/menyembunyikan dropdown Kelas dan field NIS/NISN -->
    <script>
        function toggleKelas() {
            var level = document.getElementById("level").value;
            var kelasSelect = document.getElementById("kelas");
            var kelasLabel = document.getElementById("kelasLabel");
            var nis = document.getElementById("nis");
            var nisLabel = document.getElementById("nisLabel");
            var nisn = document.getElementById("nisn");
            var nisnLabel = document.getElementById("nisnLabel");

            // Tampilkan/Sembunyikan dropdown Kelas
            if (level == "5") {
                kelasSelect.style.display = "block";
                kelasLabel.style.display = "block";
            } else {
                kelasSelect.style.display = "none";
                kelasLabel.style.display = "none";
            }

            // Tampilkan/Sembunyikan field NIS dan NISN
            if (level == "2" || level == "3" || level == "4" || level == "5") {
                nis.style.display = "block";
                nisLabel.style.display = "block";
                nisn.style.display = "block";
                nisnLabel.style.display = "block";
            } else {
                nis.style.display = "none";
                nisLabel.style.display = "none";
                nisn.style.display = "none";
                nisnLabel.style.display = "none";
            }
        }

        // Tambahkan event listener untuk memanggil fungsi ketika level berubah
        document.getElementById("level").addEventListener("change", toggleKelas);
    </script>
</div>

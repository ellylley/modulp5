<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Modul P5</title>
    <style>
        .card {
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
        }

        .card-content {
            padding: 20px;
        }

        .card-title {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 16px;
        }

        .card-footer {
            padding: 10px 20px;
            background-color: #f8f9fa;
        }

        .btn {
            margin-top: 10px;
        }

        /* Style untuk garis horizontal */
        .hr-line {
            border: 0;
            border-top: 1px solid #ddd;
            margin: 20px 0;
        }
    </style>
</head>
<body>

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6">
                <h2>Tambah Modul P5</h2>
            </div>
            <div class="col-12 col-md-6">
                <nav aria-label="breadcrumb" class='breadcrumb-header text-right'>
                   
                </nav>
            </div>
        </div>
    </div>
    
    <!-- Form Tambah Modul -->
    <section id="add-module">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <form action="<?= base_url('home/aksitambahmodul') ?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <!-- Tema Modul -->
                                <div class="form-group">
                                    <label for="tema_modul">Tema Modul</label>
                                    <input type="text" class="form-control" id="tema_modul" name="tema_modul" required>
                                </div>

                                <!-- Nama Kelas -->
                                <div class="form-group">
                                    <label for="nama_kelas">Nama Kelas</label>
                                    <div id="kelas-list">
                                        <div class="kelas-item mb-3">
                                            <select class="form-select" id="nama_kelas" name="nama_kelas[]" required>
                                                <option>Pilih</option>
                                                <?php foreach($elly as $gou){ ?>
                                                    <option value="<?=$gou->id_kelas?>"><?=$gou->nama_kelas?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary mt-2" id="tambah-kelas">Tambah Kelas</button>
                                </div>

                                <!-- Dimensi Modul -->
                                <div class="form-group">
                                    <label for="dimensi_modul">Dimensi Modul</label>
                                    <textarea class="form-control" id="dimensi_modul" name="dimensi_modul" required></textarea>
                                    
                                </div>

                                <!-- Elemen Modul -->
                                <div class="form-group">
                                    <label for="elemen_modul">Elemen Modul</label>
                                    <textarea class="form-control" id="elemen_modul" name="elemen_modul" required></textarea>
                                </div>

                                <!-- Subelemen Modul -->
                                <div class="form-group">
                                    <label for="subelemen_modul">Subelemen Modul</label>
                                    <textarea class="form-control" id="subelemen_modul" name="subelemen_modul" required></textarea>
                                </div>

                                <!-- Capaian Akhir Modul -->
                                <div class="form-group">
                                    <label for="capakhir_modul">Capaian Akhir Modul</label>
                                    <textarea class="form-control" id="capakhir_modul" name="capakhir_modul" required></textarea>
                                </div>

                                <!-- Tujuan -->
                                <div class="form-group">
                                    <label for="tujuan">Tujuan</label>
                                    <textarea class="form-control" id="tujuan" name="tujuan" rows="3" required></textarea>
                                </div>

                                <!-- Fase Modul -->
                                <div class="form-group">
                                    <label>Fase Modul</label>
                                    <div id="fase-modul">
                                        <div class="fase-item mb-12">
                                            <div class="form-row">
                                                <div class="col-md-12">
                                                    <label>Nama Fase</label>
                                                    <input type="text" class="form-control" name="nama_fase[]" required>
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Kegiatan</label>
                                                    <textarea class="form-control" name="kegiatan[]" required></textarea>
                                                </div>
                                                <div class="col-md-12">
                                                    <label>Asesmen</label>
                                                    <textarea class="form-control" name="asesmen[]" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-secondary mt-2" id="tambah-fase">Tambah Fase</button>
                                </div>

                                <!-- Skema Asesmen Keseluruhan -->
                                <div class="form-group">
                                    <label for="asesmen_slrh">Skema Asesmen Keseluruhan</label>
                                    <textarea class="form-control" id="asesmen_slrh" name="asesmen_slrh" rows="3" required></textarea>
                                </div>

                                <!-- Tips Pelaksanaan -->
                                <div class="form-group">
                                    <label for="tips_pelaksana">Tips Pelaksanaan</label>
                                    <textarea class="form-control" id="tips_pelaksana" name="tips_pelaksana" rows="3" required></textarea>
                                </div>

                                <!-- Gambar Latar Belakang -->
                                <div class="form-group">
                                    <label for="bg_tema">Gambar Latar Belakang</label>
                                   
                                    <input type="file" id="foto" class="form-control" name="foto" accept="image/*" required>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <a href="<?= base_url('home') ?>" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan Modul</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Script untuk tambah kelas dan fase -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('#tambah-kelas').click(function(){
            var kelasHtml = `
                <div class="kelas-item mb-3">
                    <select class="form-select" id="nama_kelas" name="nama_kelas[]" required>
                        <option>Pilih</option>
                        <?php foreach($elly as $gou){ ?>
                            <option value="<?=$gou->id_kelas?>"><?=$gou->nama_kelas?></option>
                        <?php } ?>
                    </select>
                    <button type="button" class="btn btn-danger btn-sm mt-2 hapus-kelas">Hapus Kelas</button>
                    <hr class="hr-line">
                </div>
            `;
            $('#kelas-list').append(kelasHtml);
        });

        // Menghapus kelas
        $(document).on('click', '.hapus-kelas', function(){
            $(this).closest('.kelas-item').remove();
        });

        $('#tambah-fase').click(function(){
            var faseHtml = `
                <div class="fase-item mb-3">
                    <div class="form-row">
                        <div class="col-md-4">
                            <label>Nama Fase</label>
                            <input type="text" class="form-control" name="nama_fase[]" required>
                        </div>
                        <div class="col-md-4">
                            <label>Kegiatan</label>
                            <textarea class="form-control" name="kegiatan[]" required></textarea>
                        </div>
                        <div class="col-md-4">
                            <label>Asesmen</label>
                            <textarea class="form-control" name="asesmen[]" required></textarea>
                        </div>
                    </div>
                    <button type="button" class="btn btn-danger btn-sm mt-2 hapus-fase">Hapus Fase</button>
                    <hr class="hr-line">
                </div>
            `;
            $('#fase-modul').append(faseHtml);
        });

        // Menghapus fase
        $(document).on('click', '.hapus-fase', function(){
            $(this).closest('.fase-item').remove();
        });
    });
</script>

</body>
</html>

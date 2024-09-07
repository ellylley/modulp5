<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Modul P5</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
            white-space: pre-wrap; /* Memastikan teks dipisah ke baris baru jika ada baris baru dalam string */
        }

        .card-footer {
            padding: 10px 20px;
            background-color: #f8f9fa;
        }

        .card img {
            width: 100%;
            height: auto;
            object-fit: cover;
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
             
            </div>
            <div class="col-12 col-md-6">
                <nav aria-label="breadcrumb" class='breadcrumb-header text-right'>
                   
                </nav>
            </div>
        </div>
    </div>
    
    <!-- Basic card section start -->
    <section id="content-types">
    <div class="row">
        <?php 
        // Menggunakan variabel untuk menyimpan id_modul yang sudah ditampilkan
        $displayedModuls = [];

        // Fungsi untuk memisahkan teks berdasarkan nomor dan titik
        function formatText($text) {
            return nl2br(trim($text)); // Menggunakan nl2br untuk memisahkan baris baru
        }

        foreach ($elly as $gou) {
            // Skip jika id_modul sudah ditampilkan
            if (in_array($gou->id_modul, $displayedModuls)) {
                continue;
            }
            
            // Tandai id_modul sebagai sudah ditampilkan
            $displayedModuls[] = $gou->id_modul;
        ?>
            <div class="col-12">
            <!-- Card 1 -->
            <div class="card">
                <div class="card-content" style="text-align: center;">
                    <h4 class="card-title" style="font-size: 50px;"><?= formatText($gou->tema_modul) ?></h4>
                    <p class="card-text" style="font-size: 20px;"><?= formatText($gou->nama_kelas) ?></p>
                </div>
                <img src="<?php echo base_url('images/'.$gou->bg_tema)?>" class="img-fluid">
            </div>
        </div>

        <div class="col-xl-12 col-md-12 col-sm-12">
            <!-- Card 2 -->
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <!-- Dimensi Modul -->
                            <div class="col-md-3">
                                <p><strong>DIMENSI</strong></p>
                                <p><?= formatText($gou->dimensi_modul); ?></p>
                            </div>

                            <!-- Elemen Modul -->
                            <div class="col-md-3">
                                <p><strong>ELEMEN</strong></p>
                                <p><?= formatText($gou->elemen_modul); ?></p>
                            </div>

                            <!-- Subelemen Modul -->
                            <div class="col-md-3">
                                <p><strong>SUBELEMEN</strong></p>
                                <p><?= formatText($gou->subelemen_modul); ?></p>
                            </div>

                            <!-- Capaian Akhir Modul -->
                            <div class="col-md-3">
                                <p><strong>CAPAIAN AKHIR</strong></p>
                                <p><?= formatText($gou->capakhir_modul); ?></p>
                            </div>
                        </div>

                        <!-- Garis horizontal sebelum Tujuan -->
                        <hr class="hr-line">

                        <!-- Informasi Lainnya -->
                        <p><strong>Tujuan:</strong> <?= formatText($gou->tujuan); ?></p>

                        <!-- Garis horizontal sebelum Fase -->
                        <hr class="hr-line">
                        
                        <!-- Fase dan Detail Fase -->
                        <?php foreach ($elly as $fase) { 
                            if ($fase->id_modul == $gou->id_modul) { ?>
                                <p><strong>Fase:</strong> <?= formatText($fase->nama_fase); ?></p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p><strong>Kegiatan:</strong></p>
                                        <p><?= formatText($fase->kegiatan); ?></p>
                                        <p><strong>Asesmen:</strong></p>
                                        <p><?= formatText($fase->asesmen); ?></p>
                                    </div>
                                </div>
                                <hr class="hr-line">
                            <?php } 
                        } ?>

                        <!-- Skema Asesmen Keseluruhan -->
                        <p><strong>Skema Asesmen Keseluruhan:</strong></p>
                        <p><?= formatText($gou->asesmen_slrh); ?></p>

                        <!-- Garis horizontal sebelum Tips Pelaksanaan -->
                        <hr class="hr-line">
                        
                        <p><strong>Tips Pelaksanaan:</strong></p>
                        <p><?= formatText($gou->tips_pelaksana); ?></p>

                    </div>
                    
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>

</div>

</body>
</html>

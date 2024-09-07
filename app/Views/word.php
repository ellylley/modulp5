<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul P5</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
    @media print {
        body {
            margin: 0;
            padding: 0;
        }

        .container-fluid {
            width: 100%;
            padding: 0;
            margin: 0;
        }

        .no-print {
            display: none;
        }

        .card, .card-content, .card-body {
            border: none;
            box-shadow: none;
            margin: 0;
            padding: 0;
        }

        .hr-line {
            display: none;
        }
    }

    .fase-container {
        margin-bottom: 20px;
        padding: 0;
        border: none; /* Hilangkan border */
        border-radius: 0;
        background: none; /* Hilangkan background */
    }

    .fase-content {
        margin-top: 10px;
    }

    .fase-content .row {
        margin-top: 10px;
    }

    ul {
        padding-left: 20px;
    }

    .hr-fase {
        border-top: 2px solid #ddd; /* Garis batas fase */
        margin-top: 20px;
        margin-bottom: 20px;
    }
</style>

</head>
<body>

<div class="main-content container-fluid">
    <div class="page-title no-print">
        <div class="row">
            <div class="col-12 col-md-6">
                <!-- Optional title or logo -->
            </div>
            <div class="col-12 col-md-6">
                <nav aria-label="breadcrumb" class='breadcrumb-header text-right no-print'>
                    <!-- Breadcrumb -->
                </nav>
            </div>
        </div>
    </div>
    
    <!-- Basic card section start -->
    <section id="content-types">
    <div class="row">
        <?php 
        $displayedModuls = [];

        function formatList($text) {
            // Mengubah teks menjadi array dengan memisahkan berdasarkan '1.', '2.', dst.
            $items = preg_split('/(?=\d+\.)/', $text, -1, PREG_SPLIT_NO_EMPTY);
            $formatted = '<ul>';
            foreach ($items as $item) {
                $formatted .= '<li>' . trim($item) . '</li>';
            }
            $formatted .= '</ul>';
            return $formatted;
        }

        foreach ($elly as $gou) {
            if (in_array($gou->id_modul, $displayedModuls)) {
                continue;
            }
            $displayedModuls[] = $gou->id_modul;
        ?>
            <div class="col-12">
                <!-- Card 1 -->
                <div class="card">
                    <div class="card-content" style="text-align: center;">
                        <h4 class="card-title" style="font-size: 50px;"><?= $gou->tema_modul ?></h4>
                        <p class="card-text" style="font-size: 20px;"><?= $gou->nama_kelas ?></p>
                    </div>
                    <img src="<?php echo base_url('images/'.$gou->bg_tema) ?>" class="img-fluid" style="width: 100%; height: auto; border-radius: 15px;">
                </div>
            </div>

            <div class="col-xl-12 col-md-12 col-sm-12">
                <!-- Card 2 -->
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div class="col-md-3">
                                    <p><strong>DIMENSI</strong></p>
                                    <?= formatList($gou->dimensi_modul); ?>
                                </div>
                                <div class="col-md-3">
                                    <p><strong>ELEMEN</strong></p>
                                    <?= formatList($gou->elemen_modul); ?>
                                </div>
                                <div class="col-md-3">
                                    <p><strong>SUBELEMEN</strong></p>
                                    <?= formatList($gou->subelemen_modul); ?>
                                </div>
                                <div class="col-md-3">
                                    <p><strong>CAPAIAN AKHIR</strong></p>
                                    <?= formatList($gou->capakhir_modul); ?>
                                </div>
                            </div>
                            <hr class="hr-line">
                            <p><strong>TUJUAN:</strong></p>
                            <?= formatList($gou->tujuan); ?>
                            <hr class="hr-line">
                            <?php foreach ($elly as $fase) { 
    if ($fase->id_modul == $gou->id_modul) { ?>
        <hr class="hr-fase">
        <div class="fase-container">
            <p><strong>FASE:</strong> <?= $fase->nama_fase; ?></p>
            <div class="fase-content">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>KEGIATAN:</strong></p>
                        <?= formatList($fase->kegiatan); ?>
                    </div>
                    <div class="col-md-6">
                        <p><strong>ASESMEN:</strong></p>
                        <?= formatList($fase->asesmen); ?>
                    </div>
                </div>
            </div>
        </div>
        <hr class="hr-fase">
<?php } 
} ?>

                            <p><strong>SKEMA ASESMEN KESELURUHAN:</strong></p>
                            <?= formatList($gou->asesmen_slrh); ?>
                            <hr class="hr-line">
                            <p><strong>TIPS PELAKSANAAN:</strong></p>
                            <?= formatList($gou->tips_pelaksana); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    </section>
</div>

<script type="text/javascript">
    window.print();
</script>

</body>
</html>

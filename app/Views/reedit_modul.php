<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Edit Modul P5</title>
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
        }

        .card-footer {
            padding: 10px 20px;
            background-color: #f8f9fa;
        }

        .card img {
            width: 100%;
            height: auto;
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

        ul {
            padding-left: 20px;
        }
        
    </style>
</head>
<body>

<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6">
                <h3>RIWAYAT EDIT MODUL P5</h3>
            </div>
        </div>
    </div>
    
    <!-- Basic card section start -->
    <section id="content-types">
        <div class="row">
        <?php 
        // Fungsi untuk memformat teks menjadi list
        function formatList($text) {
            $items = preg_split('/(?=\d+\.)/', $text, -1, PREG_SPLIT_NO_EMPTY);
            $formatted = '<ul>';
            foreach ($items as $item) {
                $formatted .= '<li>' . trim($item) . '</li>';
            }
            $formatted .= '</ul>';
            return $formatted;
        }

        // Menggunakan variabel untuk menyimpan id_modul yang sudah ditampilkan
        $displayedModuls = [];

        foreach ($elly as $gou) {
            // Skip jika id_modul sudah ditampilkan
            if (in_array($gou->id_modul, $displayedModuls)) {
                continue;
            }
            
            // Tandai id_modul sebagai sudah ditampilkan
            $displayedModuls[] = $gou->id_modul;
        ?>
            <div class="col-12"> <!-- Mengubah ukuran kolom menjadi full-width -->
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title"><?= $gou->tema_modul ?></h4>
                            <p class="card-text"><?= $gou->nama_kelas ?></p>
                        </div>
                        <img src="<?php echo base_url('images/'.$gou->bg_tema)?>" class="img-fluid" style="width: 100%; height: 300px; object-fit: cover;">
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <span></span>
                        <div>
                            <a href="javascript:void(0);" class="btn btn-light-primary" 
                               data-toggle="modal" 
                               data-target="#modulModal"
                               data-id="<?= $gou->id_modul; ?>"
                               data-tema="<?= $gou->tema_modul; ?>"
                               data-kelas="<?= $gou->nama_kelas; ?>"
                               data-dimensi="<?= htmlspecialchars($gou->dimensi_modul); ?>"
                               data-elemen="<?= htmlspecialchars($gou->elemen_modul); ?>"
                               data-subelemen="<?= htmlspecialchars($gou->subelemen_modul); ?>"
                               data-capakhir="<?= htmlspecialchars($gou->capakhir_modul); ?>"
                               data-tujuan="<?= htmlspecialchars($gou->tujuan); ?>"
                               data-asesmen_slrh="<?= htmlspecialchars($gou->asesmen_slrh); ?>"
                               data-tips="<?= htmlspecialchars($gou->tips_pelaksana); ?>">
                               Read More
                            </a>
                            <a href="<?= base_url('home/aksi_reedit_modul/'.$gou->id_modul)?>" class="btn btn-light-secondary ml-2">
                                Restore
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="modulModal" tabindex="-1" role="dialog" aria-labelledby="modulModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modulModalLabel">Detail Modul</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Konten detail modul akan diisi oleh JavaScript -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
// Simpan data modul dalam format JSON
var modulData = <?= json_encode($elly); ?>;

$('#modulModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Button yang diklik
  var id = button.data('id');
  var tema = button.data('tema');
  var kelas = button.data('kelas');
  var dimensi = button.data('dimensi');
  var elemen = button.data('elemen');
  var subelemen = button.data('subelemen');
  var capakhir = button.data('capakhir');
  var tujuan = button.data('tujuan');
  var asesmen_slrh = button.data('asesmen_slrh');
  var tips = button.data('tips');

  var modal = $(this);
  modal.find('.modal-title').text('Detail Modul: ' + tema);
  
  var faseHTML = '';
  modulData.forEach(function(fase) {
    if (id == fase.id_modul) {
      faseHTML += '<p><strong>Fase:</strong> ' + fase.nama_fase + '</p>';
      faseHTML += '<div class="row">';
      faseHTML += '<div class="col-md-6">';
      faseHTML += '<p><strong>Kegiatan:</strong></p>';
      faseHTML += formatList(fase.kegiatan);
      faseHTML += '</div>';
      faseHTML += '<div class="col-md-6">';
      faseHTML += '<p><strong>Asesmen:</strong></p>';
      faseHTML += formatList(fase.asesmen);
      faseHTML += '</div></div><hr class="hr-line">';
    }
  });

  modal.find('.modal-body').html(
    '<p><strong>Kelas:</strong> ' + kelas + '</p>' +
    '<p><strong>Dimensi:</strong></p>' + formatList(dimensi) +
    '<p><strong>Elemen:</strong></p>' + formatList(elemen) +
    '<p><strong>Subelemen:</strong></p>' + formatList(subelemen) +
    '<p><strong>Capaian Akhir:</strong></p>' + formatList(capakhir) +
    '<p><strong>Tujuan:</strong></p>' + formatList(tujuan) +
    '<hr class="hr-line">' +
    faseHTML +
    '<p><strong>Skema Asesmen Keseluruhan:</strong></p>' + formatList(asesmen_slrh) +
    '<hr class="hr-line">' +
    '<p><strong>Tips Pelaksanaan:</strong></p>' + formatList(tips)
  );
});

// Fungsi untuk memformat teks menjadi list
function formatList(text) {
    var items = text.split('\n').filter(function(item) {
        return item.trim() !== '';
    });
    var formatted = '<ul>';
    items.forEach(function(item) {
        formatted += '<li>' + item.trim() + '</li>';
    });
    formatted += '</ul>';
    return formatted;
}
</script>

</body>
</html>

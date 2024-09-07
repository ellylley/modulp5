<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6">
                <h3>MODUL P5</h3>
            </div>
            <div class="col-12 col-md-6">
                <nav aria-label="breadcrumb" class="breadcrumb-header text-right">
                    
                </nav>
            </div>
        </div>
    </div>
    
    <!-- Basic card section start -->
    <section id="content-types">
        <div class="row"> 
        <?php foreach($elly as $gou) { ?>
            <div class="col-12"> <!-- Mengubah ukuran kolom menjadi full-width -->
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                        <h4 class="card-title" style="font-size: 24px;"><?=$gou->tema_modul?></h4>
                        <p class="card-text" style="font-size: 16px;"><?=$gou->nama_kelas?></p>
                        </div>
                        <!-- Modifikasi img agar ter-crop menjadi persegi panjang -->
                        <img src="<?php echo base_url('images/'.$gou->bg_tema)?>" class="img-fluid" style="width: 100%; height: 300px; object-fit: cover;">
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <span></span>
                        
                        <a href="<?= base_url('home/modulmodul/'.$gou->id_modul) ?>">
                            <button class="btn btn-light-primary">Read More</button>
                        </a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
</div>

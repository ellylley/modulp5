<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6">
                <h3>DAFTAR MODUL P5</h3>
            </div>
            <div class="col-12 col-md-6">
                <nav aria-label="breadcrumb" class='breadcrumb-header text-right'>
                    <ol class="breadcrumb">
                        <div>
                            <a href="<?= base_url('home/tambahmodul') ?>">
                                <button class="btn btn-success">New</button>
                            </a>
                            <a href="<?= base_url('home/reedit_modul') ?>">
                <button class="btn btn-warning ">Restore</button>
                </a>
                        </div>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <!-- Basic card section start -->
    <section id="content-types">
        <div class="row">
            <?php foreach($elly as $gou) { ?>
            <div class="col-xl-3 col-md-4 col-sm-6"> <!-- Adjust column size for more cards per row -->
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title" style="font-size: 24px;"><?=$gou->tema_modul?></h4>
                            <p class="card-text" style="font-size: 16px;"><?=$gou->nama_kelas?></p>
                        </div>
                        <img src="<?php echo base_url('images/'.$gou->bg_tema)?>" class="img-fluid" style="width: 100%; height: auto;">
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <a href="<?= base_url('home/hapusmodul/'.$gou->id_modul) ?>" onclick="return confirm('Are you sure you want to delete this module?');">
                        <i data-feather="trash" width="20"></i>
                        </a>
                        <a href="<?= base_url('home/detailmodul/'.$gou->id_modul) ?>">
                            <button class="btn btn-light-primary">Read More</button>
                        </a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
</div>

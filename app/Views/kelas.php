<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'></nav>
            </div>
        </div>
    </div>

    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" align="center">Manajemen Kelas</h4>
                    <a href="<?= base_url('home/tambahkelas') ?>">
                        <button class="btn btn-success">Tambah</button>
                    </a>
                    <a href="<?= base_url('home/reedit_kelas') ?>">
                        <button class="btn btn-warning">Restore</button>
                    </a>
                </div>
                <div class="card-content">
                    <!-- table bordered -->
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>      
                                    <th>Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($elly as $gou) {
                                    if ($gou->isdelete == 0) {
                                ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $gou->nama_kelas ?></td>
                                    <td>
                                        <!-- Dropdown button -->
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                Detail
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="<?= base_url('home/editkelas/' . $gou->id_kelas) ?>">Edit</a></li>
                                                <li><a class="dropdown-item" href="<?= base_url('home/hapuskelas/' . $gou->id_kelas) ?>">Hapus</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <?php } }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

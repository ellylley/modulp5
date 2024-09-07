<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                </nav>
            </div>
        </div>
    </div>

    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" align="center">Daftar Siswa</h4>
                </div>
                <div class="card-content">
                    <!-- table bordered -->
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>No</th>      
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($elly as $gou) {
                                  
                                        
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $gou->nama_user ?></td> 
                                        <td><?= $gou->nama_kelas ?></td>
                                        
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#userDetailModal" onclick="showUserDetail('<?= $gou->nama_user ?>', '<?= $gou->nama_kelas ?>', '<?= $gou->nis ?>', '<?= $gou->nisn ?>')">Detail</button>
                                        </td>
                                    </tr>
                                <?php
                                    }
                                
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end of .card -->
        </div> <!-- end of .col-12 -->
    </div> <!-- end of .row -->
</div> <!-- end of .main-content container-fluid -->

<!-- Modal -->
<div class="modal fade" id="userDetailModal" tabindex="-1" aria-labelledby="userDetailModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userDetailModalLabel">Detail Siswa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><strong>Nama:</strong> <span id="modalUserName"></span></p>
        <p><strong>Kelas:</strong> <span id="modalUserClass"></span></p>
        <p><strong>NIS:</strong> <span id="modalUserNIS"></span></p>
        <p><strong>NISN:</strong> <span id="modalUserNISN"></span></p>
        <!-- Kamu bisa menambahkan informasi lain di sini -->
      </div>
      
    </div>
  </div>
</div>

<script>
function showUserDetail(name, kelas, nis, nisn) {
    document.getElementById('modalUserName').textContent = name;
    document.getElementById('modalUserClass').textContent = kelas;
    document.getElementById('modalUserNIS').textContent = nis;
    document.getElementById('modalUserNISN').textContent = nisn;
}
</script>

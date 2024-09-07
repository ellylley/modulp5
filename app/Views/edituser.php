<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Manage Admin</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                  
                </nav>
            </div>
        </div>
    </div>

    <style>
        .profile-img {
            display: block;
            margin: 0 auto 20px;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
        }
        .nis-nisn-group, .kelas-group {
            display: none; /* Disembunyikan secara default */
        }
        .form-group {
            margin-bottom: 5px; /* Jarak bawah antara setiap grup form */
        }
        .form-body {
            display: flex;
            flex-direction: column;
        }
        .form-select, .form-control {
            margin-bottom: 15px; /* Jarak bawah antara dropdown dan input */
        }
        .card-body {
            padding: 20px; /* Padding dalam card */
        }
        .btn {
            margin-top: 20px; /* Jarak atas tombol submit */
        }
    </style>

    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="edit-user-tab" data-bs-toggle="tab" href="#edit-user" role="tab" aria-controls="edit-user" aria-selected="true">Edit User</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <!-- Edit User Form -->
                                <div class="tab-pane fade show active" id="edit-user" role="tabpanel" aria-labelledby="edit-user-tab">
                                    <form action="<?= base_url('home/aksieuser') ?>" method="POST" enctype="multipart/form-data">
                                        <div class="form-body">
                                            <img src="<?= base_url('images/'.$satu->foto)?>" class="profile-img" alt="Profile Picture" >
                                            <div class="row">
                                                <div class="col-md-4 form-group">
                                                    <label>Profile</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="file" id="foto" class="form-control" name="foto">
                                                    <input type="hidden" name="old_foto" value="<?= $satu->foto ?>">
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label>Nama User</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <input type="text" id="first-name" class="form-control" name="nama" placeholder="Nama User" value="<?= $satu->nama_user ?? '' ?>">
                                                </div>
                                                <div class="col-md-4 form-group">
                                                    <label>Level</label>
                                                </div>
                                                <div class="col-md-8 form-group">
                                                    <select class="form-select" id="level" name="level">
                                                        <option value="<?= $satu->level?>">
                                                            <?php 
                                                                if($satu->level == 1){
                                                                    echo "Admin";
                                                                } else if ($satu->level == 2){
                                                                    echo "Kepala Sekolah";
                                                                } else if ($satu->level == 3){
                                                                    echo "Wakil Kepala Sekolah";
                                                                } else if ($satu->level == 4){
                                                                    echo "Guru";
                                                                } else if ($satu->level == 5){
                                                                    echo "Murid";
                                                                }
                                                            ?>
                                                        </option>
                                                        <option value="1">Admin</option>
                                                        <option value="2">Kepala Sekolah</option>
                                                        <option value="3">Wakil Kepala Sekolah</option>
                                                        <option value="4">Guru</option>
                                                        <option value="5">Murid</option>
                                                    </select>
                                                </div>

                                                <div class="col-md-4">
                                            <label>Kelola Modul</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                        <select class="form-select" id="editmodul" name="editmodul">
                                                        <option value="<?= $satu->editmodul?>">
                                                            <?php 
                                                                if($satu->editmodul == 0){
                                                                    echo "Tidak";
                                                                } else if ($satu->editmodul == 1){
                                                                    echo "Iya";
                                                             
                                                                }
                                                            ?>
                                                        </option>
                                                        <option value="0">Tidak</option>
                                                        <option value="1">Iya</option>
                                                     
                                                    </select>
                                        </div>
                                                <!-- NIS Field -->
                                                <div class="col-md-4 nis-nisn-group">
                                                    <label for="nis">NIS</label>
                                                </div>
                                                <div class="col-md-8 nis-nisn-group">
                                                    <input type="text" id="nis" class="form-control" name="nis" placeholder="NIS" value="<?= $satu->nis ?? '' ?>">
                                                </div>
                                                <!-- NISN Field -->
                                                <div class="col-md-4 nis-nisn-group">
                                                    <label for="nisn">NISN</label>
                                                </div>
                                                <div class="col-md-8 nis-nisn-group">
                                                    <input type="text" id="nisn" class="form-control" name="nisn" placeholder="NISN" value="<?= $satu->nisn ?? '' ?>">
                                                </div>
                                                <!-- Kelas Field -->
                                                <div class="col-md-4 nis-nisn-group kelas-group">
    <label for="kelas">Kelas</label>
</div>
<div class="col-md-8 nis-nisn-group kelas-group">
    <select id="kelas" class="form-select" name="kelas">
        <option value="">Pilih Kelas</option>
        <?php foreach($elly as $gou): ?>
            <option value="<?= $gou->id_kelas ?>" <?= isset($satu->id_kelas) && $satu->id_kelas == $gou->id_kelas ? 'selected' : '' ?>>
                <?= $gou->nama_kelas ?>
            </option>
        <?php endforeach; ?>
    </select>
</div>

                                                <div class="col-sm-12 d-flex justify-content-end">
                                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                </div>
                                                <input type="hidden" name="id" value="<?= $satu->id_user ?? '' ?>"> 
                                                <input type="hidden" name="password" value="<?= $satu->password ?? '' ?>"> 
                                            </div>
                                        </div>
                                    </form>
                                </div> <!-- End of Tab Content -->
                            </div> <!-- End of Card Body -->
                        </div> <!-- End of Card Content -->
                    </div> <!-- End of Card -->
                </div> <!-- End of Column -->
            </div> <!-- End of Row -->
        </div> <!-- End of Section -->
    </section>

    <!-- JavaScript to Handle Dynamic Field Visibility -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const levelSelect = document.getElementById('level');
            const nisNisnGroups = document.querySelectorAll('.nis-nisn-group');
            const kelasGroup = document.querySelectorAll('.kelas-group');

            function toggleFields() {
                const selectedLevel = levelSelect.value;

                // Menampilkan atau menyembunyikan NIS, NISN, dan Kelas
                if (['2', '3', '4', '5'].includes(selectedLevel)) {
                    nisNisnGroups.forEach(group => group.style.display = 'block');
                } else {
                    nisNisnGroups.forEach(group => group.style.display = 'none');
                }

                // Menampilkan atau menyembunyikan Kelas jika level adalah "Murid"
                if (selectedLevel === '5') {
                    kelasGroup.forEach(group => group.style.display = 'block');
                } else {
                    kelasGroup.forEach(group => group.style.display = 'none');
                }
            }

            // Initial check
            toggleFields();

            // Check on change
            levelSelect.addEventListener('change', toggleFields);
        });
    </script>
</div>
